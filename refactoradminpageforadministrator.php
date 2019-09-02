<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 4:34 PM
 */

require 'includes/config.php';

if ($_GET['password'] !== "password123VanditproJect"){
    header("location: homepage.php");
    exit;
}

if (isset ($_GET['msg'])){
    echo $_GET['msg'];
}

$sql = "SELECT * FROM scores";
$query = $db->query($sql);
$players = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<ol class='adminList'>";

foreach ($players as $player){
    $id = $player['id'];
    $name = $player['name'];
    $score = $player['score'];
    echo "<li class='admin_list_item_players'><p>ID: $id</p><p>name: $name</p><p>score: $score</p>";
    echo "<form method='post' action='includes/controller.php'>";
    echo "<input type='hidden' name='type' value='delete_player'>";
    echo "<input type='number' value='$id' name='id'>";
    echo "<input type='submit' value='delete'></form>";
    echo "</li>";
}

echo "</ol>";
    echo "<a href='DELETE.php'>DB leegmaken</a>";
require 'footer.php';?>