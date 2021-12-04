let display=false;
function openCloseMenu(){
    if(display==false){
        gsap.timeline()
        .to("#mobileMenu",{display:"flex"})

        .to("#mobileMenu",{zIndex:1001})
        .to("#mobileMenu",{duration:0.5,opacity:1})

        display=true;

    }
    else{
            gsap.timeline()
            .to("#mobileMenu",{duration:0.5,opacity:0})

            .to("#mobileMenu",{display:"none"})
    
            .to("#mobileMenu",{zIndex:0})

        display=false;

    }

    
}