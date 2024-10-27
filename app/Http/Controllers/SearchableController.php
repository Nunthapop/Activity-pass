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
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;

abstract class SearchableController extends Controller
{
    abstract public function getQuery() : Builder;

    function filterByTerm(Builder|Relation $query, ?string $term): Builder|Relation
    {
       

        if (!empty($term)) {
            foreach (\preg_split('/\s+/', \trim($term)) as $word) {
                $query->where(function (Builder $innerQuery) use ($word) {
                    $innerQuery
                        ->where('code', 'LIKE', "%{$word}%")
                        ->orWhere('name', 'LIKE', "%{$word}%");
                });
            }
        }

        return $query;
    }
    function prepareSearch(array $search): array
    {
        // null coalescing Operator
        $search['term'] = $search['term'] ?? null;
        return $search;
    }
    function filter(Builder|Relation $query, array $search): Builder|Relation
    {
        return $this->filterByTerm($query, $search['term']);
    }
    function search(array $search): Builder
    {
        $query = $this->getQuery();
        return $this->filter($query, $search);
    }
    // For easily searching by code.
   
}
