function validateform(){

       let email=document.forms["registerform"]["useremail"].value;
       let uname=document.forms["registerform"]["uname"].value;
       
       let ugender=document.forms["registerform"]["gender"].value;
       let uage=document.forms["registerform"]["userage"].value;

       
       let password=document.forms["registerform"]["userpass"].value;
       let confirmpassword=document.forms["registerform"]["confirmpass"].value;
       if(email == "" || uname == "" || ugender == "" || uage == "" || password == "" || confirmpassword == "" ){

           if(email == ""){
            document.getElementsByClassName("warnning")[0].innerText="please fill in the email";
            

        }   
        if(uname == ""){
            document.getElementsByClassName("warnning")[1].innerText="please fill in the username";
       

        }
        if(ugender == ""){
            document.getElementsByClassName("warnning")[2].innerText="please choose gender";
        

        }
        if(uage == ""){
            document.getElementsByClassName("warnning")[3].innerText="please fill your age";
            //console.log(3);


        }
        if(password == ""){
            document.getElementsByClassName("warnning")[4].innerText="please fill in the password";
            //console.log(4)

        }
        if(confirmpassword ==""){
            document.getElementsByClassName("warnning")[5].innerText="please confirm your password";
            //console.log(5)
        }


            return false;
        
       }
       else if(password.length<=7){
           document.getElementsByClassName("warnning")[4].innerText="password too short minmum 8 charcters";

           //alert("")
           //console.log(6)
           return false;


       }
       else if(password.normalize()!==confirmpassword.normalize()){
            document.getElementsByClassName("warnning")[4].innerText="Password Mismatch please make sure the two passwords match";
            document.getElementsByClassName("warnning")[5].innerText="Password Mismatch please make sure the two passwords match";

            //console.log(7)    
            return false;
       
       }
       else{
        //console.log(8)           

        return true;

       }
       //console.log(9)           

    

    

    

}
function clearError(errorid){
    document.getElementsByClassName("warnning")[errorid].innerText="";

}