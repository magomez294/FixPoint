class Auth{
    constructor(){
        this.display = document.querySelector('body').style.display;
        document.querySelector('body').style.display = "none";
        const auth = localStorage.getItem('auth');
        this.validateAuth(auth);
    }
    validateAuth(auth) {
        if (auth) {
            auth = JSON.parse(auth);
            const now = new Date()
            const actualTime = now.getTime();
            if(auth.value != 1 || actualTime > auth.expiry){
                console.log('Entra');
                window.location.replace("/login.html");
                console.log(auth);
            }else{
                document.querySelector('body').style.display = this.display;
            }
        }else{
            window.location.replace("/login.html");
        }
        
    }

    logOut(){
        localStorage.removeItem('auth');
        localStorage.removeItem('user');
        window.location.replace("/");
    }
}

const auth = new Auth();

const logout = document.getElementById('logout');

if (logout) {
    logout.addEventListener('click', ()=>{
        auth.logOut();
    })
}

