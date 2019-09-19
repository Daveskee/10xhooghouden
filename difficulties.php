<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/2/2019
 * Time: 12:13 PM
 */

$pagefooter = "difficulty";
require __DIR__ . "/header.php";

?>
<div class="eanoha">
    <a href="game.php?difficulty=easy">
        <div class="easy">
            <h2>Easy</h2>
        </div>
    </a>
    <a href="game.php?difficulty=normal">
        <div class="normal">
            <h2>Normal</h2>
        </div>
    </a>
    <a href="game.php?difficulty=hard">
        <div class="hard">
            <h2>Hard</h2>
        </div>
    </a>
</div>

    <script type="text/javascript">
        document.cookie = 'letsGoPlay=true'
    </script>

<?php

require __DIR__ . "/footer.php";