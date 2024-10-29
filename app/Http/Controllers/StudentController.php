<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use App\Exports\StudentsExport;
use App\Policies\StudentsPolicy;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends SearchableController
{

    public function getQuery(): Builder
    {
        return Student::orderby('code');
    }
    function find(string $student_code): Model
    {
        return $this->getQuery()->where('code', $student_code)->firstOrFail();
    }
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $student = Student::getQuery();
        return view('students.list', [
            'search' => $search,
            'students' => $student->paginate(5),

        ]);
    }

    function filterByTerm(Builder|Relation $query, ?string $term): Builder|Relation
    {
       

        if (!empty($term)) {
            foreach (\preg_split('/\s+/', \trim($term)) as $word) {
                $query->where(function (Builder $innerQuery) use ($word) {
                    $innerQuery
                        ->where('code', 'LIKE', "%{$word}%")
                        ->orWhere('name', 'LIKE', "%{$word}%");
                });
            }
        }

        return $query;
    }





    function show($student_code): View
    {
        $student =  Student::where('code', $student_code)->firstOrFail();
        return view('students.view', [
            'student' => $student
        ]);
    }
    function  showUpdateForm(ServerRequestInterface $request, string $student_code): View
    {


        $student =  Student::where('code', $student_code)->firstOrFail();
        return view('students.update-form', [
            'students' => $student
        ]);
    }
    function update(string $student_code, ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();
            // dd($data);
            $student =  Student::where('code', $student_code)->firstOrFail();
            // dd($student);
            $student->update($data);
            return redirect(route('students.view', ['student_code' => $student->code]))->with('message', " $student->username has been updated");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }
    function ShowCreateForm(): View
    {
        Gate::authorize('view', Student::class);
        return view('students.create-form');
    }
    function  create(ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();
            // dd($data);
            $student = Student::create([
                'code' => $data['code'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'year' => $data['year'],
                'major' => $data['major'],
                'score' => 0,
            ]);
            $user = User::create([
                'name' => $data['code'],
                'email' => $data['code'],
                'password' => $data['last_name'],
                'role' => 'USER',
            ]);

            return redirect(route('students.list'))->with('message', " $student->username has been created");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }
  



    public function showActivity(string $activity_name, ActivityController $activity, ServerRequestInterface $request): View
    {
        $search = $activity->prepareSearch($request->getQueryParams());
        $student = $this->find($activity_name);
        $query = $activity->filter($student->activities(), $search);
        return view('students.view-activities', [
            'students' => $student,
        
            'activities' => $query->paginate(5),
        ]);
    }

    function delete(string $student_code): RedirectResponse
    {
        try {
            $student = $this->find($student_code);
            $student->delete();
            return redirect()->route('students.list')->with('message', "{$student->code} has been removed ");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
        
    }

    function removeAct(
        string $student_code,
        string $activity_name
    ): RedirectResponse {

        $student = $this->find($student_code);
        //remove score

        try {

            $activity = $student->activities()->where('name', $activity_name)->firstOrFail();
            //remove score form student
            Student::where('code', $student_code)->update([
                'score' => Student::where('code',  $student_code)->value('score') - $activity->score
            ]);

            $student->activities()->detach($activity);

            return redirect()->back()->with('message', "{$activity->name} has been removed from {$student->code}");
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }
}
