@extends('layouts.main')
@section('title', 'Student: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดตข้อมูลของสินค้า -->

    <!-- ฟอร์มสำหรับอัปเดตข้อมูลสินค้า -->
    <form action="{{ route('students.update', ['student_code' => $students->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูลสินค้า -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $students->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $students->username }}" required></p>
        <p><strong>Score:</strong> <input type="text" name="score" value="{{ $students->score }}" required></p>
        

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>

    </form>

@endsection
