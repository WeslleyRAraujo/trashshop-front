let button = document.getElementById('login-button')

button.onclick = () => {
    let password = document.getElementById('password').value
    let login = document.getElementById('login').value
    
    if(isEmail(login) && password.length > 0) {
        button.innerHTML = 'Processando  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>'
    }

    function isEmail(email) {
        const re = /\S+@\S+/
        return re.test(email)
    }
}