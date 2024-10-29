@extends('layouts.main')
@section('title', 'Insert Student')
@section('content')

    <!-- หน้าสร้างรางวัล -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

    <!-- ฟอร์ม -->
    <div class="container">
    <form action="{{ route('students.create') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        <div>
            <label for="student_id"><strong>Student ID</strong></label>
            <input type="text" id="student_id" name="code" placeholder="Enter Student ID" required>
        </div>
    
        <div>
            <label for="first_name"><strong>First Name</strong></label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter Student's First Name" required>
        </div>
    
        <div>
            <label for="last_name"><strong>Last Name</strong></label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter Student's Last Name" required>
        </div>
    
        <div>
            <label for="year"><strong>Year</strong></label>
            <select id="year" name="year" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    
        <div>
            <label for="major"><strong>Major</strong></label>
            <select id="major" name="major" required>
                <option value="">Select Major</option>
                <option value="SE">SE</option>
                <option value="DII">DII</option>
                <option value="MMIT">MMIT</option>
                <option value="DG">DG</option>
                <option value="ANI">ANI</option>
            </select>
        </div>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('students.list') }}">
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
