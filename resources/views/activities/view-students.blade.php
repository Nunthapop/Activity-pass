@extends('layouts.main')
@section('title', 'Students List In Activity: ' . $activity->name)
@section('content')

    <li>
        <a href="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}">
            <button type="button" class="nav-button">Add students to {{ $activity->name }}</button>
        </a>
    </li>
    <form action="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}" method="get">
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <br />

        <!-- Search and Clear buttons -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('activities.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>
    </form>
    <main>
        <!-- รายละเอียดกิจกรรม -->
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Major</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->major }}</td>
                        <td>{{ $item->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

@endsection
