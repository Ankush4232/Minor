
let currPosition = 0 ;

const slider = document.querySelector(".slider");
const slide = document.querySelectorAll(".slide");
let slideLen =slide.length;               // number of slide
// console.log(slideLen);


let nextBtn = document.querySelector(".next");
let prevBtn = document.querySelector(".prev");

// for next slide 
function nextSlideShow(){
   
        if(currPosition >= slideLen-1){
            currPosition = 0 ;
        }
        else{
            currPosition++;
        }
        console.log("slide ",currPosition);
        slider.style.transform = `translateX(-${currPosition *100}% )`;                        // transform property to scroll next slide   
}

//for previous slide
function prevSlideShow(){

    if(currPosition <= 0){
        currPosition = slideLen-1 ;
    }
    else if(currPosition > 0) {
        currPosition--;
    }
    console.log("slide",currPosition);
    slider.style.transform = `translateX(-${currPosition *100}% )`;                          // transform property to scroll previous slide 
}

let next = 0 ;                                                       // for stop slide to scroll 

nextBtn.addEventListener("click", ()=>{
    console.log("next");
    nextSlideShow(); 
    next = 1;                                                      // for stop slide to scroll 
});
prevBtn.addEventListener("click",()=>{
    console.log("prev");
    prevSlideShow();
    next = 1 ;                                                     // for stop slide to scroll 
});





//  Autometic iteration

let count = 200;
function iteration(data){
    return new Promise((resolve,reject) => {
        setTimeout(()=>{

            console.log("count = ",data);
            resolve("success");
            if(next == 1){
                next = 0 ;                                           // for stop slide to scroll 
            }
            else{
                nextSlideShow();
            }   
        },4000)
    })   
}


// Async-Await

async function getIteration() {
while(count >= 0){
    console.log(`getting counting data ${count}....`);
    await iteration(count);                             //await 
    count--;

}
};

getIteration();