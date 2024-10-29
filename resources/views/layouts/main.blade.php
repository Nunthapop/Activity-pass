<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
    <title>Activity Pass</title>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll("#main-nav a");
    
            navLinks.forEach(link => {
                const linkUrl = new URL(link.href);
                const currentUrlObj = new URL(currentUrl);
                
                if (linkUrl.href === currentUrl || linkUrl.pathname === currentUrlObj.pathname || currentUrlObj.pathname.startsWith(linkUrl.pathname)) {
                    link.classList.add("active"); 
                }
            });
        });
    </script>
    
    </head>
    
    <body>
        <header>
            <div id="main-header">
                <nav id="main-nav">
                    <ul >
                        {{-- <li><a href="{{ route('home.home') }}">Home</a></li> --}}
                        {{-- <li><a href="{{ route('home.profile', ['student_code' => session('student_code')]) }}">Profile</a></li> --}}
                        <li><a href="{{ route('activities.list') }}">Activity</a></li>
                        @can('view', \App\Models\StudentsPolicy::class)
                        <li><a href="{{ route('types.list') }}">Type</a></li>
                        @endcan
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
                                {{ \Auth::user()->role }}
                            <a href="{{ route('logout') }}">Logout</a>
                        </nav>
                    @endauth
                </nav>
                <h1>
                    @section('title-container')@yield('title')@show
                </h1>
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
