class Auth{
    constructor(){
        this.display = document.querySelector('body').style.display;
        document.querySelector('body').style.display = "none";
        const auth = localStorage.getItem('auth');
        this.validateAuth(auth);
    }
    validateAuth(auth) {
        console.log('Entra');
        if(auth != 1){
            console.log('Entra');
            window.location.replace("/FixPoint/login.html");
        }else{
            document.querySelector('body').style.display = this.display;
        }
    }

    logOut(){
        localStorage.removeItem('auth');
        localStorage.removeItem('user');
        window.location.replace("/FixPoint");
    }
}

const auth = new Auth();

const logout = document.getElementById('logout');

if (logout) {
    logout.addEventListener('click', ()=>{
        auth.logOut();
    })
}

