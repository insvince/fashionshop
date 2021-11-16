const product = document.querySelectorAll('.product')
const btn = document.querySelectorAll('.button-menu')

// Ẩn hiện button-menu 
for (const key in product) {
    if (Object.hasOwnProperty.call(product, key)) {
        product[key].addEventListener("mouseover", () =>{
            btn[key].classList.add("active")
        })
        product[key].addEventListener("mouseout", () =>{
            btn[key].classList.remove("active")
        })  
    }
}
