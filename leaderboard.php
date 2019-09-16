<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 4:35 PM
 */

$pagebody = "leaderboard";

require __DIR__ . "/header.php";
$viaGame = false;
if (isset($_GET['last_id'])) {
    $id = $_GET['last_id'];
}
$sql = "SELECT name, score, id FROM scores ORDER BY score DESC";
$query = $db->query($sql);
$players_ =$query->fetchAll(PDO::FETCH_ASSOC);


$sql2 = "$sql LIMIT 10";
$query = $db->query($sql2);
$players = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<ol class='leaderboardList'>";
$i = 0;

foreach ($players_ as $player_) {
    $i++;
    if ($player_['id'] == $id) {
        $position = $i;
    }
    $allplayers = $i;
}
foreach ($players as $player){

    $name = $player['name'];
    $score = $player['score'];
    echo "<li class='list_item_players'><p class='leaderboardName'>Name: $name</p>
            <p class='leaderboardScore'>Score: $score</p>
            </div>";
    echo "</li>";
}

echo "</ol>";

?>
<div class="yourScore">
    <?php
    if (isset($id)) {
            $sql = "SELECT * FROM scores WHERE id = :id";
            $prepare = $db->prepare($sql);
            $prepare->execute([
                'id' => $id
            ]);
            $player = $prepare->fetch(PDO::FETCH_ASSOC);

            $name = $player['name'];
            $score = $player['score'];
            $place = 0;
            if ($score >= 10){
                echo "Great job $name, you scored $score points and placed $position <i class='fas fa-thumbs-up'></i>";
            }
            else {
                echo "Hello $name, you got a score of $score and placed $position of $allplayers";
            }
        } else {
            echo "<a href='$url/test/difficulties.php' id='playbtn' class=''>Wanna play?</a>";
    }
    ?>
</div>

<script type="text/javascript">

</script>


<?php
require __DIR__ . '/footer.php';?>
