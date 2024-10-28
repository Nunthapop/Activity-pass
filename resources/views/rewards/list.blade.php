@extends('layouts.main')
@section('title', 'Reward: List')
@section('content')

    <!-- Reward List Page -->

    <!-- Search Form -->
    <form action="{{ route('rewards.list') }}" method="get" class="search-form">

        <!-- Search Rewards -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <br />

        <!-- Search and Clear Buttons -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('rewards.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>

        <!-- Add New Reward (Visible if Authorized) -->
        <a href="{{ route('rewards.create-form') }}">
            <button type="button" class="nav-link">Insert Reward</button>
        </a>

    </form>

    <!-- Pagination Links -->
    <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
        {{ $reward->withQueryString()->links() }}
    </div>

    <!-- Reward Data Table -->
    <table class="/">
        <tr>
            <th>Reward Code</th>
            <th>Reward QTY</th>
            <th>Description</th>
            <th>Score</th>

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

@endsection
