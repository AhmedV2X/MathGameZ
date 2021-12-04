<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="styles/navFooter.css">
        <link rel="stylesheet" href="styles/register_login.css">

        <!--Icons made by <a href="https://www.flaticon.com/authors/xnimrodx" title="xnimrodx">xnimrodx</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> home icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> lesson icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>contact icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>girl icon-->
        <!--Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>boy-->
    </head>
    <body>
        <?php
           // session_start();

            include("includes/nav.php");
        ?>


        <main>
            <section>

               <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                   <label for="useremail">Email:</label>
                   <input type="email" placeholder="enter your email" name="useremail" required>
                   <label for="userpass">Password:</label>
                   <input type="password" placeholder="enter your password" name="userpass" required>

                   <input type="submit" value="login" name="login">
                   
               </foum>

               <?php
                    include("includes/connection.php");
                    if(isset($_POST['login'])){
                        $useremail=$_POST['useremail'];
                        $sql="SELECT * FROM users WHERE user_email='$useremail'";
                        $statement=$pdo->prepare($sql);
                    
                        //$statement->bindParam(':user_email', $useremail, PDO::PARAM_STR);
                    
                    
                        $statement->execute();
                    
                        if($statement->rowCount() > 0){
                            //echo "you are registred";
                            //include("includes/connection.php");

                            $password=$_POST['userpass'];
                            $sql="SELECT * FROM users WHERE user_email=:user_email";
                            $statement=$pdo->prepare($sql);
                            $statement->bindParam(':user_email', $useremail, PDO::PARAM_STR);
                            $statement->execute();
                            $data=$statement->fetchAll();


                            foreach($data as $record){
                                $uname=$record["userName"];
                                if(password_verify($password, $record['user_password'])){
                                    //echo 'pass';//redirect to user profile
                                  //  $_SESSION["useremail"] = $useremail;
                                    $_SESSION["username"] = $uname;
                                    $_SESSION["usergender"]=$record['user_gender'];


                                    header("Location: index.php");

                                }
                                else{
                                    echo '<span class="warnning"> password is incorrect please enter correct password</span>';
                                }

                            }
                            
                            //check for password entred by user agnist hashed passwored in database

                            }
                            else{
                                echo '<span class="warnning"> email address doesn\'t exist please register</span>';
    
                            }

                    
                        }

                    

                
                
            ?>
                 <a href="register.php">dont have an account register here</a>

            </section>
            <section>
                <img src="images/panda.jpg"> 
            </section>

        </main>
        <?php
        include("includes/footer.php");
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"></script>

        <script src="scripts/menu.js"></script>

    </body>
</html>