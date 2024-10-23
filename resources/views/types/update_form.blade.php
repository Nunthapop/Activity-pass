@extends('layouts.main')
@section('title', 'Type of Activity: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดต -->

    <!-- ฟอร์ม -->
    <form action="{{ route('types.update', ['type' => $type->code]) }}" method="POST">
        @csrf

        <!-- ฟิลด์สำหรับกรอกข้อมูล -->
        <p><strong>Code:</strong> <input type="text" name="code" value="{{ $type->code }}" required></p>
        <p><strong>Name:</strong> <input type="text" name="name" value="{{ $type->name }}" required></p>
        <p><strong>Description:</strong>
            <textarea name="description" cols="200" rows="10" required>{{ $type->description }}</textarea>
        </p>

        <!-- ปุ่มสำหรับส่งฟอร์ม -->
        <button type="submit">Submit</button>

    </form>

@endsection
