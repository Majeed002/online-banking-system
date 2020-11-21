
//Navbar Navigation Slider
const navSlide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    //toggle nav
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
    
    
        //animate links
        navLinks.forEach((link, index) => {
            if (link.style.animation){
                link.style.animation ='';
            }
            else{
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`
            }
            
    
        });
        
        //burger animation
        burger.classList.toggle('toggle');
    })
    
}


navSlide();

// For Home Page Image Slider

const slides=document.querySelector(".slider").children;
const prev=document.querySelector(".prev");
const next=document.querySelector(".next");
const indicator=document.querySelector(".indicator");
let index=0;


  prev.addEventListener("click", () =>{
      prevSlide();
      updateCircleIndicator(); 
      resetTimer();
  })

  next.addEventListener("click",() => {
     nextSlide(); 
     updateCircleIndicator();
     resetTimer();
     
  })

  // create circle indicators
   circleIndicator = () =>{
       for(let i=0; i< slides.length; i++){
           const div=document.createElement("div");
                 div.innerHTML=i+1;
               div.setAttribute("onclick","indicateSlide(this)")
               div.id=i;
               if(i==0){
                   div.className="active";
               }
              indicator.appendChild(div);
       }
   }
   circleIndicator();

   indicateSlide = (element) =>{
        index=element.id;
        changeSlide();
        updateCircleIndicator();
        resetTimer();
   }
    
   updateCircleIndicator = () =>{
       for(let i=0; i<indicator.children.length; i++){
           indicator.children[i].classList.remove("active");
       }
       indicator.children[index].classList.add("active");
   }

  prevSlide = () =>{
       if(index==0){
           index=slides.length-1;
       }
       else{
           index--;
       }
       changeSlide();
  }

  nextSlide = () =>{
     if(index==slides.length-1){
         index=0;
     }
     else{
         index++;
     }
     changeSlide();
  }

  changeSlide = () =>{
             for(let i=0; i<slides.length; i++){
                  slides[i].classList.remove("active");
             }

      slides[index].classList.add("active");
  }

  resetTimer = () =>{
        // when click to indicator or controls button 
        // stop timer 
        clearInterval(timer);
        // then started again timer
        timer=setInterval(autoPlay,4000);
  }

 
 autoPlay = () =>{
     nextSlide();
     updateCircleIndicator();
 }

 let timer=setInterval(autoPlay,4000);


 



