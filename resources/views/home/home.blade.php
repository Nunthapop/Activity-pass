@extends('layouts.main')
@section('title', 'BattlePass')
@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
<li><a href="{{ route('login') }}">Login</a></li>
    {{-- <form>
        <a href="{{ route('login') }}">Login</a>
        
    </form> --}}
<?php
$battle_pass_levels = [
    ["level" => 1, "points_required" => 100, "reward" => "100 Gold Coins"],
    ["level" => 2, "points_required" => 200, "reward" => "Silver Sword"],
    ["level" => 3, "points_required" => 300, "reward" => "Magic Shield"],
    ["level" => 4, "points_required" => 500, "reward" => "Epic Armor"],
    ["level" => 5, "points_required" => 800, "reward" => "Legendary Mount"],
];

$player_points = 350;
?>

<body>
    <div class="container-align">
        <div class="event-container">
            <h3>Event Upcoming</h3>
        </div>
        <div class="info-container">
            <h3>Next Reward</h3>
                <ul>
                    <?php foreach ($battle_pass_levels as $level) { ?>
                    <?php if ($player_points < $level['points_required']) { ?>
                        <li>Level <?php echo $level['level']; ?>: <?php echo $level['reward']; ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="battle-pass-container">
        <div class="levels-horizontal">
            <?php foreach ($battle_pass_levels as $level) { ?>
                <div class="level-card <?php if ($player_points >= $level['points_required']) {
                                                echo 'unlocked';
                                            } else {
                                                echo '';
                                            }?>">
                    <div class="level-header">
                        <h2>Level <?php echo $level['level']; ?></h2>
                    </div>
                    <div class="level-reward">
                        <p>Points Required: <?php echo $level['points_required']; ?></p>
                        <p>Reward: <?php echo $level['reward']; ?></p>
                    </div>
                    <div class="level-status">
                        <?php if ($player_points >= $level['points_required']) { ?>
                            <p class="status unlocked">Unlocked!</p>
                        <?php } else { ?>
                            <p class="status locked">Locked</p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
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
</html>

@endsection