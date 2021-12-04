<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>game 3</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
 
       <link rel="stylesheet" href="styles/games/game3.css">


    </head>
    <body>
        <?php
            include("includes/nav.php");
        ?>
        <main>

            <section>
            <?php
            if(isset($_SESSION["username"])){
               // echo "somone logged in<br>";
                //echo $_SESSION["username"];
                echo '<div id="scoreBoard">';
                    //echo '<a onclick="closeScoreBoard()">&times;</a>';
                    echo '<div id="UserScore">  </div>';
                echo '</div>';
                echo '<div class="heartsScoreWrapper">';
                    echo '<div id="subOne">';
                        echo '-1';		
                    echo '</div>';
                    echo '<div class="hearts">';
                        echo '<a id="heart1">';
                            echo '&#10084;';
                        echo '</a>'; 
                        echo '<a id="heart2">';
                            echo '&#10084;';
                        echo '</a>'; 
                        echo '<a id="heart3">';
                            echo '&#10084;';
                        echo '</a>'; 
                    echo '</div>';
                    echo '<div id="addOne">';
                        echo '+1';		
                    echo '</div>';

                echo '</div>';
                echo '<div id="question">';
                    echo ' A X B ';
                echo '</div>';
                echo '<div id="instructions">';

                    echo '<p>if you lose heart you, can  answer Correctly 4 Times in a row (to gain new heart)</p>';

                    echo '</p>Type The Correct Value Below: </p>';
                echo '</div>';
                echo '<div id="answer">';
                    echo '<input id="answerField" type="number" placeholder="Enter Your Answer" disabled>';
                echo '</div>';
                echo '<button id="submit" onclick="checkAnswer()" >SUBMIT ANSWER</button>';

                echo '<button id="start" onclick="start()">START GAME</button>';


            }
            else{
                echo '<a class="choice" href="login.php">Login To Play</a>';
              //  echo '<a class="choice">Play As Guest</a>';


            }
            
            ?>
            
            
            </section>
        </main>
        <?php
        include("includes/footer.php");
        ?>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>
             <script src="scripts/menu.js"></script>
             <script src="scripts/games/game3.js"></script>

    </body>
</html>