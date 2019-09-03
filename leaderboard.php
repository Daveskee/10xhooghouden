<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 4:35 PM
 */



require __DIR__ . "/header.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<div class="yourScore">
    <?php
    if (isset($id)){
        $sql = "SELECT * FROM scores WHERE id = :id";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            'id' => $id
        ]);
        $player = $prepare->fetch(PDO::FETCH_ASSOC);

        $name = $player['name'];
        $score = $player['score'];

        echo "Hello $name, you got a score of $score";
    }
    else {
        echo "<a href='$url/game.php'>Wanna play?</a>";
    }
    ?>
</div>
<?php

$sql = "SELECT name, score FROM scores ORDER BY score DESC";
$query = $db->query($sql);
$players =$query->fetchAll(PDO::FETCH_ASSOC);
echo "<ol class='leaderboardList'>";

foreach ($players as $player){
    $name = $player['name'];
    $score = $player['score'];
    echo "<li class='list_item_players'><p class='leaderboardName'>Name: $name</p>
            <p class='leaderboardScore'>Score: $score</p>
            </div>";
    echo "</li>";
}

echo "</ol>";
require __DIR__ . '/footer.php';?>
