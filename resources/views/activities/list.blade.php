@extends('layouts.main')
@section('title', 'Activity: List')
@section('content')

    <!-- This page displays the list of activities -->

    <!-- Web page content -->
    <form action="{{ route('activities.list') }}" method="get" class="search-form">

        <!-- Search -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <!-- Search and Clear buttons -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('activities.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>

    </form>

    <main>

        <!-- Add New Activity (Visible if Authorized) -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('activities.create-form') }}">
                        <button type="button" class="add-button">Add Activity</button>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Show pagination -->
        <div>{{ $activity->withQueryString()->links() }}</div>

        @php
            // Save the current URL in session for returning to the last viewed page
            session()->put('bookmark.activities.view', url()->full());
        @endphp

        <!-- Table to display activity data -->
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Date & Time</th>
                <th>Location</th>
                <th>Score</th>
                <th>Details</th>
            </tr>
            <tbody>
                @foreach ($activity as $activityItem)
                    <tr>
                        <td>{{ $activityItem->name }}</td>
                        <td>{{ $activityItem->datetime }}</td>
                        <td>{{ $activityItem->location }}</td>
                        <td>{{ $activityItem->score }}</td>
                        <td>
                            <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">
                                <button type="button" class="/">View</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>

@endsection
