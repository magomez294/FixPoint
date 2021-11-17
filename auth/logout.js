async function logOut(){
    localStorage.clear();
    await fetch("../API/auth/logout.php", {
        method: 'POST',
    });
    window.location.replace("/");
        console.log('entra');
    
}