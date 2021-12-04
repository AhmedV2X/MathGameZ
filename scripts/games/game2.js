let firstNumber=0;
let secondNumber=0;
let userAnswer=0;
let correctAnswer=0;
let score=0;
let failCounter=0;
let successCounter=0;
let timeline=gsap.timeline();
function start(){
    document.getElementById("answerField").disabled=false;
    document.getElementById("submit").style.display="block";
    document.getElementById("start").style.display="none";
    /*timeline.to("#heart1",{color: "red"});
    timeline.to("#heart2",{color: "red"});
    timeline.to("#heart3",{color: "red"});

*/
    randomQuestion();


}
function randomQuestion(){
    firstNumber=Math.floor(Math.random()*10);
    secondNumber=Math.floor(Math.random()*10);
    document.getElementById("question").innerText=firstNumber+" - "+secondNumber;
    timeline.to("#addOne,#subOne",{opacity: 0, duration: 0.5});

}
function checkAnswer(){
    /*if(){
        alert("i am red");
    }*/
    //alert(document.getElementById("heart"+0).style.color);
    //alert(document.getElementById("heart1").style.color);
    //if()
    correctAnswer=firstNumber-secondNumber;
    userAnswer=document.getElementById("answerField").value;
    if(userAnswer==correctAnswer){
        score++;
        successCounter++;
        timeline.to("#addOne",{opacity: 1, duration: 0.5});

        gainHeart();

    }

    else {
        //score--;
        
        failCounter++;
        successCounter=0;

        if(failCounter>=3){
            endGame();

         

            return;
        }
        timeline.to("#heart"+failCounter,{color: "black", duration: 0.3});
        timeline.to("#subOne",{opacity: 1, duration: 0.5});

    }

    //alert(score);
    setTimeout(() => {

      randomQuestion();
      timeline.to("#addOne,#subOne",{opacity: 0, duration: 1});


    }, 1000);
     
    document.getElementById("answerField").value="";
}
function gainHeart(){
    if(successCounter>3){
        timeline.to("#heart"+failCounter,{color: "red", duration: 1});


        failCounter--;
        if(failCounter<0){
            failCounter=0;
        }
        successCounter=0;
    }
}
function endGame(){
    failCounter=0;

    resetStyle();
    //resetStyle();
    openScoreBoard();
    document.getElementById("UserScore").innerHTML=
    '<div><h1>Game Over</h1></div>'+
    '<div>Your Score :<form action="process.php" name="hiddenscore" method="post">'+
    '<input class="hideeme" type="number" value="2" readonly name="gameid">'+

    '<input  class="score" type="number" value="'+score+'" readonly name="pscore">'+
    '<input type="submit" value="finish" name="gameuserscore">'+'</form>'+
    '</div>';

    score=0;

}
function resetStyle(){
    //alert("d");
    document.getElementById("question").innerText="A - B";
    timeline.to("#heart1,#heart2,#heart3",{color: "red"});

    
    document.getElementById("answerField").value="";
    timeline.to("#submit",{display: "none"});
    timeline.to("#start",{display: "flex"});


    document.getElementById("answerField").disabled=true;

    
}
/*function closeScoreBoard(){
    timeline.to("#scoreBoard",{display: "none", duration: 1});
}*/
function openScoreBoard(){
    timeline.to("#scoreBoard",{display: "flex", duration: 0});

}

/*function start(){
    styleElments();
    randomQuestion();
}
function styleElments(){
    document.getElementById("answerField").disabled=false;
    document.getElementById("submit").style.display="block";
    document.getElementById("start").style.display="none";
}
function randomQuestion(){

     firstNumber=Math.floor(Math.random()*10);
     secondNumber=Math.floor(Math.random()*10);
     document.getElementById("question").innerText=firstNumber+"+"+secondNumber;
     document.getElementById("addOne").style.opacity=0;
     document.getElementById("subOne").style.opacity=0;


}

function checkAnswer(){
    correctAnswer=firstNumber+secondNumber;
    userAnswer=document.getElementById("answerField").value;
    if(userAnswer==correctAnswer){
        score++;
        successCounter++;
            document.getElementById("addOne").style.opacity=1;
        gainHeart();

    }

    else {
        //score--;
        
        failCounter++;
        successCounter=0;

        if(failCounter>3){
            endGame();
            return;
        }
        document.getElementById("heart"+failCounter).style.color="black";
        document.getElementById("subOne").style.opacity=1;

    }
    //alert(score);
    setTimeout(() => {

      randomQuestion();
      document.getElementById("addOne").style.opacity=0;
      document.getElementById("subOne").style.opacity=0;

    }, 1000);
     
    document.getElementById("answerField").value="";
}
function gainHeart(){
    if(successCounter>3){

        document.getElementById("heart"+failCounter).style.color="red";

        failCounter--;
        if(failCounter<0){
            failCounter=0;
        }
        successCounter=0;
    }
}
function endGame(){
    failCounter=0;
    resetStyle();
    openScoreBoard();
    document.getElementById("UserScore").innerHTML=
    "<div><h1>Game Over</h1></div>"+
    "<div><h2>Heighest Score: "+highestScore()+"</h2></div>"+
    "<div><h3>Your Score: "+score+"</h3></div>";

    score=0;

}

function closeScoreBoard(){
    document.getElementById("scoreBoard").style.display="none";
}
function openScoreBoard(){
    document.getElementById("scoreBoard").style.display="flex";

}

function resetStyle(){
    //alert("d");
    document.getElementById("question").innerText="X + Y";
    document.getElementById("heart1").style.color="red";
    document.getElementById("heart2").style.color="red";
    document.getElementById("heart3").style.color="red";
    document.getElementById("answerField").value="";
    document.getElementById("submit").style.display="none";

    document.getElementById("start").style.display="flex";

    document.getElementById("answerField").disabled=true;

    
}

function highestScore(){
    let highscore=0;
    if(localStorage.getItem("sub_highScore")){
         highscore=Number(localStorage.getItem("sub_highScore"));

        if(score>highscore){
            localStorage.setItem("sub_highScore",score);
        }

    }
    else{
        highscore=score;
        localStorage.setItem("sub_highScore",highscore);
        //return
    }
    return highscore;
}
*/