@extends('layouts.main')
@section('title', 'Student: List')
@section('content')

    <!-- หน้านี้แสดงรายการของรางวัล -->

    <!-- Web page content -->
    <form action="{{ route('students.list') }}" method="get" class="search-form">

        <!-- Search -->
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
                    <a href="{{ route('students.create-form') }}">
                        <button type="button" class="add-button">Insert Student</button>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="pagination">
            {{ $students->withQueryString()->links() }}
        </div>

        <!-- ตารางแสดงข้อมูล -->
        <table class="/">
            <tr>
                <th>Studetn ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Major</th>
                <th>Score</th>
                <th>View</th>
            </tr>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->year }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->score }}</td>
                        <td> <a href="{{ route('students.view', ['student_code' => $student->code]) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>

@endsection
