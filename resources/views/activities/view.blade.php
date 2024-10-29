@extends('layouts.main')
@section('title', 'Activity: ' . $activity->name . $activity->code)
@section('content')


<link rel="stylesheet" href="{{ asset('css/view.css') }}" type="text/css">
<div class="container">
    <main>
        <!-- แสดงข้อมูล -->
        <div class="details">
            <div class="detail-item">
                <label><strong>Name:</strong></label>
                <span>{{ $activity->name }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Type:</strong></label>
                <span>{{ $type->name }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Reward:</strong></label>
                <span>{{ $reward->code }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Activity By:</strong></label>
                <span>{{ $activity->activity_by }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Date & Time:</strong></label>
                <span>{{ $activity->datetime }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Location:</strong></label>
                <span>{{ $activity->location }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Score:</strong></label>
                <span>{{ $activity->score }}</span>
            </div>
            <div class="detail-item">
                <label><strong>Description:</strong></label>
                <span>{{ $activity->description }}</span>
            </div>
        </div>
    </main>

    <!-- ปุ่ม action -->
    <nav>
        <ul class="action-menu">
            @can('create', \App\Models\Student::class)
            <li class="action-item">
                <a href="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}">
                    <button type="button" class="view-button">View Students In This Activity</button>
                </a>
            </li>
            @endcan

            <li class="action-item">
                <a href="{{ route('activities.list') }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>

            @can('create', \App\Models\Student::class)
                <li class="action-item">
                    <a href="{{ route('activities.update-form', ['activity_name' => $activity->name]) }}">
                        <button type="button" class="update-button">Update</button>
                    </a>
                </li>
            @endcan

            {{-- @can('create', \App\Models\Student::class)
                <li class="action-item">
                    <a href="{{ route('activities.delete', ['activity_name' => $activity->code]) }}">
                        <button type="button" class="delete-button">Delete</button>
                    </a>
                </li>
            @endcan --}}
        </ul>
    </nav>

</div>


@endsection
