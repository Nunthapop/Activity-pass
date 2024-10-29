@extends('layouts.main')
@section('title', 'Activity: List')
@section('content')

    <!-- This page displays the list of activities -->
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">

    <!-- Web page content -->
    {{-- <form action="{{ route('activities.list') }}" method="get" class="search-form">
        <div class="search-container">
            <label id="search">Search</label>
            <input type="text" name="term" value="{{ $search['term'] }}" />
            <button type="submit" class="nav-link">Search</button>
            <button type="reset">Clear</button>
        </div>
    </form> --}}

    <main>

        <!-- Add New Activity (Visible if Authorized) -->
        @can('create', \App\Models\Student::class)
        <nav class="action">
            <ul>
                <li class="action-item">
                    <a href="{{ route('activities.create-form') }}">
                        <button type="button" class="add-button">+ Add Activity</button>
                    </a>
                </li>
            </ul>
        </nav>
        @endcan

        <!-- Show pagination -->
        <div>{{ $activity->withQueryString()->links() }}</div>

        @php
            // Save the current URL in session for returning to the last viewed page
            session()->put('bookmark.activities.view', url()->full());
        @endphp

        <!-- Table to display activity data -->
        <div class="container">
        <table>
            <tr class="headcol">
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
                            <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </main>

@endsection
