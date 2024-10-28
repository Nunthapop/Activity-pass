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
use app\Models\Type;
use Illuminate\Http\Request;
use App\Models\Student;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;

class TypeController extends SearchableController
{
    

    public function getQuery(): Builder
    {
        return Type::orderby('code');
    }

    function find(string $student_code): Model
    {
        return $this->getQuery()->where('code', $student_code)->firstOrFail();
    }
    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $student = Student::getQuery();
        return view('students.list',[   
            'search' => $search,
            'students' => $student->paginate(5),

        ]);
    }
    function show($student_code): View
    {
        $student =  Student::where('code', $student_code)->firstOrFail();
        return view('students.view',[
            'student' => $student
        ]);
    }
    function  showUpdateForm(ServerRequestInterface $request, string $student_code): View{
       
       
        $student =  Student::where('code', $student_code)->firstOrFail();
        return view('students.update-form',[
            'students'=> $student
        ]);

    }
    function update(string $student_code, ServerRequestInterface $request): RedirectResponse
    {
        try{
            $data = $request->getParsedBody();
            // dd($data);
            $student =  Student::where('code', $student_code)->firstOrFail();
            // dd($student);
            $student->update($data);
            return redirect(route('students.view', ['student_code' => $student->code]))->with('message', " $student->username has been updated");
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors([ 
            'error'=> $e->errorInfo[2],]);
        }
       
       
    }
    function ShowCreateForm(): View{
        return view('students.create-form');
    }
    function  create(ServerRequestInterface $request): RedirectResponse
    {
        try{
            $data = $request->getParsedBody();
            // dd($data);
            $student =Student::create([
                'code' => $data['code'],
                'username' => $data['username'],
                'password' => $data['code'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'year' => $data['year'],
                'major' => $data['major'],
                'score' => 0,
            ]);
          
            return redirect(route('students.list'))->with('message', " $student->username has been created");
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors([ 
            'error'=> $e->errorInfo[2],]);
        }   
    }
    public function showActivity(string $activity_name,ActivityController $activity, ServerRequestInterface $request): View
    {
        $search = $activity->prepareSearch($request->getQueryParams());
        $student = $this->find($activity_name);
        $query = $activity->filter($student->activities(), $search);
        return view('students.view-activities', [
            'students' => $student,
            'search' => $search,
            'activities' => $query->paginate(5),
        ]);
    }
}
