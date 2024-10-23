@extends('layouts.main')
@section('title', 'User: Create')
@section('content')

    <form action="{{ route('users.create') }}" method="POST">
        @csrf

        <body>
            <p><strong> Email:</strong> <input type="text" name="email"></p>
            <p><strong> Name:</strong> <input type="text" name="name"></p>
            <p><strong> Password:</strong> <input type="text" name="password"></p>
            <p><strong> Role:</strong>
                <select name="role">
                    <option value="ADMIN">Admin</option>
                    <option value="USER">User</option>
                </select>
            </p>
            <p><strong> Year:</strong> <input type="text" name="year" value="{{ $users->year }}"></p>
            <p><strong> Branch:</strong> <input type="text" name="branch" value="{{ $users->branch }}"></p>
            <p><strong> Score:</strong> <input type="number" name="score" value="{{ $users->score }}"></p>

        </body>
        <button type="submit">Submit</button>
    </form>

@endsection
