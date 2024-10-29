@extends('layouts.main')
@section('title', 'Student Update: ' . $student->code)
@section('content')

<!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของ student -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}" type="text/css">

<div class="container">
    <form action="{{ route('students.update', ['student_code' => $student->code]) }}" method="POST">
        @csrf <!-- ป้องกันการโจมตี CSRF -->

        <div>
            <label for="code"><strong>Code:</strong></label>
            <input type="text" name="code" id="code" value="{{ $student->code }}" required>
        </div>
        <div>
            <label for="first_name"><strong>First Name:</strong></label>
            <input type="text" name="first_name" id="first_name" value="{{ $student->first_name }}" required>
        </div>
        <div>
            <label for="last_name"><strong>Last Name:</strong></label>
            <input type="text" name="last_name" id="last_name" value="{{ $student->last_name }}" required>
        </div>
        <div>
            <label for="year"><strong>Year:</strong></label>
            <select name="year" id="year" required>
                <option value="{{ $student->year }}">{{ $student->year }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div>
            <label for="major"><strong>Major:</strong></label>
            <select name="major" id="major" required>
                <option value="{{ $student->major }}">{{ $student->major }}</option>
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
                    <a href="{{ route('students.view', ['student_code' => $student->code]) }}">
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
