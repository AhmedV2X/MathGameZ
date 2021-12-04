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
 
       <link rel="stylesheet" href="styles/games/game5.css">


    </head>
    <body>
        <?php
            include("includes/nav.php");
        ?>
        <main>

            <?php
            if(isset($_SESSION["username"])){

            echo '<div class="tower">
                <div class="floor">Floor 1</div>
                <div class="floor">Floor 2</div>
                <div class="floor">Floor 3</div>

                <div class="floor">Floor 4</div>
                <div class="floor">Floor 5</div>
                <div class="floor">Floor 6</div>
                
                <div class="floor">Floor 7</div>
                <div class="floor">Floor 8</div>
                <div class="floor">Floor 9</div>

                <div class="floor">Floor 10</div>


            </div>';
            echo '<section class="QA">
                <p class="instruction"> climp the tower by answering  questions</p>
                round the answer by single dicmal point

                <p id="question"></p>
                <input type="text" id="answer" class="Answer">

                <button id="start" onclick="start()">Start</button>
                <button class="chkAnswer" onclick="chekAnswer()">Submit Answer</button>
                <p id="clock"></p>



            </section>';
            echo '<section id="result" class="result">';
            echo '<button onclick="closeme()">&times;</button>';

            echo '<h1>You ran Out of time </h1>';
            echo '<h1>You reached  :</h1>';

                

            echo '</section>';

            }
            else{
                echo '<a class="choice" href="login.php">Login To Play</a>';
              //  echo '<a class="choice">Play As Guest</a>';


            }
            
            ?>
            
            
        </main>
        <?php
        include("includes/footer.php");
        ?>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>
             <script src="scripts/menu.js"></script>
             <script src="scripts/games/game5.js"></script>

    </body>
</html>