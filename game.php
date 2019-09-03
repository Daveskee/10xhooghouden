<?php
/**
 * Created by PhpStorm.
 * User: Dave
 * Date: 9/2/2019
 * Time: 9:21 AM
 */
?>

<?php require 'header.php'; ?>

<div id="game"></div>

<body onkeypress="init()">

<script type="text/javascript" src="https://rawgithub.com/craftyjs/Crafty/release/dist/crafty-min.js"></script>
<script>

    // Playground
    // var gameWidth = 1710,
    //     gameHeight = 800;
    // Crafty.init(gameWidth, gameHeight, document.getElementById('game'));
    //
    // Crafty.e('2D, DOM, Color')
    //     .attr({x: 0, y: 0, w: 2500, h: 2500})
    //     .color('#417B57');
    //
    // // Ball
    // var ball = Crafty.e("2D, DOM, Image")
    //     .attr ({x: 0, y: 0, w: 400, h: 400})
    //     .image("img/ball.jpg");
    //

    var canvas, ctx, container;
    canvas = document.createElement( 'canvas' );
    ctx = canvas.getContext("2d");
    var ball;
    var object = new Object();


    // Velocity x
    var vx = 5.0;
    // Velocity y - randomly set
    var vy;

    var gravity = 0.5;
    var bounce = 0.7;
    var xFriction = 0.1;

    function init(){
        setupCanvas();
        vy = 15;
        ball = {x:canvas.width / 2, y:50, radius:20, status: 0,   color:"red"};

    }//end init method

    function draw() {
        ctx.clearRect(0,0,canvas.width, canvas.height);

        //draw cirlce
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.radius, 0, Math.PI*2, false);
        ctx.fillStyle = ball.color;
        ctx.fill();
        ctx.closePath();

        //draw object
        ctx.beginPath();
        ctx.fillStyle = '#000';
        ctx.fillRect(475, 250, 150, 3);
        ctx.closePath();


        ballMovement();
    }

    function objectHit() {

    }

    setInterval(draw, 700/45);


    function ballMovement(){
        ball.x += vx;
        ball.y += vy;
        vy += gravity;

        //If either wall or object is hit, change direction on x axis
        if (ball.x + ball.radius > canvas.width || ball.x - ball.radius < 0){
            vx *= -1;
        }

        // Ball hits the floor
        if (ball.y + ball.radius > canvas.height){// ||

            // Re-positioning on the base
            ball.y = canvas.height - ball.radius;
            //bounce the ball
            vy *= -bounce;
            //do this otherwise, ball never stops bouncing
            if(vy<0 && vy>-2.1)
                vy=0;
            //do this otherwise ball never stops on xaxis
            if(Math.abs(vx)<1.1)
                vx=0;

            xF();
        }
    }

    function xF(){
        if(vx>0)
            vx = vx - xFriction;
        if(vx<0)
            vx = vx + xFriction;
    }

    function setupCanvas() {//setup canvas

        container = document.createElement( 'div' );
        container.className = "container_game";

        canvas.width = 1000;
        canvas.height = 700;
        document.body.appendChild( container );
        container.appendChild(canvas);
    }

</script>


</body>
</html>
