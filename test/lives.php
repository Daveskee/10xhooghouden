<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 9/2/2019
 * Time: 12:42 PM
 */

require __DIR__ . "/../header.php";

$dif = $_GET['difficulty'];

echo "<input id='difficultyinput' type='text' value='$dif' style='display: none;'>"
?>
<!--<div class="lives_div">-->
    <button onclick="loseLife(lives)" id="lostLifeBtn">Lose a life</button>
    <button onclick="resetLives()" id="resetLifeBtn" class="hidden">Reset</button>
<!--</div>-->

<script>

    let lives_div = document.getElementById('lives_div');

    let dif = document.getElementById('difficultyinput').value;

    let lifeBtn = document.getElementById('lostLifeBtn');
    
    let resetLifeBtn = document.getElementById('resetLifeBtn');

    let lives;
    let maxLives;

    setLives();

    function setLives() {
        // set the lives to the difficulty

        if (dif == "easy"){
            lives = 3;
            maxLives = 3
        }
        else if (dif == "normal") {
            lives = 2;
            maxLives = 2
        }
        else if (dif == "hard") {
            lives = 1;
            maxLives = 1
        }

        makeLifes();

        console.log(lives);
    }

    function loseLife() {
        // lose a life or game over
        if (lives >= 1) {
            getHurt();
        }
        // die if life reaches 0
        if (lives == 0){
            gameOver();
            giveResetBtn();
        }
        console.log(lives);
    }
    
    function gameOver() {
        // show game over screen

        alert("dead");
    }

    function makeLifes() {
        // set the images for lives

        for (var i = 1; i <= lives; i++) {
            setLifeImages(i);
        }
    }

    function setLifeImages(amount) {
        // make the images for lives

        var x = document.createElement("IMG");
        x.setAttribute("src", "http://localhost:63342/10xhooghouden2/img/life.png");
        x.setAttribute("width", "30");
        x.setAttribute("height", "30");
        x.setAttribute("alt", "life picture");
        x.setAttribute("class", "life");
        x.classList.add('life'+amount);
        x.setAttribute("id", "life"+amount);
        document.body.appendChild(x);
    }

    function getHurt() {
        // removes a life
        try {
            lives -= 1;
            if (dif == "easy") {
                if (lives == 2) {
                    removeLifeThree();
                }
                else if (lives == 1) {
                    removeLifeTwo();
                }
                else if (lives == 0) {
                    removeLifeOne();
                }
            }
            if (dif == "normal") {
                if (lives == 1) {
                    removeLifeTwo();
                }
                else if (lives == 0) {
                    removeLifeOne();
                }
            }
            if (dif == "hard") {
                if (lives == 0) {
                    removeLifeOne();
                }
            }
        }
        catch (e) {
            alert("Sorry, but there is a problem.");
        }

    }

    function giveResetBtn() {
        // when you die you can reset

        lifeBtn.classList.add('hidden');
        resetLifeBtn.classList.remove('hidden');
    }

    function resetLives() {
        // resets the lives
        try {

            if (dif == "easy") {
                lives = 3;
            } else if (dif == "normal") {
                lives = 2;
            } else if (dif == "hard") {
                lives = 1
            }

            if (lives == 3) {
                life1.classList.remove('hidden');
                life2.classList.remove('hidden');
                life3.classList.remove('hidden');
            } else if (lives == 2) {
                life1.classList.remove('hidden');
                life2.classList.remove('hidden');
            } else if (lives == 1) {
                life1.classList.remove('hidden');
            }
            console.log(lives);
            lifeBtn.classList.remove('hidden');
            resetLifeBtn.classList.add('hidden');
        } catch (e) {
            alert("Sorry, but there is a problem.");
        }
    }
/* functions for life removal */
    function removeLifeThree() {
        let life3 = document.getElementById('life3');
        life3.classList.add('hidden');
    }

    function removeLifeTwo() {
        let life2 = document.getElementById('life2');
        life2.classList.add('hidden');
    }

    function removeLifeOne() {
        let life1 = document.getElementById('life1');
        life1.classList.add('hidden');
    }

</script>



