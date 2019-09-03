<?php
/**
 * Created by PhpStorm.
 * User: Dave
 * Date: 9/2/2019
 * Time: 9:21 AM
 */
?>

<?php require __DIR__ . '/header.php'; ?>


<script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty-min.js"></script>
<script>
    Crafty.init(1500,800, document.getElementById('game'));

    // Playground
    Crafty.e('2D, DOM, Color')
        .attr({x: 0, y: 0, w: 2500, h: 2500})
        .color('#201C1D');

    // Ball
    var ball = Crafty.e("2D, DOM, Image").image("ball.jpg");


</script>


<?php require __DIR__ . '/footer.php'; ?>
</body>
</html>
