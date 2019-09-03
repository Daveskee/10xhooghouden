<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/2/2019
 * Time: 12:04 PM
 */

require __DIR__ . "/../header.php";
?>

<div> <!-- invoegen in database -->
        <form action="../includes/controller.php" method="post">
            <input type="hidden" name="type" value="score">
            <div class="input_name">
                <label for="name">Please enter your name:</label>
                <input type="text" name="name" id="name" placeholder="name">
            </div>
            <div class="input_score">
                <label for="score">Please enter score:</label>
                <input type="number" name="score" id="score" placeholder="score">
            </div>
            <input type="submit" value="submit">
        </form>

    <?php require __DIR__ . "/../footer.php";