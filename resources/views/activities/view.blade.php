@extends('layouts.main')
@section('title', $activity->code)
@section('content')

    <!-- เมนูจัดการหน้ารางวัล -->
    <ul class="action-menu">

        @can('update', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('activities.update-form', ['activity' => $activity->code]) }}">
                    <button type="button" class="nav-button">Update</button>
                </a>
            </li>
        @endcan

        @can('delete', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('activities.delete', ['activity' => $activity->code]) }}">
                    <button type="button" class="nav-button">Delete</button>
                </a>
            </li>
        @endcan
    </ul>


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
                    <td>{{ $activity->code }}</td>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->date }}</td>
                    <td>{{ $activity->time }}</td>
                    <td>{{ $activity->activity_type }}</td>
                    <td>{{ $activity->activity_by }}</td>
                    <td>{{ $activity->location }}</td>
                    <td>{{ $activity->score }}</td>
                    <td>{{ $activity->description }}</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection
