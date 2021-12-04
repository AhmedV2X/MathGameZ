
drop table if exists playerstatus;
drop table if exists game;
drop table if exists lesson;
drop table if exists users;



CREATE TABLE lesson(
    id INT NOT NULL AUTO_INCREMENT,
    lesson_catagory VARCHAR (255),
    lesson_name VARCHAR (255),
    lesson_explanation TEXT,
    lesson_imglink VARCHAR (200),
    PRIMARY KEY (id)

);

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    user_email VARCHAR (255),
    userName VARCHAR (255),
    user_password TEXT,
    user_age INT,
    user_gender VARCHAR (10),
    user_imglink VARCHAR (255),
    PRIMARY KEY (id)

);

CREATE TABLE game(
    id INT NOT NULL AUTO_INCREMENT,
    game_name VARCHAR (255),
    lesson_id INT,
    game_catagory VARCHAR (255),
    game_link VARCHAR(100),/*needed to know which page the user will go to when they choose game*/
    PRIMARY KEY (id),
    CONSTRAINT lessonGame_fk FOREIGN KEY (lesson_id) REFERENCES lesson(id)
);

CREATE TABLE playerstatus(
        id INT NOT NULL AUTO_INCREMENT,
        ps_latest_player_score INT,
        ps_highest_player_score INT,
        player_id INT,
        game_id INT,
        PRIMARY KEY (id),
        CONSTRAINT psGame_fk FOREIGN KEY (game_id) REFERENCES game(id),
        CONSTRAINT psUser_fk FOREIGN KEY (player_id) REFERENCES users(id)

);
/* not needed
CREATE TABLE leaderboard(
    id INT NOT NULL AUTO_INCREMENT,
    player_status INT,
    PRIMARY KEY (id),
    CONSTRAINT lbPS_fk FOREIGN KEY (player_status) REFERENCES playerstatus(id)

);*/

/*INSERT INTO user (user_email,user_password,user_age,user_gender,user_imglink) VALUES ("ah600610@pop.com","12345",19,"male",""),
("pthisha@google.com","8754",8,"female",""),
("mike@yahoo.com","remio234",19,"na","");*/

INSERT INTO lesson (lesson_catagory, lesson_name, lesson_explanation, lesson_imglink) VALUES 
("simple math","addition","To add to a group of numbers or things.<br>
When we add, the numbers of things in a group becomes larger.<br>
Addition use the Operator : <b> + </b>  to preform calculations.<br>
For example if we have the following numbers: 10,  6, 4 <br>
We can add the numbers in any order, and they will give the same result<br>
<ul>
<li> 10 + 6 + 4 = 20</li>
<li> 4 + 6 + 10 = 20</li>
<li> 6 + 4 + 10  = 20</li>
</ul>
<p>And so on …<br>
Any combination of the same number will give the same result.</p>","images/lessons/add.jpg"),
("simple math","subtraction","To take away from a group of numbers or things. <br>
When we subtract, the number of things in group becomes smaller. <br>
Subtraction use the Operator:  <b> - </b> to preform calculations. <br>
 For example if we have the following numbers: 10,  6, 4 <br>
We can subtract the numbers and their total will be reduced order matters in subtraction. <br>
<ul>
<li> 10 - 6 - 4 = 0 </li>
<li> 4 - 6 - 10 = - 12 </li>
<li> 6 -  4 - 10 = - 8 </li>
</ul>
<p>And so on …<br>
Different combinations of the same number will give the different results.</p>","images/lessons/sub.jpg"),
("simple math","multiplication","When we take a number and add it together multiple times . <br>
You can think of multiplication as repeated addition . <br>
Multiplication uses the Operator : <b> * </b> to preform calculations. <br>
We can multiply  the numbers in any order, and they will give the same result<br>
For example if we have the numbers : 3, 5 <br>
<ul>
<li>3 * 5 = 15 </li>
</ul>
<p>The above statement is equivalent to  <em> 3 + 3 + 3 + 3 +3  = 15 </em> <br></p>
<ul> 
<li>5 * 3 = 15</li>
</ul>
<p>The above statement is equivalent to  <em> 5 + 5 + 5  = 15 </em> <br>
Any combination of the same numbers will give the same result. </p>","images/lessons/multi.jpg"),
("simple math","division","Is splitting a number or a group of things into smaller equal parts. <br>
Division uses the Operator  <b> / </b> to preform calculations. <br>
Order matters in division <br>
For example if we have the following numbers : 10, 5
<ul>
<li> 10 / 5 = 2 </li>
<li> 5 / 10  =  0.5 </li>
</ul>
<p>And so on …<br>
Different combinations of the same number will give the different results.</p>","images/lessons/divided.jpg"),
("simple math","order of operations","Are the rules that allow us to solve math problems <br>
The order of operation can be remembered by the acronym <br> 
<h2> PEMDAS <h2>
<ul>
<li> P - Parentheses  ( )</li>
<li> E - Exponents (ie Powers and Square Roots) </li>
<li> MD - Multiplication and Division (left to right) </li>
<li> AS – Addition and Subtraction (left to right) </li>
</ul>
<p>For Example the following equation : </p>
<p> 1+5*9 = ?</p>
<p>We need to multiply the 5 by 9  first then add the 1</p>
<ul>
<li>5 * 9 = 45</li>
<li>45 +1 =46</li>
</ul>","images/lessons/op.jpg"),

("fractions","addition","coming sonn","images/lessons/lesson-bg.png"),
("fractions","multiplication","coming sonn","images/lessons/lesson-bg.png"),
("fractions","division","coming sonn","images/lessons/lesson-bg.png"),
("fractions","subtraction","coming sonn","images/lessons/lesson-bg.png");


INSERT INTO game(game_name, game_catagory, lesson_id, game_link) VALUES 
("simple addtion","correct answer",1,"game1.php"),
("simple substraction","correct answer",2,"game2.php"),
("simple multiplication","correct answer",3,"game3.php"),
("simple division","correct answer",4,"game4.php"),
("order of operation","time out",5,"game5.php");

/*INSERT INTO playerstatus(ps_latest_player_score, ps_highest_player_score, logeduser_id, game_id) VALUES (0,0,1,1);*/
/*
INSERT INTO leaderboard(player_status) VALUES (1),
(1,2),
(2,1);*/