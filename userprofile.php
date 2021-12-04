<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User Profile Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
        <link rel="stylesheet" href="styles/userprofile.css">

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
                <?php
                //data
                    include("includes/connection.php");
                   // session_start();
                    
                    if(isset($_SESSION["username"])){
                        $uname=$_SESSION["username"];
                        $sql="SELECT * FROM users WHERE userName='$uname'";
                        $statement=$pdo->prepare($sql);
                        $statement->execute();
                        $data=$statement->fetchAll();
                        echo '<div class="row">';

                            echo '<div class="column">';


                            foreach($data as $record){
                            //   echo 
                            $userid=$record["id"];
                            echo '<p> User Name : '.$record['userName'].'</p>';

                            echo '<p> Email : '.$record['user_email'].'</p>';
                            echo '<p> Age : '.$record['user_age'].' Years </p>';
                            echo '<p> Gender : '.$record['user_gender'].'</p>';
                            //echo '<form>'
        

                            }
                            echo '</div>';
                            echo '<div class="column">';

                            foreach($data as $record){
                                //   echo 
                                echo '<img src="'.$record['user_imglink'].'">';;
                    
                                //echo '<form>'
            
            
                            }
                            echo '</div>';
                        echo '</div>';



                ?>


            </section>
            <section>
                <?php
                //img
                /*foreach($data as $record){
                    //   echo 
                    echo '<img src="'.$record['user_imglink'].'">';;
           
                    //echo '<form>'


                   }*/
                   $sql="SELECT * FROM playerstatus WHERE player_id=:player_id";
                   $statement=$pdo->prepare($sql);
                   $statement->bindParam(':player_id', $userid, PDO::PARAM_INT);
                   $statement->execute();
                   $data=$statement->fetchAll();

                   echo '<table>';
                       echo '<tr>';
                           echo '<th>Game Name</th>';
                           echo '<th>Lastest Score</th>';
                           echo '<th>Highest Score</th>';
                       echo '</tr>';
                   foreach($data as $record){
                       //we needed another sql to get the name of the game according to game id in the player status table
                        $sql2="SELECT game_name FROM game WHERE id=:id";
                        $statement2=$pdo->prepare($sql2);
                        $statement2->bindParam(':id', $record['game_id'], PDO::PARAM_INT);
                        $statement2->execute();
                        $data2=$statement2->fetchAll();
                       echo '<tr>';


                        foreach($data2 as $record2){
                            echo'<td>'.$record2['game_name'].'</td>';
                        }
                      //

                           echo'<td>'.$record['ps_latest_player_score'].'</td>';
                           echo'<td>'.$record['ps_highest_player_score'].'</td>';

                       echo '</tr>';

                   }
                   echo '</table>';
               }
               else{
                   //redirect to home
                   header('Location:  index.php');

               }
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