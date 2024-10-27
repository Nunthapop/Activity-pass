@extends('layouts.main')
@section('title', 'Activity: Update')
@section('content')

    <!-- หน้าอัปเดตกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('activities.update', ['activity_name' => $activity->name]) }}" method="POST">
        @csrf

        <!-- ข้อมูลกิจกรรม -->

        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $activity->name }}" required></p>
        <p><strong>Date:</strong> <input type="text" name="date" value="{{ $activity->datetime }}" required></p>
        <p><strong>Time:</strong> <input type="text" name="time" value="{{ $activity->activity_by }}" required></p>
        <p><strong>Activity Type:</strong> <input type="text" name="type" value="{{ $activity->location }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="score" value="{{ $activity->score }}" required></p>
        <p><strong>Description:</strong>
            <textarea name="description" cols="200" rows="10" required>{{ $activity->description }}</textarea>
            <p><strong>Type</strong> 
               {{-- {{$type->id}} --}}
        <select name="type" required>
     <option value="{{ $type_id->id }}">{{ $type_id->name }} @selected(true)</option>
            @foreach ($type as $item)
                @if ($item->id !== $type_id->id)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endif
            @endforeach
            {{-- <select name="major" required>
                <option value="">Select Major</option>
                <option value="SE">SE</option>
                <option value="DII">DII</option>
                <option value="MMIT" selected>MMIT</option> <!-- This option will be selected -->
                <option value="DG">DG</option>
                <option value="ANI">ANI</option>
            </select>
     --}} 

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>
        
    </form>

@endsection
