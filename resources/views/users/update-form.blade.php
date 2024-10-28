@extends('layouts.main')
@section('title', 'User: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดต -->

    <form action="{{ route('user.update', ['userEmail' => $users->email]) }}" method="POST">
        @csrf

        <body>
            <p><strong> Name:</strong> <input type="text" name="name" value="{{ $users->name }}"></p>
            <p><strong> Password:</strong> <input type="text" name="password" placeholder="Leave bank if no change"
                    value=""></p>
            @can('update', \App\Models\Product::class)
                <p><strong> Role:</strong> {{ $users->role }}</p>
            @endcan
        </body>

        <!-- ปุ่ม action -->
        <nav>
            <ul class="action-menu">
                <li class="action-item">
                    <a href="{{ route('users.view', ['user' => $user->code]) }}">
                        <button type="button" class="back-button">Back</button>
                    </a>
                </li>
                <li class="action-item">
                    <button type="submit" class="submit-button">Submit</button>
                </li>
                <li class="action-item">
                    <button type="clear" class="cancel-button">Cancel</button>
                </li>
            </
    </form>

@endsection
