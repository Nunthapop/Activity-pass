{{-- @extends('layouts.main')
@section('title', 'User: List')
@section('content')

    <!-- หน้านี้ใช้สำหรับแสดงรายการของผู้ใช้ -->

    <div>{{ $users->withQueryString()->links() }}</div>
    <form action="{{ route('user.list') }}" method="get">
        <label>
            Search
            <input type="text" name="term" value="{{ $search['term'] }}" />
        </label>
        <button type="submit" class="accent">Search</button>
        <a href="{{ route('user.list') }}">
            <button type="button" class="accent">Clear</button>
        </a>
    </form>

    <ul class="action-menu">
        <li class="action-item">
            @can('create', \App\Models\Shop::class)
                <a href="{{ route('users.create_form') }}">
                    <button type="button" class="nav-button">Create User</button>
                </a>
            @endcan
        </li>
    </ul>

    <body>
        <table class="lg:w-1/2">
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Role</th>
                <th>Year</th>
                <th>Branch</th>
                <th>Score</th>
            </tr>
            <tbody>
                <tr>
                    @foreach ($users as $user)
                        <td class="underline font-bold hover:text-blue-600">
                            <a href="{{ route('users.view', ['userEmail' => $user->email]) }}">
                                {{ $user->email }}</a>
                        </td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->role }}</td>
                        <td> {{ $user->year }}</td>
                        <td> {{ $user->branch }}</td>
                        <td> {{ $user->score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

@endsection --}}
