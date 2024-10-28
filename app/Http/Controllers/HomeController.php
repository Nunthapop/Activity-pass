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
use App\Models\activities;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
class HomeController extends SearchableController
{
    public function getQuery(): Builder
    {
        return activities::orderby('name');
    }
    function  showHome()
    {
        $activities = activities::all();
        return view('home.home',[
            'activities' => $activities
        ]);
    }
    // function viewProfile($student_code)
    // {
    //     $student =  Student::where('code', $student_code)->firstOrFail();
    //     return view('home.profile',[
    //         'students' => $student
    //     ]);
    // }
    
}
