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
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $students->code }}</td>
                    <td>{{ $students->username }}</td>
                    <td>{{ $students->score }}</td>
                    <td>{{ $students->major }}</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection 
