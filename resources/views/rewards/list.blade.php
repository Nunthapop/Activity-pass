@extends('layouts.main')
@section('title', 'Reward: List')
@section('content')

    <!-- หน้านี้แสดงรายการของรางวัล -->

    <!-- เนื้อหาหน้าเว็บ -->
    <form action="{{ route('rewards.list') }}" method="get" class="search-form">

        <!-- ค้นหารางวัล -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <br />

        <!-- ปุ่มค้นหาและเคลียร์ -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('rewards.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>

        <!-- เพิ่มรางวัลใหม่ -->
        @can('create', \App\Models\Product::class)
            <a href="{{ route('rewards.create_form') }}">
                <button type="button" class="nav-link">New Rewards</button>
            </a>
        @endcan

    </form>

    <!-- แสดงการแบ่งหน้า -->
    <div>{{ $products->withQueryString()->links() }}</div>

    @php
        // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
        session()->put('bookmark.rewards.view', url()->full());
    @endphp

    <!-- ตารางแสดงข้อมูลรางวัล -->
    <table class="/">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Score</th>
            <th>Description</th>
        </tr>
        <tbody>
            @foreach ($rewards as $reward)
                <tr>
                    <td>{{ $reward->code }}</td>
                    <td>{{ $reward->name }}</td>
                    <td>{{ $reward->score }}</td>
                    <td>
                        <a href="{{ route('rewards.view', ['reward' => $reward->code]) }}">
                            <button type="button" class="/">View</button>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
