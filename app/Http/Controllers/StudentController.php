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
    function find(string $student_id): Model
    {
        return $this->getQuery()->where('id', $student_id)->firstOrFail();
    }
    public function getQuery(): Builder
    {
        return Student::orderby('name');
    }
    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $student = Student::getQuery();
        return view('Students.list',[   
            'search' => $search,
            'students' => $student->paginate(5),

        ]);
    }
    function show(string $id): View{
        $student = Student::find($id);
        return view('Students.show',[
            'student' => $student
        ]);
    }

}
