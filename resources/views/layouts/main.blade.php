<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>Activity Pass</title>
</head>

<body>

    <header>
        <div id="main-header">
            <h1>
                @section('title-container')@yield('title')@show
                </h1>
                <nav class="main-nav">
                    <ul class="nav-list">

                        <li>Home</a></li>
                        {{-- <li><a href="{{ route('home.profile', ['student_code' => session('student_code')]) }}">Profile</a></li> --}}
                        <li><a href="{{ route('activities.list') }}">Activity</a></li>
                        
                        <li><a href="{{ route('types.list') }}">Type</a></li>
                        <li><a href="{{ route('rewards.list') }}">Reward</a></li>
                        <li><a href="{{ route('students.list') }}">Student</a></li>


                        {{-- @can('Enter', \App\Models\UserPolicy::class) --}}
                        {{-- <li> <a href="{{ route('user.list') }}">User</a></li> --}}
                        {{-- @endcan --}}
                    </ul>
                    @auth
                        <nav class="app-cmp-user-panel">


                            <a href="{{ route('students.list', ['Email' => Auth::user()->email]) }}">
                                {{ \Auth::user()->name }}</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        </nav>
                    @endauth
                </nav>
            </div>
        </header>


        @session('message')
            <span> {{ $value }}</span>
        @endsession
        @error('error')
            {{ $message }}
        @enderror

        <div id="main-content">
            @yield('content')
        </div>

        <footer id="main-footer">
            &#xA9; Copyright Activity Pass, By College of Arts, Media and Technology Student Association 2024
        </footer>

    </body>

    </html>
