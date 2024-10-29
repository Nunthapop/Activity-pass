@extends('layouts.main')
@section('title', 'Student: List')
@section('content')

    <!-- หน้านี้แสดงรายการของรางวัล -->

    <link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">
    <!-- Web page content -->
        {{-- <form action="{{ route('students.list') }}" method="get" class="search-form">
            <div class="search-container">
                <label id="search"> Search </label>
                <input type="text" name="term" value="{{ $search['term'] }}" />
                <button type="submit">Search</button>
                <button type="reset">Clear</button>
            </div>
        </form>   --}}

    <main>

        <!-- ปุ่ม action -->
        <nav class="action">
            <ul>
                <li>
                    <a href="{{ route('students.create-form') }}">+ Insert Student</a>
                </li>
                <li>
                    <label>Export to .xlsx file<a href="{{ route('students.export') }}">Export students</a></label>
                </li>
            </ul>
        </nav> 
        <div class="pagination">
            {{ $students->withQueryString()->links() }}
        </div>

        <!-- ตารางแสดงข้อมูล -->
        <div class="container">
        <table>
            <tr class="headcol">
                <th>Student ID</th>
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
    </div>
    </main>

@endsection
