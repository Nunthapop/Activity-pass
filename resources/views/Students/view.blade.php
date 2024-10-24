 @extends('layouts.main')
@section('title', 'studetn code')
@section('content')




{{-- @can('update', \App\Models\Product::class) --}}
            <li class="">
                <a href="{{ route('students.update-form', ['student_code' => $students->code]) }}">
                    <button type="button" class="nav-button">Update</button>
                </a>
            </li>
        {{-- @endcan --}}

    <main>
        <!-- รายละเอียดรางวัล -->
        <table style="border: 1px solid black; border-collapse: collapse; ">
            <thead>
                <tr>
                    <th >Code</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th>firts_name</th>
                    <th>last_name</th>
                    <th>year</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $students->code }}</td>
                    <td>{{ $students->username }}</td>
                    <td>{{ $students->score }}</td>
                    <td>{{ $students->first_name }}</td>
                    <td>{{ $students->last_name }}</td>
                    <td>{{ $students->year }}</td>
                    <td>{{ $students->passowrd }}</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection 
