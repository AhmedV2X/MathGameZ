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
        <link rel="stylesheet" href="styles/index.css">

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
            <section id="multi-slider" onmouseover="stop()" onmouseout="go()">
                <button onclick="nextSlide()">&#9654;</button>
                <div id="slide1" class="slide"><!--possibly welcome slides instead of games directly there-->
                    <img src="images/sliders/slide1desktop.jpg">
                    <span>
                     <h1>Welcome To Math GameZ</h1>

                    </span>

                </div>
                <div id="slide2" class="slide">
                    <img src="images/sliders/slide2desktop.jpg">

                    <span>
                        <h1> To Make Larning Math Simple Is Our Wish</h1>
                        <a href=""></a>
                    </span>

                </div>
                <div id="slide3" class="slide">
                    <img src="images/sliders/slide3desktop.jpg">


                    <span>
                        <h1>Learn More</h1>
                        <a href="lessons.php">Explore Our Lessons</a>

                        <a href="games.php">Explore our Games</a>
                    </span>

                </div>
                <button onclick="preSlide()">&#9664;</button>

            </section>
            <section>
                <h1>LESSONS</h1>
                <div class="lesson-grid"><!--lesson grid-->
                <?php
                                      

                    include("includes/connection.php");
                    $sql="SELECT id , lesson_name , lesson_catagory, lesson_imglink FROM lesson LIMIT 6";
                    $statment=$pdo->prepare($sql);
                    $statment->execute();


                    $data=$statment->fetchAll();
                    foreach($data as $record){
                        echo '<div class="lesson">';
                            echo '<a href="lesson.php?lesson-id='.$record['id'].'">';
                                echo '<img src="'.$record['lesson_imglink'].'" alt="'.$record['lesson_name'].'">';
                                echo '<p>'.$record['lesson_catagory'].' - '.$record['lesson_name'].'</p>';
                            echo '</a>';   
                        echo '</div>'; 
                    }


                
                
                ?>

                </div>

               <a href="lessons.php" class="view-lessons">All Lessons</a>
                

                <!--See all Lessons button-->

            </section>
            <section><!--Leaderboard-->
                <h1>Ranking Ladder</h1>
                <div class="ladder-grid"><!--Ranking Grid-->
                        <?php
                            include("includes/connection.php");
                            $GameListIds=array();
                            // needed to get a list of games that has game link which means the game can be played by user
                            $sql="SELECT * FROM game LIMIT 3";
                            $statment=$pdo->prepare($sql);
                            $statment->execute();
                            $data=$statment->fetchAll();
                            foreach($data as $record){
                                if($record["game_link"]!=NULL){
                                    array_push($GameListIds,$record["id"]);
        
                                }
                     
                            }

        
        
                            foreach($GameListIds as $gameId){
                                echo '<table>';
        
                                //to choose game names as headers in table
                                $sql="SELECT game_name FROM game WHERE id=:id";
                                $statment=$pdo->prepare($sql);
                                $statment->bindParam(':id', $gameId, PDO::PARAM_INT);
        
                                $statment->execute();
                                $data=$statment->fetchAll();
                                foreach($data as $record){
                                    echo '<tr>'; 
                                    echo '<th colspan=2>'.$record["game_name"].'</th>';
                                    
                                    echo '</tr>';
                                    
        
                                } 
        
                                //to choose the top 15 players and order by higest score 
                                $sql="SELECT * FROM playerstatus WHERE game_id=:game_id ORDER BY ps_highest_player_score DESC LIMIT 15";
                                $statment=$pdo->prepare($sql);
                                $statment->bindParam(':game_id', $gameId, PDO::PARAM_INT);
        
                                $statment->execute();
                                $data=$statment->fetchAll();
        
                                echo '<tr>'; 
                                    echo '<th>Email</th>';
                                    echo '<th>Highest Score</th>';
        
                                echo '</tr>';
                                foreach($data as $record){
                                    // to choose the user names from the user table by id
                                    $playerid=$record["player_id"];
        
                                    $sql2="SELECT userName FROM users WHERE id='$playerid'";
                                    $statment2=$pdo->prepare($sql2);
            
                                    $statment2->execute();
                                    $data2=$statment2->fetchAll();
                                    foreach($data2 as $record2){
                                        $uname=$record2["userName"];
            
                                    }
                                    echo '<tr>';
                                    echo '<td>'.$uname.'</td>';
                                    echo '<td>'.$record["ps_highest_player_score"].'</td>';
        
                                    echo '</tr>';
        
                                }
                                echo '<tr>';
                                echo '<td class="viewall" colspan=2> <a href="leaderboard.php?gameid='.$gameId.'">See All </a></td>';
            
                                echo '</tr>';
                                echo '</table>';
        
                            }
        


                        
                        ?>
              
                </div>
                <!--see all ladders-->
                <a  href="leaderboards.php" class="view-ladders">
                    All Ladders
                </a>

            </section>

        </main>
        <?php
        include("includes/footer.php");
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>

        <script src="scripts/menu.js"></script>
        <script src="scripts/slider.js"></script>

    </body>
</html>