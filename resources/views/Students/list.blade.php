@extends('layouts.main')
@section('title', 'Student: List')
@section('content')

    <!-- หน้านี้แสดงรายการของรางวัล -->

    <!-- เนื้อหาหน้าเว็บ -->
    <form action="{{ route('students.list') }}" method="get" class="search-form">

        <!-- ค้นหารางวัล -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <br />

    </form>
    <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
        {{ $students->withQueryString()->links() }}
    </div>
    {{-- @php
        // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
        session()->put('bookmark.rewards.view', url()->full());
    @endphp --}}
    <!-- ตารางแสดงข้อมูลรางวัล -->
    <table class="/">
        <tr>
            <th>Studetn ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Major</th>
            <th>Score</th>
            <th>View</th>
        </tr>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->code }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->year }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->score }}</td>
                    <td> <a href="{{ route('students.view', ['student_code' => $student->code]) }}">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('students.create-form') }}">
        <button type="button" class="create-button">Insert student</button>
    </a>

@endsection
