{{-- @extends('layouts.main')
@section('title', 'Activity: Create')
@section('content')

    <!-- สร้างกิจกรรม -->

    <!-- ฟอร์ม -->
    <form action="{{ route('activityies.create') }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <!-- กรอกข้อมูล -->
        <p>
            <strong> Code:</strong>
            <input type="text" name="code" required>
        </p>
        <p>
            <strong> Name:</strong>
            <input type="text" name="name" required>
        </p>
        <p>
            <strong> Date:</strong>
            <input type="text" name="date" required>
        </p>
        <p>
            <strong> Time:</strong>
            <input type="text" name="time" required>
        </p>
        <p>
            <strong> Activity Type:</strong>
            <input type="text" name="type" required>
        </p>
        <p>
            <strong> Activity By:</strong>
            <input type="text" name="by" required>
        </p>
        <p>
            <strong> Location:</strong>
            <input type="text" name="location" required>
        </p>
        <p>
            <strong> Score:</strong>
            <input type="text" name="score" required>
        </p>
        <p>
            <strong> Description:</strong>
            <textarea name="description" cols="200" rows="10" required></textarea>
        </p>

        <button type="submit">Submit</button>

    </form>

@endsection --}}
