@extends('layouts.main')
@section('title', 'Student: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของสินค้า -->

    <!-- ฟอร์มสำหรับอัปเดตข้อมูลสินค้า -->
    <form action="{{ route('students.update', ['student_code' => $students->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูลสินค้า -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $students->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="username" value="{{ $students->username }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="first_name" value="{{ $students->first_name }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="last_name" value="{{ $students->last_name }}" required></p>
        <p><strong>Year:</strong> <input type="text" name="year" value="{{ $students->year }}" required></p>
        <p><strong>Branch:</strong> 
        <select name="major" required>
            <option value="">Select Major</option>
            <option value="SE">SE</option>
            <option value="DII">DII</option>
            <option value="MMIT" selected>MMIT</option> <!-- This option will be selected -->
            <option value="DG">DG</option>
            <option value="ANI">ANI</option>
        </select> </p>

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>

    </form>

@endsection
