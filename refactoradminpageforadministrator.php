<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 4:34 PM
 */

require 'includes/config.php';


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

echo "</ol>"
?>

    <div> <!-- invoegen in database -->
        <form action="includes/controller.php" method="post">
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
    <a href="DELETE.php">DB leegmaken</a>
<?php require 'footer.php';?>