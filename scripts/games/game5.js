score=0;
function start(){
    //alert("start");
    document.getElementById("start").style.display="none";
    document.getElementsByClassName("chkAnswer")[0].style.display="flex";
    startClock();
    creatQ();




}
function startClock(){
    document.getElementsByClassName("instruction")[0].style.display="none";
    let clock=60;
    countdown=setInterval(function(){
        
        clock--;
        document.getElementById("clock").innerText=clock;
       // console.log(clock);
        if(clock<=0){
            stopClock()
        }


    },1000);   
}
function creatQ(){
    question=[];
    
    firstnumber=Math.floor(Math.random() * 10)+1;
    secondnumber=Math.floor(Math.random() * 10)+1;
    thirdnumber=Math.floor(Math.random() * 10)+1;
    fourthnumber=Math.floor(Math.random() * 10)+1;

        question.push(firstnumber);

        randomSign();
         question.push(secondnumber);
         randomSign();


         question.push(thirdnumber);
         randomSign();


         question.push(fourthnumber);


    



    document.getElementById("question").innerText=question.join(" ");



}
function randomSign(){
    let randomizeSign="";

    randomizeSign=Math.floor(Math.random() * 4);
         if(randomizeSign==0){
            question.push("+");
         }
         else if(randomizeSign==1){
            question.push("-");

         }
         else if(randomizeSign==2){
            question.push("*");

         }
         else{
            question.push("/");  
         }
}
function chekAnswer(){
    let userAnswer=document.getElementById("answer").value;
    let correctAnswer=eval(document.getElementById("question").innerText).toFixed(1);
    console.log(userAnswer)
    console.log(correctAnswer)
    console.log(correctAnswer==userAnswer)
    if(userAnswer==correctAnswer){
        document.getElementsByClassName("floor")[score].style.backgroundColor="teal";

        score++;
    }
    else{
        document.getElementsByClassName("floor")[score].style.backgroundColor="white";

        score--;
        if(score<0){
            score=0;
        }
        //document.getElementsByClassName("floor")[score].innerText=score*10+"%";
        document.getElementsByClassName("floor")[score].style.backgroundColor="white";


    }

    creatQ();
    document.getElementById("answer").value="";

}
function stopClock(){
    clearInterval(countdown);
    endGame();

}
function endGame(){//show scroe and reset game

    document.getElementById("result").innerHTML=
    '<h1>Game Over</h1>'+
    '<form action="process.php" name="hiddenscore" method="post">'+
    '<input class="hideeme" type="number" value="5" readonly name="gameid">'+
    '<h1> You Reached Floor '+score+'</h1>'+

    '<input class="hideeme"  class="score" type="number" value="'+score+'" readonly name="pscore">'+
    '<input type="submit" value="finish" name="gameuserscore">'+'</form>';
    document.getElementById("result").style.display="flex";


    score=0;
   // alert("end")
}
function closeme(){
    // closes thee window
    //this might be replaced by close button to sumbit the player result
    document.getElementById("result").style.display="none";
}
