<?php

namespace App\Http\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Database\Eloquent\Model;
use app\Models\Type;
use App\Models\Student;
use Illuminate\Database\QueryException;

use function PHPSTORM_META\type;

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
        $type = Type::getQuery();
        return view('types.list',[   
            'search' => $search,
            'type' => $type()->paginate(5),

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
            'types'=> $type
        ]);

    }
    function update(string $type_code, ServerRequestInterface $request): RedirectResponse
    {
        try{
            $data = $request->getParsedBody();
            // dd($data);
            $type =  Student::where('code', $type_code)->firstOrFail();
            // dd($student);
            $type->update($data);
            return redirect(route('types.view', ['type_code' => $type->code]))->with('message', " $type->username has been updated");
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
                'description' => $data['description']
            ]);
          
            return redirect(route('types.list'))->with('message', " $type->username has been created");
        }
        catch(QueryException $e){
            return redirect()->back()->withInput()->withErrors([ 
            'error'=> $e->errorInfo[2],]);
        }   
    }
    public function showType(string $type_code,ActivityController $type, ServerRequestInterface $request): View
    {
        $search = $type->prepareSearch($request->getQueryParams());
        $type = $this->find($type_code);
        $query = $type->filter($type->activities(), $search);
        return view('types.view-types', [
            'types' => $type,
            'search' => $search,
            'types' => $query->paginate(5),
        ]);
    }
}
