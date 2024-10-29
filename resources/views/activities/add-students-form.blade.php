@extends('layouts.main')
@section('title', 'Add Students To ' . $activity->name)
@section('content')

<link rel="stylesheet" href="{{ asset('css/list.css') }}" type="text/css">
    <form action="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}" method="post"
        class="search-form">@csrf
        <main>

            <!-- แสดงหน้าลิงค์เพจ -->
            <div class="pagination">{{ $students->withQueryString()->links() }}</div>
    <div class="container">
            <table>
                <tr class="headcol">
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Major</th>
                    <th>Score</th>
                    <th>Add</th>
                </tr>
                <tbody>
                    @foreach ($students as $item)
                        <tr>
                            <td class="underline">
                                {{ $item->code }} </td>
                            <td> {{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->major }}</td>
                            <td>{{ $item->score }}</td>
                            <td><button type="submit" name="code" value="{{ $item->code }}"
                                    class="add-button">Add</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </div></main>

    </form>
    <!-- ปุ่ม action -->
    <nav class="action">
        <ul>
            <li>
            <a href="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}">Back</a>
            </li>
        </ul>
    </nav>

    </html>

@endsection
