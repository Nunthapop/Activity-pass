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
        return view('rewards.list', [
            'search' => $search,
            'reward' => $reward->paginate(5),

        ]);
    }


    function show($reward_code): View
    {
        $reward =  Reward::where('code', $reward_code)->firstOrFail();
        return view('rewards.view', [
            'reward' => $reward
        ]);
    }

    function showUpdateForm(ServerRequestInterface $request, string $reward_code): View
    {
        $reward = Reward::where('code', $reward_code)->firstOrFail();
        return view('rewards.update-form', [
            'reward' => $reward
        ]);
    }

    function update(string $reward_code, ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();

            $reward = Reward::where('code', $reward_code)->firstOrFail();
            $reward->update([
                'code' => $data['code'],
                'name' => $data['name'],
                'qty' => $data['qty'],
                'description' => $data['description'],
                'score' => $data['score'],
            ]);

            return redirect(route('rewards.view', ['reward_code' => $reward->code]))
                ->with('message', "$reward->code has been updated");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }

    function ShowCreateForm(): View
    {
        return view('rewards.create-form');
    }
    function create(ServerRequestInterface $request): RedirectResponse
    {
        try {
            $data = $request->getParsedBody();
            // dd($data); // Uncomment to debug data

            $reward = Reward::create([
                'code' => $data['code'],
                'name' => $data['name'],
                'qty' => $data['qty'],
                'description' => $data['description'],
                'score' => $data['score'],
            ]);

            return redirect(route('rewards.list'))->with('message', "$reward->code has been created");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors([
                'error' => $e->errorInfo[2],
            ]);
        }
    }

    // ฟังก์ชันสำหรับลบ
    function delete(string $reward_code): RedirectResponse
    {
        $reward = $this->find($reward_code);
        $reward->delete();
        return redirect()->route('products.list');
    }
}
