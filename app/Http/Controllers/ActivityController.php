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
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
        return view('activities.view', [
            'activity' => $activity,
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
        return view('activities.create-form');
    }

    function create(ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();

            $activity = activities::create([
                'name' => $data['name'],
                'qty' => $data['qty'],
                'description' => $data['description'],
                'score' => $data['score'],
            ]);

            return redirect(route('activities.list'))->with('message', "$activity->name has been created");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }
}
