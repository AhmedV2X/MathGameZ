<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>process info</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
        <link rel="stylesheet" href="styles/process.css">




    </head>
    <body>
        <?php
            include("includes/nav.php");
        ?>


        <main>
            <section>
                <?php
                include("includes/connection.php");
                if(isset($_POST['sendEmail'])&&$_POST['sendEmail']=="Send"){
                    $name=$_POST["usname"];
                    $email=$_POST["usemail"];
               
                    $msg=$_POST["usmassage"];

                    $fullmessage="The user : ".$name." . \n".
                                "Contact tham at ".$email." . \n".  
                                "Requested : ".$msg." . ";

   
      

                    mail("support@mathgamez.net","support request",$fullmessage);
                    echo "<h1>Thank you</h1>";
                    echo "<h2>We have recived your message</h2>";
                    echo "<h3>you will be redirected shortly</h3>";

                    header('Refresh:5;  url=index.php');



                }


                else if(isset($_POST['register'])){
                    $useremail=$_POST["useremail"];
                    $uname=$_POST["uname"];

                    $sql="SELECT user_email FROM users WHERE user_email='$useremail'";
                    $statement=$pdo->prepare($sql);


                    $statement->execute();

                    if($statement->rowCount() > 0){

                        //get redirected to error page
                        header('Location: error.php?error=email');
                        exit();


                    }
                    else{
                        //add user to database
                        $sql="SELECT userName FROM users WHERE userName='$uname'";
                        $statement=$pdo->prepare($sql);
    
    
                        $statement->execute();
                        if($statement->rowCount() > 0){

                            //get redirected to error page
                            header('Location: error.php?error=user');
                            //echo '<script>document.getElementByClassName("")</script>';
                            exit();
    
    
                        }
                        else{
                            $password=password_hash($_POST["userpass"],PASSWORD_ARGON2I);
                            $age=$_POST["userage"];
                            $gender=$_POST["gender"];
                            if($gender=="female"){
                                $imglink="images/icons/girl.png";
                            }
                            elseif($gender=="male"){
                                $imglink="images/icons/boy.png";
    
                            }
                            else{
                                $imglink="images/icons/flowerSymbole.png";
    
                            }
    
                        
                            $sql="INSERT INTO  users (user_email, userName, user_password, user_age, user_gender,user_imglink) VALUES (?,?,?,?,?,?)";
                            $statement=$pdo->prepare($sql);
    
                            $statement->execute([$useremail, $uname, $password, $age, $gender, $imglink]);
                            echo "<h1>You are now registred</h1>";
                            echo "<h2>in 5 seconds you will be redirected to login page</h2>";
                            
                    
                            echo '<div class="row"><p>if you arent redirected : </p> <a href="login.php">click here to login</a></div>';
                            header('Refresh:5;  url=login.php');
    
                        }



                    }




                }
        //-----------------------------------------------------------//
                else if(isset($_POST["gameuserscore"])&&$_POST["gameuserscore"]=="finish"){
                  //  echo "you came from game : <br>";
                    //echo "game id : ".$_POST["gameid"]."<br>";
                    //echo "latest player score : ".$_POST["pscore"]."<br>";
                   // session_start(); not needed becuse include nav in the top of document alrdy has session start 
                    $uname=$_SESSION["username"];

                    $sql="SELECT id FROM users WHERE userName='$uname'";
                    $statement=$pdo->prepare($sql);
                    //$statement->bindParam(':user_email', $useremail, PDO::PARAM_STR);
                    $statement->execute();
                    $data=$statement->fetchAll();


                    foreach($data as $record){
                        $user_id=$record['id'];
                    }
                    //echo "<br>user id = ".$user_id;
                    $gameid=$_POST["gameid"];

                    $sql="SELECT * FROM playerstatus WHERE player_id='$user_id' && game_id='$gameid'";
                    $statement=$pdo->prepare($sql);
    
                    $statement->execute();

                    $count=$statement->rowCount();
                    //below if will check if a user has played game before
                    if($count>0){
                        $data=$statement->fetchAll();

                        foreach($data as $record){
                        if($record["ps_highest_player_score"]<$_POST["pscore"]){
             
                            //if user score is higher than higest score run this code to update higest score
                            $sql2="UPDATE playerstatus SET ps_latest_player_score=?, ps_highest_player_score=?, player_id=?, game_id=? WHERE player_id=? && game_id=?";

                            $statement2=$pdo->prepare($sql2);
            
                            $statement2->execute([$_POST["pscore"], $_POST["pscore"], $user_id, $_POST["gameid"], $user_id, $_POST["gameid"]]);
                            echo "<h1>Thank You for Playing</h1>";
                            echo "<h2>Congrats you got a new high score in this game we have updated our records</h2>";
                            echo "<h3>Check your new score in  the leader board</h3>";


                        }
                        else{

                            //this code wiil not update higest score beuse user score is lower than highest score
                            $sql2="UPDATE playerstatus SET ps_latest_player_score=?, player_id=?, game_id=? WHERE player_id=? && game_id=?";

                            $statement2=$pdo->prepare($sql2);
                            $statement2->execute([$_POST["pscore"], $user_id, $_POST["gameid"], $user_id, $_POST["gameid"]]);

                            echo "<h1>Thank You for Playing</h1>";
                            echo '<h2>Your Score : '.$_POST["pscore"].' Your Higest Score : '.$record["ps_highest_player_score"].'</h2>';


                        }
                        echo '<div class="column">';
                        echo '<a href="leaderboards.php">Check Leader Boards</a>';
                        echo '<a href="game'.$_POST["gameid"].'.php">Play Again</a>';

                        echo '</div>';

            
                    }

                    }
                    else{
                        //// if a user didnt play a game before it will create a new record of user with the user score being highesst score
                        $sql="INSERT INTO playerstatus (ps_latest_player_score, ps_highest_player_score, player_id, game_id) VALUES (?,?,?,?)";

                        $statement=$pdo->prepare($sql);
        

                        $statement->execute([$_POST["pscore"], $_POST["pscore"], $user_id, $_POST["gameid"]]);
                        echo "<h1>Thank You for Playing</h1>";

                    }

                }
                else{//somone tried to access this page by typing the url or improply
                    echo "you shouldnt be here you will be redirected to register in 5 seconds";
                    header('Refresh:5;  url=register.php');

                }


            // echo '<a href="register.php">go back</a>';


                ?>
            </section>
        </main>
        <?php
        include("includes/footer.php");
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>

        <script src="scripts/menu.js"></script>
    </body>
</html>