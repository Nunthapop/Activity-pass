@extends('layouts.main')
@section('title', 'Students List In Activity: ' . $activity->name)
@section('content')

    <form action="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}" method="get">
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

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('activities.add-students', ['activity_name' => $activity->name]) }}">
                        <button type="button" class="view-button">Add Students In This Activity</button>
                    </a>
                </li>

                <li>
                    <a href="{{ route('activities.view', ['activity_name' => $activity->name]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
            </ul>
        </nav>

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
