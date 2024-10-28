@extends('layouts.main')
@section('title', 'View Activities Of Type: ' . $type->name)
@section('content')

    <form action="{{ route('types.view-activities', ['activity_name' => $activity->name]) }}" method="get">
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>

        <!-- Search and Clear buttons -->
        <button type="submit" class="nav-link">Search</button>
        <a href="{{ route('activities.list') }}">
            <button type="button" class="nav-link">Clear</button>
        </a>
    </form>

    <main>
        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('types.add-activities', ['type_code' => $type->code]) }}">
                        <button type="button" class="view-button">Add Acrivities In This Type</button>
                    </a>
                </li>

                <li>
                    <a href="{{ route('types.view', ['type_code' => $type->code]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
            </ul>
        </nav>

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
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>

@endsection
