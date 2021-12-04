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
        <link rel="stylesheet" href="styles/lessons_games.css">

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
        <section >
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                    <label for="lessoncatagory">Choose Catagory : </label>
                    <select  name="lessoncatagory">
                        <?php
                            include("includes/connection.php");
                            $sql="SELECT DISTINCT lesson_catagory FROM lesson";
                            $statement=$pdo->prepare($sql);

                            $statement->execute();
                            $data=$statement->fetchAll();
                            echo '<option value="all"> All </option>';
                            foreach($data as $record){
                                echo '<option value="'.$record['lesson_catagory'].'">'.$record['lesson_catagory'].'</option>';

                            }

                          //  echo '';
                        ?>

                    </select>

                   <input type="submit" value="Find Lesson" name="findCatagory">
                   
               </foum>

        </section>

        <section>

            <?php
            if(isset($_POST['findCatagory'])&&$_POST['lessoncatagory']!='all'){
                //echo 'you clicked button';
    
                //echo $_POST['lessoncatagory'];
                //include("includes/connection.php");
                
                $sql="SELECT * FROM lesson WHERE lesson_catagory=:lesson_catagory";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':lesson_catagory', $_POST['lessoncatagory'], PDO::PARAM_STR);
                $statement->execute();
                $data=$statement->fetchAll();
                
                echo '<ol>';
                foreach($data as $record){
                //   echo
                echo '<li><a href="lesson.php?lesson-id='.$record['id'].'">'.$record['lesson_catagory'].' - '.$record['lesson_name'].'</a></li>';//Lesson Catagory Name 
       
                
                }
                echo '</ol>';


            }
            else{
                //echo 'default result';
                include("includes/connection.php");
                $sql="SELECT * FROM lesson";
                $statement=$pdo->prepare($sql);
               // $statement->bindParam(':id', $_GET["lesson-id"], PDO::PARAM_STR);
                $statement->execute();
                $data=$statement->fetchAll();
            
                echo '<ol>';
                foreach($data as $record){
                //   echo
                echo '<li><a href="lesson.php?lesson-id='.$record['id'].'">'.$record['lesson_catagory'].' - '.$record['lesson_name'].'</a></li>';//Lesson Catagory Name 
       
                
                }
                echo '</ol>';
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