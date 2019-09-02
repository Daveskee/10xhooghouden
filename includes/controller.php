<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 2:45 PM
 */
//
if ( $_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: homepage.php');
    exit;
}
require 'config.php';

if ( $_POST['type'] === 'score' ) {

    $name = $_POST['name'];
    $score = $_POST['score'];

    $sql = "INSERT INTO scores (name, score) VALUES (:name, :score)";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':name' => $name,
        ':score' => $score
    ]);


    $msg = "Score is succesvol ingevoerd!";
    header("location: ../refactoradminpageforadministrator.php?msg=$msg");
    exit;
}

if ($_POST['type'] === 'delete'){
    $sql = "TRUNCATE TABLE scores";
    $truncate = $db->prepare($sql);
    $truncate->execute();

    $msg = "Database succesvol leeggemaakt";
    header("location: ../refactoradminpageforadministrator.php?msg=$msg");
    exit;
}

if ($_POST['type'] === 'delete_player'){
    $id = $_POST['id'];

    $sql = "DELETE FROM scores WHERE id = :id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        'id' => $id
    ]);

    $msg = "Speler succesvol verwijderd";
    header("location: ../refactoradminpageforadministrator.php?msg=$msg");
    exit;
}