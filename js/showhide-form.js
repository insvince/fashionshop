const login = document.getElementById('form-login')
const register = document.getElementById('form-register')

register.style.display = "none"

function openLogin() {
    register.style.display = "none"
    login.style.display = "block"
}
function openRegister() {
    register.style.display = "block"
    login.style.display = "none"
}
