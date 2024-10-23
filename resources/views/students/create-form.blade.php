{{-- @extends('layouts.main')
@section('title', 'Reward: Create')
@section('content')

    <!-- หน้าสร้างรางวัล -->

    <!-- ฟอร์ม -->
    <form action="{{ route('rewards.create') }}" method="POST">
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
