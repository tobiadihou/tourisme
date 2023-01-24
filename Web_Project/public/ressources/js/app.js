const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
let slideIndex = 0;
console.log(showSlides());





function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  console.log(slides)
  let dots = document.getElementsByClassName("dot");
  console.log(dots)
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";

  }
  slideIndex++;
  console.log(slideIndex);
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  //dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}



// sign_up_btn.addEventListener("click", () => {
//   container.classList.add("sign-up-mode");
 
// });

// sign_in_btn.addEventListener("click", () => {
//   container.classList.remove("sign-up-mode");
  
// });


