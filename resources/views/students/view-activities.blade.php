@extends('layouts.main')
@section('title', 'View Activities Of Student: ' . $students->code)
@section('content')

    <!-- ปุ่มเพิ่มกิจกรรม (เฉพาะผู้มีสิทธิ์) -->
    <ul class="action-menu">
        <li class="action-item">
            @can('create', \App\Models\Student::class)
                <a href="{{ route('students.add-activities-form', ['student_code' => $student->code]) }}">
                    <button type="button" class="create-button">Add Activity</button>
                </a>
            @endcan
        </li>
    </ul>

    <!-- แสดงลิงก์สำหรับการแบ่งหน้า -->
    <div>{{ $activities->withQueryString()->links() }}</div>

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
            <th>Delete</th>
        </tr>
        <tbody>
            @foreach ($activities as $activityItem)
                <tr>
                    <td>{{ $activityItem->code }}</td>
                    <td>{{ $activityItem->name }}</td>
                    <td>{{ $activityItem->datetime }}</td>
                    <td>
                        <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">
                            <button type="button" class="/">View</button>
                        </a>
                    </td>
                    @can('create', \App\Models\Student::class)
                        <td>
                            <a
                                href="{{ route('students.remove-activity', ['activity_name' => $activity->name, 'student_code' => $student->code]) }}">
                                <button type="button" class="delete-button">delete</button>
                            </a>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
