<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
    <title>Activity Pass</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll("#main-nav a");

            navLinks.forEach(link => {
                const linkUrl = new URL(link.href);
                const currentUrlObj = new URL(currentUrl);

                if (linkUrl.href === currentUrl || linkUrl.pathname === currentUrlObj.pathname ||
                    currentUrlObj.pathname.startsWith(linkUrl.pathname)) {
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
                <ul>
                    
                    @can('view', \App\Models\Student::class)
                        <li><a href="{{ route('activities.list') }}">Activity</a></li>
                    @endcan
                    @can('view', \App\Models\Student::class)
                        <li><a href="{{ route('types.list') }}">Type</a></li>
                    @endcan
                    @can('view', \App\Models\Student::class)
                    <li><a href="{{ route('rewards.list') }}">Reward</a></li>
                    @endcan
                    @can('create', \App\Models\Student::class)
                        <li><a href="{{ route('students.list') }}">Student</a></li>
                    @endcan
                    @can('MyActivity', \App\Models\Student::class)
                        <li><a href="{{ route('students.view-activities' ,['student_code' => session('student_code')]) }}">My activities</a></li>
                    @endcan
                    <ul id="right">
                    @auth
                        @can('MyActivity', \App\Models\Student::class)
                        <li><a href="{{ route('students.view-activities', ['student_code' => session('student_code')]) }}">
                            {{ \Auth::user()->name }}</a></li>
<<<<<<< Updated upstream
                        @endcan
                        <label id="role">{{ \Auth::user()->role }}</label>
                        <li><a class="logout" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
=======
                            @endcan
                            
                        {{ \Auth::user()->role }}
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </nav>
>>>>>>> Stashed changes
                    @endauth
                </ul>
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
