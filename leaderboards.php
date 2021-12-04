<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
        <link rel="stylesheet" href="styles/leaderboards.css">


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
                <h1>Ranking Ladder</h1>
                <div class="ladder-grid">

                <?php

                    include("includes/connection.php");
                    $GameListIds=array();
                    // needed to get a list of games that has game link which means the game can be played by user
                    $sql="SELECT * FROM game";
                    $statment=$pdo->prepare($sql);
                    $statment->execute();
                    $data=$statment->fetchAll();
                    foreach($data as $record){
                        if($record["game_link"]!=NULL){
                            array_push($GameListIds,$record["id"]);

                        }
             
                    }
                    //echo count($GameListIds);
                    //print_r($GameListIds);
                 //   foreach($GameListIds as $gameId){

                   // }


                    foreach($GameListIds as $gameId){
                        echo '<table>';

                        //to choose game names as headers in table
                        $sql="SELECT game_name FROM game WHERE id='$gameId'";
                        $statment=$pdo->prepare($sql);

                        $statment->execute();
                        $data=$statment->fetchAll();
                        foreach($data as $record){
                            echo '<tr>'; 
                            echo '<th class="gameName" colspan=2>'.$record["game_name"].'</th>';
                            
                            echo '</tr>';
                            

                        } 

                        //to choose the top 15 players and order by higest score 
                        $sql="SELECT * FROM playerstatus WHERE game_id='$gameId' ORDER BY ps_highest_player_score DESC LIMIT 15";
                        $statment=$pdo->prepare($sql);
                        //$statment->bindParam(':game_id', $gameId, PDO::PARAM_INT);

                        $statment->execute();
                        $data=$statment->fetchAll();

                        echo '<tr>'; 
                            echo '<th>User Name</th>';
                            echo '<th>Highest Score</th>';

                        echo '</tr>';
                        foreach($data as $record){
                            // to choose the user emails from the user table by id
                            $playerid=$record["player_id"];

                            $sql2="SELECT userName FROM users WHERE id='$playerid'";
                            $statment2=$pdo->prepare($sql2);
    //                        $statment2->bindParam(':id', $record["player_id"], PDO::PARAM_INT);
    
                            $statment2->execute();
                            $data2=$statment2->fetchAll();
                            foreach($data2 as $record2){
                                $uname=$record2["userName"];
    
                            }
                            echo '<tr>';
                            echo '<td>'.$uname.'</td>';
                            echo '<td>'.$record["ps_highest_player_score"].'</td>';

                            echo '</tr>';
                           // echo "game name : ".$gamename." player email : ".$useremail." score :  ".$record["ps_highest_player_score"]."<br>";

                        }
                        echo '<tr>';
                        echo '<td class="viewall" colspan=2> <a href="leaderboard.php?gameid='.$gameId.'">See All </a></td>';
    
                        echo '</tr>';
                        echo '</table>';

                    }



                ?>
                </div>
          
            </section>

        </main>
        <?php
        include("includes/footer.php");
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>

        <script src="scripts/menu.js"></script>

    </body>
</html>