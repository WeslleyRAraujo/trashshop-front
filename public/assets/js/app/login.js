async function login() {

    //let email = document.getElementById("email").value
    //let password = document.getElementById("password").value

    let email = "fodac"
    let password = "fodac2"
    
    const token = await requestLogin(email, password)

    console.log(token['token'])
}

const url = "https://61b28956c8d4640017aaf436.mockapi.io/api/v1/login"

const requestLogin = async (email, password) => {
    const response = await fetch(url, {
        body: {
            email,
            password
        },
        method: "POST"
    })

    const data = await response.json()

    return data
}

login()