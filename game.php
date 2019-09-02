<?php
/**
 * Created by PhpStorm.
 * User: Dave
 * Date: 9/2/2019
 * Time: 9:21 AM
 */
?>

<?php include 'header.php'; ?>

<div id="game">hi</div>

<script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty-min.js"></script>
<script>
    Crafty.init(500,350, document.getElementById('game'));

    // Playground
    Crafty.e('2D, DOM, Color')
        .attr({x: 0, y: 0, w: 1000, h: 1000})
        .color('#201C1D');

    // Ball
    var ball = Crafty.e("2D, DOM, Image").image("ball.jpg");


</script>


<?php include 'footer.php'; ?>
</body>
</html>
