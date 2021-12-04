<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register Page</title>
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
            include("includes/nav.php");
        ?>


        <main>
        <section>
               <form action="process.php" onsubmit="return validateform()" method="post" name="registerform">
                   <label for="useremail">Email:</label>
                   <input id="useremail" type="email" placeholder="enter your email" oninput="clearError(0)" name="useremail">
                   <span class="warnning"></span>

                   <label for="username">User Name:</label>
                   <input id="username" type="text" placeholder="enter your username" oninput="clearError(1)" name="uname">
                   <span class="warnning"></span>

                   <label for="gender">Gender:</label>
                   <select id="gender" onchange="clearError(2)" name="gender">
                       <option value="">Select Gender</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                       <option value="NA">Prefer Not To Say</option>
                    </select>
                    <span class="warnning"></span>

                    <label for="userage">Age:</label>
                   <input id="userage" type="number" min=1 max=100 placeholder="enter your age" oninput="clearError(3)" name="userage">
                   <span class="warnning"></span>

                   <label for="userpass">Password:</label>
                   <input id="userpass" type="password" placeholder="enter your password" oninput="clearError(4)" name="userpass" >
                   <span class="warnning"></span>

                   <label for="confirmpass">Confirm Password:</label>
                   <input id="confirmpass" type="password" placeholder="confirm your password" oninput="clearError(5)" name="confirmpass" >
                   <span class="warnning"></span>

                   <input type="submit" value="Register" name="register">
                   
               </foum>
               <a href="login.php">alredy have an account login here</a>

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
        <script src="scripts/validatedata.js"></script>

    </body>
</html>