var modal = document.getElementById('modal-search')
var overlay = document.getElementById('overlay')
var slideshow = document.getElementById('slideshow')
var img = document.getElementsByClassName('product-select')


function openSearch(){
    if(modal){
        modal.style.display = "block"
        overlay.style.display = "block"
        slideshow.style.zIndex = "-1"
        for (let i = 0; i < img.length; i++) {
            img[i].style.zIndex = -1
         }
    }
}
function closeSearch(){
    modal.style.display = "none"
    overlay.style.display = "none"
    slideshow.style.zIndex = 0
    for (let i = 0; i < img.length; i++) {
        img[i].style.zIndex = 0
     }
}