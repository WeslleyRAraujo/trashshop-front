let button = document.getElementById('login-button')

button.onclick = () => {
    let password = document.getElementById('password').value
    let login = document.getElementById('login').value
    
    if(isEmail(login) && password.length > 0) {
        button.innerHTML = `Processando 
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span class="visually-hidden">Loading...</span>`
    }

    function isEmail(email) {
        const re = /\S+@\S+/
        return re.test(email)
    }
}

if(localStorage.getItem('login_expired') == 'true') {
    document.getElementById("alert-error").innerHTML = `
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Olá!</strong> Sua Sessão foi finalizada, para continuar utilizando nossa plataforma realize o login novamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `
    localStorage.setItem("login_expired", false);
}