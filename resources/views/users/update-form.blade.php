{{-- @extends('layouts.main')
@section('title', 'User: Update')
@section('content')

    <!-- หน้านี้ใช้สำหรับอัปเดต -->

    <form action="{{ route('user.update', ['userEmail' => $users->email]) }}" method="POST">
        @csrf

        <body>
            <p><strong> Email:</strong> <input type="text" name="email" value="{{ $users->email }}"></p>
            <p><strong> Name:</strong> <input type="text" name="name" value="{{ $users->name }}"></p>
            <p><strong> Password:</strong> <input type="text" name="password" placeholder="Leave bank if no change"
                    value=""></p>
            @can('update', \App\Models\Product::class)
                <p><strong> Role:</strong> {{ $users->role }}</p>
            @endcan
            <p><strong> Year:</strong> <input type="text" name="year" value="{{ $users->year }}"></p>
            <p><strong> Branch:</strong> <input type="text" name="branch" value="{{ $users->branch }}"></p>
            <p><strong> Score:</strong> <input type="number" name="score" value="{{ $users->score }}"></p>
        </body>

        <ul class="action-menu">
            <li class="action-item">
                <a href="{{ route('user.view', ['userEmail' => $users->email]) }}">
                    <button type="button" class="nav-button">&lt; Back</button>
                </a>
            </li>
            <li class="action-item">
                <button type="submit" class="nav-button">Submit</button>
            </li>
        </ul>

    </form>

@endsection --}}
