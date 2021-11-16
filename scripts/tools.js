function searchTool() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("toolSearchInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("tools");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h2")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function request(id){
    var userData = localStorage.getItem('user');
    userData = JSON.parse(userData);
    var data = {
        idTool: id,
        idUser: userData.id
    }
    fetch("../API/CRUD/requestTool.php",{
        method: 'PUT',
        body: JSON.stringify(data),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
    .then((response)=>response.json())
    .then((data) =>{
        if(data){
            Swal.fire(
                'Hecho!',
                `Herramienta solicitada`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al solicitar la herramienta`,
                'error'
            )
        }
    })
}