@extends('layouts.main')
@section('title', 'Students')
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
                    <th>Date</th>
                    <th>Time</th>
                    <th>Activity Type</th>
                    <th>Activity By</th>
                    <th>Location</th>
                    <th>Score</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($students as $item)
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->year }}</td>
                    <td>{{ $item->major }}</td>
                    <td>{{ $item->score }}</td>
                    @endforeach
                    
                  
                </tr>
            </tbody>
        </table>
    </main>

@endsection
