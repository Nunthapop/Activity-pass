@extends('layouts.main')
@section('title', 'View Activities Of Student: ' . $student->code)
@section('content')

    <!-- ปุ่มเพิ่มกิจกรรม (เฉพาะผู้มีสิทธิ์) -->
    <ul class="action-menu">
        <li class="action-item">
            @can('create', \App\Models\Type::class)
                <a href="{{ route('types.add-activities-form', ['type_code' => $type->code]) }}">
                    <button type="button" class="create-button">Add Activity</button>
                </a>
            @endcan
        </li>
    </ul>

    <!-- แสดงลิงก์สำหรับการแบ่งหน้า -->
    <div>{{ $products->withQueryString()->links() }}</div>

    @php
        session()->put('bookmark.activities.view', url()->full());
    @endphp

    <!-- ตารางกิจกรรม -->
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Date & Time</th>
            <th>Details</th>
        </tr>
        <tbody>
            @foreach ($activity as $activityItem)
                <tr>
                    <td>{{ $activityItem->code }}</td>
                    <td>{{ $activityItem->name }}</td>
                    <td>{{ $activityItem->datetime }}</td>
                    <td>
                        <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">
                            <button type="button" class="/">View</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection