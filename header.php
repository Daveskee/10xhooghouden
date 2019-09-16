<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 2:44 PM
 */

require __DIR__ . "/includes/config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $url ?>/css/main.css">
    <link rel="stylesheet" href="<?= $url ?>/css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title><?php
        if(isset($pagetitle)){
            echo $pagetitle;
        }
        else {
            echo "10x hoog houden";
        }
        ?></title>

    <div class="container">
        <div class="header-content">
            <div class="logo">
                <img src="https://via.placeholder.com/525x100?text=Visit+Blogging.com+NowC/O https://placeholder.com/" alt="">
            </div>
            <nav class="headnav">
                <ul class="navbar row-spaced">
                    <li><a href="<?= $url ?>homepage.php">Home</a></li>
                    <li><a href="<?= $url ?>infopage.php">Informatie project</a></li>
                    <li><a href="<?= $url ?>leaderboard.php">Leaderboard</a></li>
                    <li><a href="<?= $url ?>difficulties.php">Game</a></li>
                </ul>
            </nav>
        </div>
    </div>
</head>
<body id="body" class="<?php if (isset($pagebody)){
    echo $pagebody;
    }
    else {
        echo "body";
    }?>">