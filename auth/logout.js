function logOut(){
    localStorage.clear();
    fetch("../API/auth/logout.php", {
        method: 'POST',
    });
}