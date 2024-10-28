@extends('layouts.main')
@section('title', $activity->code)
@section('content')

    <!-- เมนูจัดการหน้ารางวัล -->
    {{-- <ul class="action-menu">

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
    </ul> --}}



    <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}">
                    <button type="button" class="view-button">View students in this activity</button>
                </a>
            </li>

            @can('update', \App\Models\activities::class)
                <li class="action-item">
                    <a href="{{ route('activities.update-form', ['activity_name' => $activity->code]) }}">
                        <button type="button" class="update-button">Update</button>
                    </a>
                </li>
            @endcan

            @can('delete', \App\Models\activities::class)
                <li class="action-item">
                    <a href="{{ route('activities.delete', ['activity_name' => $activity->code]) }}">
                        <button type="button" class="delete-button">Delete</button>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>

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
                    <td>{{ $activity->type }}</td>
                    <td>{{ $activity->activity_by }}</td>
                    <td>{{ $activity->location }}</td>
                    <td>{{ $activity->score }}</td>
                    <td>{{ $activity->description }}</td>
                </tr>
            </tbody>
        </table>
    </main>


@endsection
