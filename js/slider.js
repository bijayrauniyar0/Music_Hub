let currentIndex = 0
const slides = document.querySelectorAll(".slide")

function perv(){
    currentIndex = (currentIndex - 1 + sliderImage.length)% sliderImage.length
    updateSlide()
}
function next(){
    currentIndex = (currentIndex + 1 ) % sliderImage.length
    updateSlide()
}
function updateSlide(){
    slides.forEach((slide,index) => {
        if( index === currentIndex){
           slide.style.display = "block" 
        }
        else{
            slide.style.display = "none"
        }
    });
}

const container = document.getElementById("artists")
const BtnPerv =  document.getElementById("perv1")
const BtnNext=  document.getElementById("next1")

BtnPerv.addEventListener('click',() => {
    container.scrollLeft -=150

});
BtnNext.addEventListener('click',() => {
    container.scrollLeft +=150

});