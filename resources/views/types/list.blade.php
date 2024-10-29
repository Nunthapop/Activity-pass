@extends('layouts.main')
@section('title', 'Type of Activity: List')
@section('content')

    <!-- หน้านี้แสดงประเภทกิจกรรม -->

    <link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">
    <!-- เนื้อหาหน้าเว็บ -->
    {{-- <form action="{{ route('types.list') }}" method="get" class="search-form">

        <!-- ค้นหา -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>
        <!-- ปุ่มค้นหาและเคลียร์ -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('types.list') }}">
            <button type="button" class="clear-link">Clear</button>
        </a>

        <!-- เพิ่มประเภทกิจกรรม -->
        @can('create', \App\Models\Product::class)
            <a href="{{ route('types.create_form') }}">
                <button type="button" class="add-link">Add Type of Activity</button>
            </a>
        @endcan

    </form> --}}

    <!-- แสดงการแบ่งหน้า -->
    <div>{{ $types->withQueryString()->links() }}</div>

        <!-- Add New Type (Visible if Authorized) -->
        @can('create', \App\Models\Student::class)
        <nav class="action">
            <ul>
                <li>
                    <a href="{{ route('types.create-form') }}">+ Add Type Of Activity</a>
                </li>
            </ul>
        </nav>
        @endcan

        <!-- แสดงการแบ่งหน้า -->
        <div class="pagination">{{ $types->withQueryString()->links() }}</div>

        {{-- @php
            // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
            session()->put('bookmark.types.view', url()->full());
        @endphp --}}

        <!-- ตารางแสดงข้อมูลประเภทกิจกรรม -->
        <div class="container">
        <table>
            <tr class="headcol">
                <th>Code</th>
                <th>Name</th>
                <th>View Activity</th>
              
            </tr>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->code }}</td>
                        <td>{{ $type->name }}</td>
                        <!-- แสดงจำนวนกิจกกรรมในประเภทนี้ -->
                        {{-- <td>{{ $type->activities_count }}</td> --}}
                        <td>
                            <a href="{{ route('types.view', ['type_code' => $type->code]) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
