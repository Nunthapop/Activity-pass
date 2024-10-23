{{-- @extends('layouts.main')
@section('title', 'Activity: List')
@section('content')

    <!-- หน้านี้แสดงรายการกิจกรรม -->

    <!-- เนื้อหาหน้าเว็บ -->
    <form action="{{ route('activity.list') }}" method="get" class="search-form">

        <!-- ค้นหา -->
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <br />

        <!-- ปุ่มค้นหาและเคลียร์ -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('activityies.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>

        <!-- เพิ่มกิจกรรมใหม่ -->
        @can('create', \App\Models\Product::class)
            <a href="{{ route('activityies.create_form') }}">
                <button type="button" class="nav-link">Add Activity</button>
            </a>
        @endcan

    </form>

    <!-- แสดงการแบ่งหน้า -->
    <div>{{ $products->withQueryString()->links() }}</div>

    @php
        // บันทึก URL ปัจจุบันใน session เพื่อใช้ในการกลับไปยังหน้าที่เคยเข้าชม
        session()->put('bookmark.activityies.view', url()->full());
    @endphp

    <!-- ตารางแสดงข้อมูลรางวัล -->
    <table class="/">
        <tr>
            <th>Code</th>
            <th>Date</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
        <tbody>
            @foreach ($activityies as $activity)
                <tr>
                    <td>{{ $activity->code }}</td>
                    <td>{{ $activity->date }}</td>
                    <td>{{ $activity->name }}</td>
                    <td>
                        <a href="{{ route('activityies.view', ['activity' => $activity->code]) }}">
                            <button type="button" class="/">View</button>
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection --}}
