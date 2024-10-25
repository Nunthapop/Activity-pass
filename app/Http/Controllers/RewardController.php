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
use App\Models\Reward;
use Illuminate\Http\Request;
use App\Models\Student;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;

class RewardController extends SearchableController
{
    public function getQuery(): Builder
    {
        return Reward::orderby('code');
    }
    function find(string $reward_code): Model
    {
        return $this->getQuery()->where('code', $reward_code)->firstOrFail();
    }
    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $reward = Reward::getQuery();
        return view('reward.list',[   
            'search' => $search,
            'reward' => $reward->paginate(5),

        ]);
    }

    // function show($student_code): View
    // {
    //     $student =  Student::where('code', $student_code)->firstOrFail();
    //     return view('students.view',[
    //         'students' => $student
    //     ]);
    // }
    // function  showUpdateForm(ServerRequestInterface $request, string $student_code): View{
       
       
    //     $student =  Student::where('code', $student_code)->firstOrFail();
    //     return view('students.update-form',[
    //         'students'=> $student
    //     ]);

    // }
    // function update(string $student_code, ServerRequestInterface $request): RedirectResponse
    // {
    //     try{
    //         $data = $request->getParsedBody();
    //         // dd($data);
    //         $student =  Student::where('code', $student_code)->firstOrFail();
    //         // dd($student);
    //         $student->update($data);
    //         return redirect(route('students.view', ['student_code' => $student->code]))->with('message', " $student->username has been updated");
    //     }
    //     catch(QueryException $e){
    //         return redirect()->back()->withInput()->withErrors([ 
    //         'error'=> $e->errorInfo[2],]);
    //     }
       
       
    // }
    // function ShowCreateForm(): View{
    //     return view('students.create-form');
    // }
    // function  create(ServerRequestInterface $request): RedirectResponse
    // {
    //     try{
    //         $data = $request->getParsedBody();
    //         // dd($data);
    //         $student =Student::create([
    //             'code' => $data['code'],
    //             'username' => $data['username'],
    //             'password' => $data['code'],
    //             'first_name' => $data['first_name'],
    //             'last_name' => $data['last_name'],
    //             'year' => $data['year'],
    //             'major' => $data['major'],
    //             'score' => 0,
    //         ]);
          
    //         return redirect(route('students.list'))->with('message', " $student->username has been created");
    //     }
    //     catch(QueryException $e){
    //         return redirect()->back()->withInput()->withErrors([ 
    //         'error'=> $e->errorInfo[2],]);
    //     }   
    // }
}
