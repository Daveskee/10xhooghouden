<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/16/2019
 * Time: 11:00 AM
 */

$pagebody = "leaderBoardEntry";

require __DIR__ . "/header.php";

if (isset($_GET['score'])){
    $score = $_GET['score'];
}
else {
    header("location: $url"."difficulties.php");
}

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
        <label class="scorelabel" for="score">Your score is</label>
    </div>
    <div class="input">
        <input type="number" id="score" value="<?=$score?>" disabled>
        <input type="hidden" id="score" name="score" value="<?=$score?>">
    </div>
</div>
        <input type="submit" value="UwU">
</form>

<?php
require __DIR__ . "/footer.php";