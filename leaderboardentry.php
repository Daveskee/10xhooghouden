<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/16/2019
 * Time: 11:00 AM
 */

$pagebody = "leaderBoardEntry";

require __DIR__ . "/header.php";



?>
<form action="<?=$url?>includes/controller.php" class="leaderboardenter" method="post">
    <input type="hidden" name="type" id="" value="score">

    <div class="form-group name">
        <div class="label">
            <label class="namelabel" for="name">Name</label>
        </div>
        <div class="input">
            <input required type="text" id="name" name="name" placeholder="Enter your name">
        </div>
    </div>
<div class="form-group score">
    <div class="label">
        <label class="scorelabel" for="scoreInput">Your score is</label>
    </div>
    <div class="input">
        <input type="number" id="scoreInput" value="" disabled>
        <input type="hidden" id="score" name="score" value="">
    </div>
</div>
        <input type="submit" value="UwU">
</form>

    <script type="text/javascript">

        var gamePlayed = document.cookie.replace(/(?:(?:^|.*;\s*)game_played\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        console.log(gamePlayed);

        if (gamePlayed == "false"){
            if (history.back() == '<?=$url?>game.php'){
                window.location.href = "<?=$url?>homepage.php";
            }
            else {
                window.history.back();
            }
        }
        else {

            var scoreInput = document.getElementById("scoreInput");
            var scoreSave = document.getElementById("score");


            var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)score\s*\=\s*([^;]*).*$)|^.*$/, "$1");

            console.log(cookieValue);

            console.log(document.cookie);

            document.cookie = 'game_played=false';

            scoreSave.value = cookieValue;
            scoreInput.value = cookieValue;

        }

    </script>

<?php
require __DIR__ . "/footer.php";