<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use App\Models\activities;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Reward;
use App\Models\Type;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Relations\Relation;
class ActivityController extends SearchableController
{
    public function getQuery(): Builder
    {
        return activities::orderby('name');
    }

    function find(string $activity_name): Model
    {
        return $this->getQuery()->where('name', $activity_name)->firstOrFail();
    }
    

    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $activity = $this->getQuery();
        return view('activities.list', [
            'search' => $search,
            'activity' => $activity->paginate(5),
        ]);
    }

    function show(string $activity_name): View
    {
        $activity = activities::where('name', $activity_name)->firstOrFail();
    $type = Type::where('id', $activity->type_id)->firstOrFail();
    $reward = Reward::where('id', $activity->reward_id)->firstOrFail();
        return view('activities.view', [
            'activity' => $activity,
            'type' => $type,
            'reward' => $reward
        ]);
    }

    function showUpdateForm(ServerRequestInterface $request, string $activity_name): View
    {
        $activity = activities::where('name', $activity_name)->firstOrFail();
        $type_id = Type::where('id', $activity->type_id)->firstOrFail();
        $type = Type::all();
        $reward = Reward::all();
        // dd($reward);
        // dd($activity->type_id);
        // dd($type->id);
        // dd($type_id);
        return view('activities.update-form', [
            'activity' => $activity,
            'type' => $type,
            'reward' => $reward,
            'type_id' => $type_id,
        ]);
    }

    function update(string $activity_name, ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();

            $activity = activities::where('name', $activity_name)->firstOrFail();
            $activity->update([
                'name' => $data['name'],
                'datetime' => $data['date'],
                'activity_by' => $data['act_by'],
                'location' => $data['location'],
                'score' => $data['score'],
                'description' => $data['description'],
                'type_id' => $data['type'],
            ]);

            return redirect(route('activities.view', ['activity_name' => $activity->name]))
                ->with('message', "$activity->name has been updated");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }

    function showCreateForm(): View
    {
        $type = Type::all();
        $reward = Reward::all();
        return view('activities.create-form',[
            'type' => $type,
            'reward' => $reward
        ]);
    }

    function create(ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();

            $activity = activities::create([
                'name' => $data['name'],
                'datetime' => $data['datetime'],
                'activity_by' => $data['activity_by'],
                'location' => $data['location'],
                'score' => $data['score'],
                'description' => $data['description'],
                'type_id' => $data['type'],
                'reward_id' => $data['reward'],
            ]);

            return redirect(route('activities.list'))->with('message', "$activity->name has been created");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }
    public function filterByTerm(Builder|Relation $query, ?string $term): Builder|Relation
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function($query) use ($term) {
            foreach (preg_split('/\s+/', trim($term)) as $word) {
                $query->orWhere('code', 'LIKE', "%{$word}%")
                      ->orWhere('name', 'LIKE', "%{$word}%")
                      ->orWhereHas('student', function (Builder $query) use ($word) {
                        $query->where('name', 'LIKE', "%{$word}%");
                    });
            }
        });
    }


    public function showStudents(string $activity_name,StudentController $student, ServerRequestInterface $request): View
    {
        $search = $student->prepareSearch($request->getQueryParams());
        $activity = $this->find($activity_name);
        $query = $student->filter($activity->students(), $search);
        return view('activities.view-students', [
            'activity' => $activity,
            'search' => $search,
            'students' => $query->paginate(5),
        ]);
    }

    function AddStudentForm(string $activity_name, 
    serverRequestInterface $request,
    StudentController $studentController
        ): View
    {
        $activity = $this->find($activity_name);
        $search = $studentController->prepareSearch($request->getQueryParams());
        $student = Student::whereDoesntHave('activities', function (Builder $innerQuery) use ($activity) {
            return $innerQuery->where('name', $activity->name);
        });
        $query = $studentController->filter($student, $search);
        return view('activities.add-students-form', [
            'activity' => $activity,
            'search' => $search,
            'students' => $query->paginate(5),
        ]);
    }
    function AddStudent(ServerRequestInterface $request, string $activity_name): RedirectResponse
    {
        // Gate::authorize('update', Product::class);
        $activity = $this->find($activity_name);
        $data = $request->getParsedBody();
        // To make sure that no duplicate shop.
        $student = Student::whereDoesntHave('activities', function (Builder $innerQuery) use ($activity) {
            return $innerQuery->where('name', $activity->name);
        })->where('code', $data['code'])->firstOrFail();
    
        //update score
        $score = $activity->score;
        Student::where('code', $data['code'])->update([
            'score' => Student::where('code', $data['code'])->value('score')+$score
        ]);

        $activity->students()->attach($student);
        return redirect()->route('activities.view-students', ['activity_name' => $activity->name])->with('message', "$student->code has been added");;
    }
    //Cannot use rn
    // function removeStudent(
    //     string $student_code,
    //     string $activity_name
    // ): RedirectResponse {

    //     $activity = $this->find($activity_name);
    //     //remove score

    //     try {

    //         $student = $activity ->students()->where('code', $student_code)->firstOrFail();
    //         //remove score form student
    //         // Student::where('code', $student_code)->update([
    //         //     'score' => Student::where('code', $student_code)->value('score') - $activity->score
    //         // ]);
    //         $activity ->students()->detach($student->code);
    //         return redirect()->route('activities.list')->with('message', "{$activity->name} has been removed from {$student_code}");

    //     } catch (QueryException $e) {

    //         return redirect()->route('activities.list')->withInput()->withErrors([
    //             'error' => $e->errorInfo[2],
    //         ]);
    //     }
        
    // }

}
