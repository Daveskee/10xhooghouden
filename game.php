<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/16/2019
 * Time: 8:55 AM
 */

require __DIR__ . "/header.php";

if  (isset($_GET['difficulty'])) {
    $dif = $_GET['difficulty'];
}
else {
    header("location: difficulties.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <title>Title</title>
</head>
<body>
<div id="game" class="game"></div>
<div class="points">Points: <span id="points_counter"></span></div>
<div class="lives">Lives: <span id="life_counter"> <?php if (isset($dif)){echo $dif;} ?></span></div>
<script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty-min.js"></script>
<script type="text/javascript">

    let letsGoPlay = document.cookie.replace(/(?:(?:^|.*;\s*)letsGoPlay\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    if  (letsGoPlay == 'false'){
        window.location.href = 'game.php'
    }

    let difficulty = document.getElementById("life_counter").innerText;
    console.log(difficulty);
    var lives;
    if (difficulty == 'easy') {
        lives = 3;
    }
    else if (difficulty == 'normal'){
        lives = 2;
    }
    else if (difficulty == "hard"){
        lives = 1;
    }
    console.log(lives)
    var screenWidth = 900;
    var screenHeight = 500;



    var xVelocity = 0;
    let jumpHeight = 300;
    let grav = 250;
    var score = 0;

    let lifeImg = "<img style='width: 30px' src='img/life.png'>"


    let random = 0;


    Crafty.init(screenWidth,screenHeight, document.getElementById('game'));

    Crafty.defineScene("mainMenu", function () {
        Crafty.e('Button, 2D, DOM, Color, Text')
            .attr({
                x:200,
                y:150,
                w:100,
                h:50
            })
            .text("Start Game")
            .color('#24dd1f')
            .bind('Click', function(){
                Crafty.enterScene("Game");
            })
            .css({
                'font-family': '20px'
            })
    });

    Crafty.defineScene("Game", function () {


        Crafty.sprite("img/soccer_field2.jpg", {Soccerfield:[0,0,10000,10000]});

        let background = Crafty.e('Background, 2D, Canvas, Soccerfield')

        let life = Crafty.e('Life, 2D, DOM')
            .attr({
                w:30,
                h:30
            })
            .css({
                'background-image': 'img/life.png'
            })

        let invisline = Crafty.e('invisline, 2D, Canvas, Collision, Solid')
            .attr({
                x: 0,
                y: 51,
                w: screenWidth,
                h: 2
            });

        let scoreboard = Crafty.e('ScoreBoard, 2D, DOM, Text')
            .attr({
                x: screenWidth - 110,
                y: 20,
                w: 100,
                h: 60
            })
            .bind('EnterFrame', function() {
                this.text('Your score: ' + score);
            })
            .css({
                'font-family': 'cursive',
                'font-size': '20px',
                'background': 'rgba(255,255,255,0.5',
                'padding-left': '10px'
            });

        let livesboard = Crafty.e('LivesBoard, 2D, DOM, Text')
            .attr({
                x: screenWidth - 100,
                y: 100,
                w: 100,
                h: 20
            })
            .bind('EnterFrame', function() {
                if (lives == 1){
                    this.text(lifeImg);
                }
                else if (lives == 2){
                    this.text(lifeImg + lifeImg)
                }
                else if (lives == 3){
                    this.text(lifeImg + lifeImg + lifeImg)
                }

                if (lives <= 0){
                    Crafty.stop();
                    let zero = 0;
                    document.cookie = 'score='+zero;
                    document.cookie = 'game_played=true';
                    document.cookie = 'letsGoPlay=false';
                    console.log("i'm here");
                    document.cookie = "score="+score;

                    console.log(document.cookie);

                    window.location = '<?=$url?>leaderboardentry.php';
                }
            })
            .css({
                'font-family': 'cursive',
                'font-size': '20px'
            })

        Crafty.e("Line, 2D, DOM, Solid, Color, Collision, Jumper")
            .attr({
                x: 0,
                y: screenHeight - 100,
                w: screenWidth,
                h: 10
            })
            // .color("#0F0")
        let line1 = Crafty.e('Line1, 2D, DOM, Color')
            .attr({
                x: 0,
                y: screenHeight - 100,
                w: 300,
                h: 10
            })
            .color('#CDFF0F')

        let line2 = Crafty.e('Line2, 2D, DOM, Color')
            .attr({
                x: 300,
                y: screenHeight - 100,
                w: 300,
                h: 10
            })
            .color('#FF00FF')

        let line3 = Crafty.e('Line3, 2D, DOM, Color')
            .attr({
                x: 600,
                y: screenHeight - 100,
                w: 300,
                h: 10
            })
            .color('#FFFF00')


        var thing = 400;

        Crafty.sprite("img/ball.jpg", {Futball:[0,0,thing,thing]});

        var Ball = Crafty.e('Ball, 2D, DOM, Color, Gravity, Solid, Collision, Mouse, Jumper, Keyboard, Futball')
            .attr({
                x: 100,
                y: 10,
                w: 40,
                h: 40
            })
            .gravity()
            .gravityConst(grav)
            .jumper(jumpHeight, ['A', 'S', 'D'])
            .color("#F00")
            .css({
                'border-radius': '20px'
            })
            .bind('Click', function () {
                this.y -= 100;
            })
            .bind('CheckJumping', function () {
                if (this.hit('Line')) {
                    if ( Crafty.s('Keyboard').isKeyDown(32) ) {
                        this.canJump = true;
                        xVelocity = Math.floor(Math.random() * 20) - 10;
                        score++;
                        console.log(score);
                        this.x += random;
                    }
                }
                if (this.hit('Line1')) {
                    if ( Crafty.s('Keyboard').isKeyDown(65) ) {
                        this.canJump = true;
                        xVelocity = Math.floor(Math.random() * 20) - 10;
                        score++;
                        grav += 20;
                        jumpHeight += 20;
                        this.x += random;
                    }
                }

                if (this.hit('Line2')) {
                    if ( Crafty.s('Keyboard').isKeyDown(83) ) {
                        this.canJump = true;
                        xVelocity = Math.floor(Math.random() * 20) - 10;
                        score++;
                        grav += 20;
                        jumpHeight += 20;
                        this.x += random;
                    }
                }
                if (this.hit('Line3')) {
                    if ( Crafty.s('Keyboard').isKeyDown(68) ) {
                        this.canJump = true;
                        xVelocity = Math.floor(Math.random() * 20) - 10;
                        score++
                        grav += 20;
                        jumpHeight += 20;
                        this.x += random;
                    }
                }
            })
            .bind("EnterFrame", function () {

                this.gravityConst(grav);
                this.jumper(jumpHeight, ['A','S','D']);

                this.x += xVelocity;
                if (this.x < 300) {
                    this.color('#CDFF0F');
                } else if ( this.x >= 300 && this.x < 600 ) {
                    this.color('#FF00FF')
                } else {
                    this.color('#FFFF00')
                }

                this.onHit('Floor', function () {
                    this.y = 10;
                    this.x = 100;
                    xVelocity = 0;
                    this.gravity('invisline');
                    grav = 250;
                    jumpHeight = 300;
                    setTimeout(function () {
                        Ball.gravity('Floor')
                    }, 1000);
                    // getHurt();
                    lives--;
                });


                if (this.hit('Dot')){
                    console.log("test")
                    this.canJump = true;
                    this.jump();
                }

                // this.hit('Dot', function () {
                //     if (xVelocity != 0) {
                //         xVelocity = xVelocity * -1;
                //     }
                //     else {
                //         xVelocity = 5;
                //     }
                // })

                this.onHit('Rightwall', function () {
                    xVelocity = xVelocity * -1;
                });

                this.onHit('Leftwall', function () {
                    xVelocity = xVelocity * -1;
                });
            });

        Crafty.e('Floor, 2D, DOM, Solid, Color')
            .attr
            ({
                x: 0,
                y: screenHeight - 10,
                w: screenWidth,
                h: 10
            })
            .color('#000');

        Crafty.e('Rightwall, 2D, DOM, Color')
            .attr({
                x: screenWidth - 10,
                y: 0,
                w: 10,
                h: screenHeight
            })
            .color('#000')

        Crafty.e('Leftwall, 2D, DOM, Color')
            .attr({
                x: 0,
                y: 0,
                w: 10,
                h: screenHeight
            })
            .color('#000')

        Crafty.e('Roof, 2D, DOM, Color, Solid')
            .attr({
                x:0,
                y:0,
                w: screenWidth,
                h: 10
            })
            .color('#000');

        Crafty.e('Dot, 2D, DOM, Color, Collision')
            .attr({
                x:(100),
                y:screenHeight/2,
                w:20,
                h:20
            })
            .css({
                'border-radius': '10px'
            })
            .color('#000')
    });

    Crafty.enterScene("Game");

</script>
</body>
</html>
