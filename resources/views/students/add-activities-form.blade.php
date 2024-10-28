@extends('layouts.main')
@section('title', 'Add Activities For Student: ' . $student->code)
@section('content')

    <!-- ฟอร์มเพิ่มกิจกรรม -->

    <!-- กลับหน้ากิจกรรม -->
    <nav>
        <ul class="action-menu">
            <li class="action-item">
            <li>
                <a href="{{ route('activities.view-activities', ['activity' => $activity->code]) }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
        </ul>
    </nav>

    <!-- แสดงหน้าลิงค์เพจ -->
    <div>{{ $activities->withQueryString()->links() }}</div>

    <!-- ฟอร์มเพิ่มกิจกรรมของ student -->
    <form action="{{ route('students.add-activities', ['student' => $student->code]) }}" method="POST">
        @csrf

        @php
            session()->put('bookmark.activities.view', url()->full());
        @endphp

        <!-- ตารางแสดงผลิตภัณฑ์ -->
        <table class="">
            <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Date & Time</th>
                    <th>Location</th>
                    <th>Score</th>
                    <th>Add Activity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activity as $activityItem)
                    <tr>
                        <td>{{ $activityItem->name }}</td>
                        <td>{{ $activityItem->datetime }}</td>
                        <td>{{ $activityItem->location }}</td>
                        <td>{{ $activityItem->score }}</td>
                        <td>
                            <!-- ปุ่มเพิ่ม activity -->
                            <button type="submit" name="student" value="{{ $activity->code }}" class="add-buttin">Add</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>

@endsection
