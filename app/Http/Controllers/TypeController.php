<?php
namespace App\Models;

namespace App\Http\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Database\Eloquent\Model;
use App\Models;
use App\Models\Type;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Gate;


class TypeController extends SearchableController
{
    

    public function getQuery(): Builder
    {
        return Type::orderby('code');
    }

    function find(string $type_code): Model
    {
        return $this->getQuery()->where('code', $type_code)->firstOrFail();
    }
    function list(ServerRequestInterface $request): View
    {
        $search = $this->prepareSearch($request->getQueryParams());
        $type = Type::orderby('code');
       
       
        return view('types.list',[   
            'search' => $search,
            'types' => $type->paginate(5),

        ]);
    }
    function show($type_code): View
    {
        $type =  Type::where('code', $type_code)->firstOrFail();
        return view('types.view',[
            'type' => $type
        ]);
    }
    function  showUpdateForm(ServerRequestInterface $request, string $type_code): View
    {
        $type =  Type::where('code', $type_code)->firstOrFail();
        return view('types.update-form',[
            'type'=> $type
        ]);

    }
    function update(string $type_code, ServerRequestInterface $request): RedirectResponse
    {
        try{
            $data = $request->getParsedBody();
            // dd($data);
            $type =  Type::where('code', $type_code)->firstOrFail();
            // dd($student);
            $type->update($data);
            return redirect(route('types.view', ['type_code' => $type->code]))->with('message', " $type->code has been updated");
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors([ 
            'error'=> $e->errorInfo[2],]);
        }
       
       
    }
    function ShowCreateForm(): View{
        return view('types.create-form');
    }
    function  create(ServerRequestInterface $request): RedirectResponse
    {
        try{
            $data = $request->getParsedBody();
            // dd($data);
            $type =Type::create([
                'code' => $data['code'],
                'name' => $data['name'],
                'description' => $data['description'],
                'datetime' =>now(),
            ]);
          
            return redirect(route('types.list'))->with('message', " $type->code has been created");
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors([ 
            'error'=> $e->errorInfo[2],]);
        }   
    }
    public function showActivity(string $activity_name,ActivityController $activity, ServerRequestInterface $request): View
    {
        $search = $activity->prepareSearch($request->getQueryParams());
        $type = $this->find($activity_name);
        $query = $activity->filter($type->activities(), $search);
        return view('students.view-activities', [
            'Type' =>  $type,
            'search' => $search,
            'activities' => $query->paginate(5),
        ]);
    }
    function delete(string $type_code ): RedirectResponse
    {
        $type = $this->find($type_code);
        try {
            Gate::authorize('create', Student::class);
            //load activities() in model reward
            $type->loadCount('activities');
            
            if ($type->activities_count > 0) {
                return redirect()->back()->withInput()->withErrors([
                    'error' => "Can't delete $type->code because it has $type->activities_count activities ",
                ]);
            }
            $type->delete();
            return redirect()->route('types.list')->with('message', "{$type->code} has been removed ");
        }
        catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
       
   
    }
}
