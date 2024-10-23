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


class StudentController extends SearchableController
{
    
    public function getQuery(): Builder
    {
        return Student::orderby('name');
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
            'students' => $student
        ]);
    }

}
