@extends('layouts.main')
@section('title', 'Students List In Activity: ' . $activity->name)
@section('content')

<link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">
    <main>
        <!-- รายละเอียดกิจกรรม -->
        <div class="container">
        <table>
                <tr class="headcol">
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Major</th>
                    <th>Score</th>
                </tr>
            <tbody>
                @foreach ($students as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                        <td>{{ $item->year }}</td>
                        <td>{{ $item->major }}</td>
                        <td>{{ $item->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div></main>

            <!-- ปุ่ม action -->
            <nav class="action">
                <ul>
                    <li>
                        <a href="{{ route('activities.add-students', ['activity_name' => $activity->name]) }}">Add Students In This Activity</a>
                    </li>
    
                    <li>
                        <a href="{{ route('activities.view', ['activity_name' => $activity->name]) }}">Back</a>
                    </li>
                </ul>
            </nav>

@endsection
