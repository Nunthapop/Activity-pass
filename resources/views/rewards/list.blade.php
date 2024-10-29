@extends('layouts.main')
@section('title', 'Reward: List')
@section('content')

    <!-- Reward List Page -->
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">

    <!-- Search Form -->
    <form action="{{ route('rewards.list') }}" method="get" class="search-form">
        <div class="search-container">
            <label id="search">Search</label>
            <input type="text" name="term" value="{{ $search['term'] }}" />
            <button type="submit">Search</button>
            <button type="reset">Clear</button>
        </div>
    </form>

    <main>
        <nav class="action">
            <ul>
                <li>
                    <a href="{{ route('rewards.create-form') }}">
                        <button type="button" class="add-button">+ Insert Reward</button>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Pagination Links -->
        <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
            {{ $reward->withQueryString()->links() }}
        </div>

        <!-- Reward Data Table -->
        <div class="container">
        <table>
            <tr class="headcol">
                <th>Reward Code</th>
                <th>Reward QTY</th>
                <th>Description</th>
                <th>Score</th>
                <th></th>
            </tr>
            <tbody>
                @foreach ($reward as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->score }}</td>
                        <td><a href="{{ route('rewards.view', ['reward_code' => $item->code]) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </main>

@endsection
