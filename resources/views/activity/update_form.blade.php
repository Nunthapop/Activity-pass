{{-- @extends('layouts.main')
@section('title', 'Activity: Update')
@section('content')

    <!-- หน้าอัปเดตกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('activities.update', ['activity' => $activity->code]) }}" method="POST">
        @csrf

        <!-- ข้อมูลกิจกรรม -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $activity->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $activity->name }}" required></p>
        <p><strong>Date:</strong> <input type="text" name="date" value="{{ $activity->date }}" required></p>
        <p><strong>Time:</strong> <input type="text" name="time" value="{{ $activity->time }}" required></p>
        <p><strong>Activity Type:</strong> <input type="text" name="type" value="{{ $activity->type }}" required></p>
        <p><strong>Activity By:</strong> <input type="text" name="by" value="{{ $activity->by }}" required></p>
        <p><strong>Location:</strong> <input type="text" name="location" value="{{ $activity->location }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="score" value="{{ $activity->score }}" required></p>
        <p><strong>Description:</strong>
            <textarea name="description" cols="200" rows="10" required>{{ $reward->description }}</textarea>
        </p>

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>
        
    </form>

@endsection --}}
