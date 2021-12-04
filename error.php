<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>registred user error</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&Shadows+Into+Light&display=swap" rel="stylesheet">
        <style>
        body{
            display:flex;
            flex-direction:column;
            align-items:center;
            background-color:#F9A620;

        }
        h1{
            color:maroon;
            font-size:3vw;
            margin-top:5%;
        }
        h2{
            font-size:2.5vw;
        }
        .row{
            display:flex;
            font-size:2vw;
            width:100%;
            align-items:center;
            justify-content:center;

        }
        .row a{
            margin-left:2%;
            min-width:fit-content;
            color: red;
        }

        </style>


    </head>
    <body>
        <?php
        if(isset($_GET['error'])){
            $error=$_GET['error'];
            //echo $error;
            if($error=="email"){
                echo "<h1>this email account is  alredy registred</h1>";
                echo "<h2>in 5 seconds you will be redirected to login page</h2>";
                
        
                echo '<div class="row"><p>if you arent redirected : </p> <a href="login.php">click here to login</a></div>';
                //header('Refresh:5;  url=login.php');
            }
            else{
                echo "<h1>this user name is  alredy registred  </h1>";
                echo "<h2>in 5 seconds you will be redirected to login page</h2>";
                
        
                echo '<div class="row"><p>if you arent redirected : </p> <a href="login.php">click here to login</a></div>';
            }
            header('Refresh:5;  url=login.php');

    


        }
        else{
            echo "you shouldnt be here";
            header('Refresh:2;  url=login.php');


        }


        ?>
    </body>
</html>