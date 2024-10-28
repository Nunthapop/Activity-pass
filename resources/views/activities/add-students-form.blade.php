@extends('layouts.main')
@section('title', 'Add Students To ' . $activity->name)
@section('content')

    <form action="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}" method="post"
        class="search-form">
        @csrf
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>
        <button type="submit" class="primary">Search</button>

        <a href="{{ route('activities.add-students-form', ['activity_name' => $activity->name]) }}">
            <button type="button" class="accent">Clear</button>
        </a>

        @csrf
        <main>
            <!-- ปุ่ม action -->
            <nav>
                <li>
                    <a href="{{ route('activities.view-students', ['activity_name' => $activity->name]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
                </ul>
            </nav>

            <!-- แสดงหน้าลิงค์เพจ -->
            <div>{{ $students->withQueryString()->links() }}</div>

            <table class="lg:w-1/2">
                <tr>
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
                            <td> <button type="submit" name="code" value="{{ $item->code }}"
                                    class="add-button">Add</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </main>

    </form>

    </html>

@endsection
