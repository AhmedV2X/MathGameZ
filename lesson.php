<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lesson Details Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
        <link rel="stylesheet" href="styles/lesson.css">

        <!--Icons made by <a href="https://www.flaticon.com/authors/xnimrodx" title="xnimrodx">xnimrodx</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> home icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> lesson icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>contact icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>girl icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>boy-->
    </head>
    <body>
        <?php
            include("includes/nav.php");
        ?>


        <main>
        <section>
            <article>

            <?php
            
                    include("includes/connection.php");
                    $sql="SELECT * FROM lesson WHERE id=:id";
                    $statement=$pdo->prepare($sql);
                    $statement->bindParam(':id', $_GET["lesson-id"], PDO::PARAM_STR);
                    $statement->execute();
                    $data=$statement->fetchAll();


                    foreach($data as $record){
                    //   echo
                    echo '<h1>'.$record['lesson_catagory'].' - '.$record['lesson_name'].'</h1>';//Lesson Catagory Name 
                    echo '<img src="'.$record['lesson_imglink'].'">';
                    echo '<h2>explanation :</h2><p>'.$record['lesson_explanation'].'</p>';
                    
                    }

                    $sql="SELECT * FROM game WHERE lesson_id=:lesson_id";
                    $statement=$pdo->prepare($sql);
                    $statement->bindParam(':lesson_id', $_GET["lesson-id"], PDO::PARAM_INT);
                    $statement->execute();
                    $data=$statement->fetchAll();
                    //$_SESSION["username"]
                    if(isset($_SESSION["username"])){//check if user logged in
                       // echo "somone logged in<br>";
                       // echo $_SESSION["username"];
                        echo '<div class="game-btn">';
                        foreach($data as $record){
                           // echo.
                            echo '<a href="'.$record['game_link'].'?gameid='. $record['id'].'">Play - '.$record['game_name'].'</a>';
                            
                        }
                        echo '</div>';
        
                    }
                    else{
                        echo '<div class="game-btn">';

                        foreach($data as $record){
                
                            echo '<a href="login.php">Login To Play - '.$record['game_name'].'</a>';

                            
                        }

                        echo '</div>';
        
                    }

                
                
                ?>
            </article>

        </section>

        </main>
        <?php
        include("includes/footer.php");
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>

        <script src="scripts/menu.js"></script>

    </body>
</html>