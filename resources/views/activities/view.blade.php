@extends('layouts.main')
@section('title', $activity->code)
@section('content')

    <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}">
                    <button type="button" class="view-button">View students in this activity</button>
                </a>
            </li>

           {{-- @can('update', \App\Models\activities::class)
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
            @endcan --}}
        </ul>
    </nav>

    <main>

        <!-- แสดงข้อมูล -->
        <table class="">
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $activity->name }}</td>
            </tr>
            <tr>
                <td><strong>Type:</strong></td>
                <td>{{ $type->name }}</td>
            </tr>
            <tr>
                <td><strong>Activity By:</strong></td>
                <td>{{ $activity->activity_by }}</td>
            </tr>
            <tr>
                <td><strong>Date & Time:</strong></td>
                <td>{{ $activity->datetime }}</td>
            </tr>
            <tr>
                <td><strong>Location:</strong></td>
                <td>{{ $activity->location }}</td>
            </tr>
            <tr>
                <td><strong>Score:</strong></td>
                <td>{{ $activity->score }}</td>
            </tr>  
            <tr>    
                <td><strong>Description:</strong></td>
                <td>{{ $activity->description }}</td>
            </tr>
        </table>

    </main>

@endsection
