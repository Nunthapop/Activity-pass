@extends('layouts.main')
@section('title', 'Reward: List')
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

        <!-- ปุ่มค้นหาและเคลียร์ -->
        {{-- <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('rewards.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>

        <!-- เพิ่มรางวัลใหม่ -->
        @can('create', \App\Models\Product::class)
            <a href="{{ route('rewards.create_form') }}">
                <button type="button" class="nav-link">New Rewards</button>
            </a>
        @endcan --}}

    </form>
    <div style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
        {{$students->withQueryString()->links()}}
    </div>
    {{--@php
        // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
        session()->put('bookmark.rewards.view', url()->full());
    @endphp--}}
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
    <a href="{{ route('students.create-form') }}">Insert student</a>

@endsection
