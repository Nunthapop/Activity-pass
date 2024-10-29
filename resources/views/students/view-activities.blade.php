@extends('layouts.main')
@section('title', 'View Activities Of Student: ' . $students->code)
@section('content')

<link rel="stylesheet" href="{{ asset('css/viewlist.css') }}" type="text/css">
    <main>

        <div class="pagination">{{ $activities->withQueryString()->links() }}</div>

        <div class="container">
        <table>
            <tr class="headcol">
                <th>Name</th>
                <th>Date & Time</th>
                <th>Details</th>
                <th>Delete</th>
            </tr>
            <tbody>
                @foreach ($activities as $activityItem)
                    <tr>
                        <td>{{ $activityItem->name }}</td>
                        <td>{{ $activityItem->datetime }}</td>
                        <td>
                            <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">
                                <button type="button" class="/">View</button>
                            </a>
                        </td>
                        <td>
                            {{-- <a
                                href="{{ route('students.remove-activity', ['activity_name' => $activityItem->name, 'student_code' => $student->code]) }}">
                                <button type="button" class="delete-button">Delete</button>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ปุ่ม action -->
    </div>
    <nav>
        <ul class="action-menu">
            <li>
                <a href="{{ route('students.view', ['student_code' => $students->code]) }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
        </ul>
    </nav>

        @php
            session()->put('bookmark.activities.view', url()->full());
        @endphp

    </main>

@endsection
