@extends('layouts.main')
@section('title', 'Add Activities For Type: ' . $type->code)
@section('content')


    <main>
        <!-- ปุ่ม action -->
        <nav>
            <li>
                <a href="{{ route('types.view-activities', ['type' => $type->code]) }}">
                    <button type="button" class="back-button">Back</button>
                </a>
            </li>
            </ul>
        </nav>

        <!-- แสดงหน้าลิงค์เพจ -->
        <div>{{ $activities->withQueryString()->links() }}</div>

        <!-- ฟอร์มเพิ่มกิจกรรมของ type -->
        <form action="{{ route('types.add-activities', ['type' => $type->code]) }}" method="POST">
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
                                <button type="submit" name="type" value="{{ $activity->code }}"
                                    class="add-button">Add</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

    </main>

@endsection
