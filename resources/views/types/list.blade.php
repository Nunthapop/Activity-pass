@extends('layouts.main')
@section('title', 'Type of Activity: List')
@section('content')

    <!-- หน้านี้แสดงประเภทกิจกรรม -->

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
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('types.create-form') }}">
                        <button type="button" class="add-button">Add Type Of Activity</button>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- แสดงการแบ่งหน้า -->
        <div>{{ $types->withQueryString()->links() }}</div>

        {{-- @php
            // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
            session()->put('bookmark.types.view', url()->full());
        @endphp --}}

        <!-- ตารางแสดงข้อมูลประเภทกิจกรรม -->
        <table class="/">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Number of Activities</th>
                <th>Details</th>
            </tr>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->code }}</td>
                        <td>{{ $type->Name }}</td>
                        <!-- แสดงจำนวนกิจกกรรมในประเภทนี้ -->
                        {{-- <td>{{ $type->activities_count }}</td> --}}
                        <td>
                            <a href="{{ route('types.view', ['type_code' => $type->code]) }}">
                                <button type="button" class="/">View</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
