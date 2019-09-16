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
$sql = "SELECT name, score FROM scores ORDER BY score DESC LIMIT 10";
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

            echo "Hello $name, you got a score of $score";
        } else {
            echo "<a href='$url/test/difficulties.php' id='playbtn' class=''>Wanna play?</a>";
    }
    ?>
</div>

<script type="text/javascript">

</script>


<?php
require __DIR__ . '/footer.php';?>
