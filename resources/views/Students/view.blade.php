 @extends('layouts.main')
@section('title', 'studetn code')
@section('content'){{--

    <!-- เมนูจัดการหน้ารางวัล -->
    <ul class="action-menu">

        @can('update', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('rewards.update-form', ['reward' => $reward->code]) }}">
                    <button type="button" class="nav-button">Update</button>
                </a>
            </li>
        @endcan

        @can('delete', \App\Models\Product::class)
            <li class="action-item">
                <a href="{{ route('rewards.delete', ['reward' => $reward->code]) }}">
                    <button type="button" class="nav-button">Delete</button>
                </a>
            </li>
        @endcan
    </ul>--}}


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
