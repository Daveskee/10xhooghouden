<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/2/2019
 * Time: 12:42 PM
 */

require __DIR__ . "/../header.php";

if(!isset($_GET['difficulty'])){
    header("location: $url/test/difficulies.php");
}
$dif = $_GET['difficulty'];

    if ( $dif == "easy"){
        $lives = 3;
    }
    else if ( $dif == "normal"){
        $lives = 2;
    }
    else if ( $dif == "hard"){
        $lives = 1;
    }


echo "<div class='lives_div'>";

    for ($life = 0; $life < $lives; $life++){
        echo "<img class='life life_$life' src='$url/img/life.png' alt='life.png'>";
    }


echo "</div>";

    echo "<input type='button' onclick='getHurt();'>";

require __DIR__ . "/../footer.php";