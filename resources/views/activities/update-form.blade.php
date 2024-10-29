@extends('layouts.main')
@section('title', 'Activity: Update')
@section('content')

<!-- หน้าอัปเดตกิจกรรม -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

<div class="container">
    <form action="{{ route('activities.update', ['activity_name' => $activity->name]) }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <!-- ข้อมูลกิจกรรม -->
        <div>
            <label for="name"><strong>Name:</strong></label>
            <input type="text" name="name" id="name" value="{{ $activity->name }}" required>
        </div>
        <div>
            <label for="type"><strong>Type</strong></label>
            <select name="type" id="type" required>
                <option value="{{ $type_id->name }}" @selected(true)>{{ $type_id->name }}</option>
                @foreach ($type as $item)
                    @if ($item->id !== $type_id->id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <label for="activity_by"><strong>Activity By:</strong></label>
            <input type="text" name="activity_by" id="activity_by" value="{{ $activity->activity_by }}" required>
        </div>
        <div>
            <label for="datetime"><strong>Date & Time:</strong></label>
            <input type="datetime-local" name="datetime" id="datetime" value="{{ $activity->datetime }}" required>
        </div>
        <div>
            <label for="location"><strong>Location:</strong></label>
            <input type="text" name="location" id="location" value="{{ $activity->location }}" required>
        </div>
        <div>
            <label for="score"><strong>Score:</strong></label>
            <input type="text" name="score" id="score" value="{{ $activity->score }}" required>
        </div>
        <div>
            <label for="description"><strong>Description:</strong></label>
            <textarea name="description" id="description" cols="200" rows="10" required>{{ $activity->description }}</textarea>
        </div>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('activities.view', ['activity_name' => $activity->name]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
                <li class="action-item">
                    <button type="submit" class="submit-button">Submit</button>
                </li>
                <li class="action-item">
                    <button type="reset" class="cancel-button">Cancel</button>
                </li>
            </ul>
        </nav>
    </form>
</div>


@endsection
