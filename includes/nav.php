<header>

<a href="index.php" class="logo">
    <img src="images/logo.PNG" alt="logo">

</a>
<nav>
    <button class="mobileButton" onclick="openCloseMenu()">
        <span>&#9776;
        </span>
    </button>
    <a href="index.php">
        <img src="images/icons/home.png" alt="home icon">
        <span>Home</span>
    </a>

    <a href="about.php">
        <img src="images/icons/about.png" alt="about us icons">

        <span>About Us </span>
    </a>

    <a href="lessons.php">
        <img src="images/icons/lessons.png" alt="lesson icon">

        <span>Lessons</span>


    </a>
    <a href="games.php">
        <img src="images/icons/games.png" alt="games icons">
        <span>Games</span>
    </a>
    <a href="leaderboards.php">
        <img src="images/icons/Ladderboard.png" alt="laadder board icon">
        <span>Ladder Boards</span>
        
    </a>
    <a href="contact.php">
        <img src="images/icons/contact.png" alt="contact us icon">
        <span>Contact Us</span>
    </a>
    <?php
        session_start();
        if(isset($_SESSION["username"])){
            //echo '<a href="#">'.$_SESSION["username"].'</a>';//send to user profile
            echo '<div class="logoutgroupwrap">';

            echo '<a href="userprofile.php">';
                if($_SESSION["usergender"]==="female"){
                    echo '<img src="images/icons/girl.png" alt="Register icon">';

                }
                else if($_SESSION["usergender"]==="male"){
                    echo '<img src="images/icons/boy.png" alt="Register icon">';

                }
                else{
                    echo '<img src="images/icons/flowerSymbole.png" alt="Register icon">';

                

                }
                
                echo '<span>'.$_SESSION["username"].'</span>';
            echo '</a>';
            echo '<a href="logout.php">';
            echo '<span class="material-icons">logout</span>';
            
            echo 'logout';

            
            
            echo '</a>';
            echo '</div>';
        }
        else{
            echo '<a href="login.php" class="lastitem">';
                echo '<img src="images/icons/boy.png" alt="Register icon">';
                echo '<span>Login</span>';
            echo '</a>';
        }
    
    ?>



</nav>

</header>
<div id="mobileMenu" class="mobileMenu">
    <button class="closeBtn" onclick="openCloseMenu()">
        &times;
    </button>

    <a href="index.php">
        Home
    </a>
    <a href="about.php">
        About Us
    </a>
    <a href="lessons.php">
        Lessons
    </a>
    <a href="games.php">
        Games
    </a>
    <a href="leaderboards.php">
        Ladder Boards
    </a>
    <a href="contact.php">
        Contact Us
    </a>
    




</div>
