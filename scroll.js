// Head text under-line
let line = document.querySelectorAll(".text-underline");   

  



// Register the ScrollTrigger plugin correctly
gsap.registerPlugin(ScrollTrigger);
document.addEventListener("DOMContentLoaded", function() {
    const footer = document.querySelector(".footer1");
    const lastCard = document.querySelector(".card.scroll");
    const pinnedSections = gsap.utils.toArray(".pinned");

    

    pinnedSections.forEach((section, index, sections) => {
        let Scroll_div = section.querySelector(".Scroll-div");

        // Ensure the next section exists
        let nextSection = sections[index + 0.5] || lastCard;                                      // animation time scale during scroll up
        let endScalePoint = `top+=${nextSection.offsetTop - section.offsetTop} top`;


        let indexes = index;

        // Pinning the sections during scrolling
        gsap.to(section, {
            scrollTrigger: {
                trigger: section,
                start: "top top",                   // Pin when section hits the top of the viewport
                end: index === sections.length 
                ? `+=${lastCard.offsetHeight / 2}`              // Pin for the last card height
                : footer.offsetTop - window.innerHeight,            // End before footer hits the viewport
                pin: true,
                pinSpacing: false,               // Keep space where the section was
                scrub: 1,
            }
        });

        // Scaling animation for the images within pinned sections
       
        gsap.fromTo(Scroll_div, {
            // scale: 1,
            marginTop: index === 0 ? 10 : 70,
            y: 5+(index + 0.1) * 30,
           
        }, {
            scale: 0.88+(index*0.020),
            y: (index + 0.1) * 20,
            duration: 3 ,  
             
            
            

            ease: "none",
            scrollTrigger: {
                trigger: section,
                start: "top top",
                // end: endScalePoint,                 // Scale until the next section reaches the top
                end: 0.88+(index*0.024),
                scrub: 1,

                
                // onEnter: () => console.log("Element entered"+indexes),
                // onLeave: () => console.log("Element left"+indexes),

                onUpdate: (next) => {
                    const counts = index - 2;
                    if (counts >= 0 && counts < line.length && line[counts] && line[counts].style) {
                      const progress = next.progress;
                      if (progress > 0.99) {
                        line[counts].style.backgroundColor = "rgb(47, 255, 64)";
                        
                      } else {
                        if (line[counts - 1] && line[counts - 1].style) {
                          line[counts - 1].style.backgroundColor = "rgb(47, 255, 64)";
                        }
                        line[counts].style.backgroundColor = "white";
                      }
                    }
                  },
                  onLeave: () => {
                    const counts = index - 2;
                    if (line[counts - 1] && line[counts - 1].style) {
                      line[counts - 1].style.backgroundColor = "white";
                    }
                  },
          
            }
        });
    });

    // Handle opacity change of hero heading during scroll
    const heroH1 = document.querySelector(".hero h1");
        ScrollTrigger.create({
            trigger: document.body,
            start: "top top",
            end: "+=900vh",
            scrub: 1,
            onUpdate: (self) => {
                let opacityProgress = self.progress;
                heroH1.style.opacity = 0.2 + opacityProgress;  // Fade out hero heading
                heroH1.style.color = `rgb(${255 - (opacityProgress * 255)}, 0, ${opacityProgress * 255})`;

            }
        });
 });



