window.onload = () => {
   getSessionTime()
}

function getSessionTime() {
    const timer = setInterval(() => {
        fetch('http://trashshop.net/sessiontime')
        .then(response => response.json())
        .then(
            data => data[0] != '' ? updateTime(data[0]) : clearInterval(timer)
        )
        .catch(() => {
            clearInterval(timer)
        })
    }, 1000)
    function updateTime(time) {
        if(time == '00:01') {
            document.getElementById("timer").innerHTML = '&#x23F3; 00:01'
            setTimeout(() => {
                localStorage.setItem("login_expired", true);
                window.location.reload()
            }, 1000)           
        } else {
            document.getElementById("timer").innerHTML = '&#x23F3; ' + time
        }
    }
}