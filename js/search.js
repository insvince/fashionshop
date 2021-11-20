var modal = document.getElementById('modal-search')
var overlay = document.getElementById('overlay')
function openSearch(){
    if(modal){
        modal.style.display = "block"
        overlay.style.display = "block"
        
    }
}
function closeSearch(){
    modal.style.display = "none"
    overlay.style.display = "none"
}