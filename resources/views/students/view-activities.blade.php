@extends('layouts.main')
@section('title', 'View Activities Of Student: ' . $students->code)
@section('content')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">

    <div class="pagination">{{ $activities->withQueryString()->links() }}</div>

    <body>



        <div class="container-align">
            <div class="event-container">
                <h3>Event Upcoming</h3>
            </div>
            <div class="info-container">
                <h3>Next Reward</h3>
                <ul>
                    <li>Level 4: Epic Armor</li>
                    <li>Level 5: Legendary Mount</li>
                </ul>
            </div>
        </div>

        <div class="battle-pass-container">
            <div class="levels-horizontal">
                @foreach ($activities as $activityItem)
                    <div class="level-card unlocked">
                        <div class="level-header">
                            <h2>{{ $activityItem->name }}</h2>
                        </div>
                        <div class="level-reward">
                            <p>{{ $activityItem->name }}</p>
                            <p>{{ $activityItem->code }}</p>
                            @can('create', \App\Models\Student::class)
                                <p><a
                                        href="{{ route('students.remove-activity', [
                                            'student_code' => $students->code,
                                            'activity_name' => $activityItem->name,
                                        ]) }}">Remove
                                        Activity from this user</a></p>
                            @endcan
                            <p> <a href="{{ route('activities.view', ['activity_name' => $activityItem->name]) }}">
                                    <button type="button" class="/">View</button>
                                </a></p>
                        </div>
                        <div class="level-status">
                            <p class="status unlocked">Unlocked!</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        </div>

        <script>
            document.getElementById("popupButton").addEventListener("click", function() {
                document.getElementById("popup").style.display = "block";
            });

            document.querySelector(".close-button").addEventListener("click", function() {
                document.getElementById("popup").style.display = "none";
            });

            window.addEventListener("click", function(event) {
                var popup = document.getElementById("popup");
                if (event.target == popup) {
                    popup.style.display = "none";
                }
            });
        </script>

    </body>


    @php
        session()->put('bookmark.activities.view', url()->full());
    @endphp

    </main>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BattlePass</title>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
    </head>


    </html>





@endsection
