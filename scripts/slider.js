var test=setInterval(() => {
    nextSlide();
  }, 3000);
let currntSlide = 0;

function stop(){
    clearInterval(test);

}
function go(){
     test=setInterval(() => {
        nextSlide();
      }, 3000);
}
/**HOME sLIDER */
  function nextSlide() {
    //the next slide will check if the current slide value is = 3
    // the number 3 represent last slide in the slider
    //when the last slide is reached (number 3) the last slide will disaper and slide number 1 will appear
     if (currntSlide == 3) {
        gsap.timeline()
        .to("#slide"+currntSlide,{opacity:0})

        .to("#slide"+currntSlide,{display:"none"})
 
       currntSlide = 1;
       gsap.timeline()
       .to("#slide"+currntSlide,{display:"flex"})

       .to("#slide"+currntSlide,{opacity:1})

       return;
 
     }
     //otherwise the current slider will disappear and the current slider 
     //will increase by one and apppear again 
     else {

       gsap.timeline()
       .to("#slide"+currntSlide,{opacity:0})

       .to("#slide"+currntSlide,{display:"none"})

        currntSlide++;
        gsap.timeline()
        .to("#slide"+currntSlide,{display:"flex"})
 
        .to("#slide"+currntSlide,{opacity:1})
        return;
 
     }   
   }

   function preSlide(){
     if(currntSlide<=1){
      currntSlide=1; 

      gsap.timeline()
      .to("#slide"+currntSlide,{opacity:0})

      .to("#slide"+currntSlide,{display:"none"})
      currntSlide=3; 
      gsap.timeline()
      .to("#slide"+currntSlide,{display:"flex"})

      .to("#slide"+currntSlide,{opacity:1})

      return;
     }
     else{
      gsap.timeline()
      .to("#slide"+currntSlide,{opacity:0})

      .to("#slide"+currntSlide,{display:"none"})

       currntSlide--;
       gsap.timeline()
       .to("#slide"+currntSlide,{display:"flex"})

       .to("#slide"+currntSlide,{opacity:1})
       return;
     }

   }