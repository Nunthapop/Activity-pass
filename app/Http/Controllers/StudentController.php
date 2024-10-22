<?php

namespace App\Http\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse; 
use App\Models;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function getQuery(): Builder
    {
        return Student::orderby('name');
    }
    function list(ServerRequestInterface $request): View
    {
        // $students = $this->getQuery()->paginate(10);

        return view('student.list',[

        ]);
    }
}
