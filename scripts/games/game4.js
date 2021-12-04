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

    randomQuestion();


}
function randomQuestion(){
    firstNumber=Math.floor(Math.random()*10);
    secondNumber=Math.floor(Math.random()*10);
    if(secondNumber==0){
        //alert("this supposed to be 0");
        secondNumber=1;//reset 
        
    }
    alert((firstNumber/secondNumber).toFixed(2));
    document.getElementById("question").innerHTML=firstNumber+" &div; "+secondNumber;


    timeline.to("#addOne,#subOne",{opacity: 0, duration: 0.5});

}
function checkAnswer(){

    
    correctAnswer=(firstNumber/secondNumber).toFixed(2);
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
        timeline.to("#subOne",{opacity: 1, duration: 0});

    }
    setTimeout(() => {

      randomQuestion();
      timeline.to("#addOne,#subOne",{opacity: 0, duration: 0.5});


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
    '<input class="hideeme" type="number" value="4" readonly name="gameid">'+

    '<input  class="score" type="number" value="'+score+'" readonly name="pscore">'+
    '<input type="submit" value="finish" name="gameuserscore">'+'</form>'+
    '</div>';

    score=0;

}
function resetStyle(){
    //alert("d");
    document.getElementById("question").innerText="A ÷ B";
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

