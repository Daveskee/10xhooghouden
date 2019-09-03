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

        cL("lives: "+lives);
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
        cL("lives: "+lives);
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
                    classListAddingHidden(life3);
                }
                else if (lives == 1) {
                    classListAddingHidden(life2);
                }
                else if (lives == 0) {
                    classListAddingHidden(life1);
                }
            }
            if (dif == "normal") {
                if (lives == 1) {
                    classListAddingHidden(life2);
                }
                else if (lives == 0) {
                    classListAddingHidden(life1);
                }
            }
            if (dif == "hard") {
                if (lives == 0) {
                    classListAddingHidden(life1);
                }
            }
        }
        catch (e) {
            alert("Sorry, but there is a problem.");
        }

    }

    function giveResetBtn() {
        // reset testing

        classListAddingHidden(lifeBtn);
        classListRemoveHidden(resetLifeBtn);
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
                classListRemoveHidden(life1);
                classListRemoveHidden(life2);
                classListRemoveHidden(life3);
            } else if (lives == 2) {
                classListRemoveHidden(life1);
                classListRemoveHidden(life2);
            } else if (lives == 1) {
                classListRemoveHidden(life1);
            }
            cL("Reset");
            cL("lives: "+lives);
            classListRemoveHidden(lifeBtn);
            classListAddingHidden(resetLifeBtn);
        } catch (e) {
            alert("Sorry, but there is a problem.");
        }
    }
/* functions for adding and removing hidden class */

    function classListRemoveHidden(physical) {
        physical.classList.remove('hidden');
    }

    function classListAddingHidden(physical) {
        physical.classList.add('hidden');
    }

    function cL(variable) {
        console.log(variable);
    }

</script>



