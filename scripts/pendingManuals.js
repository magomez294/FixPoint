function validate(id) {
    var data = {
        id: id
    }
    fetch("../API/CRUD/validateManual.php",{
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
                `El manual con id ${id} a sido validado`,
                'success'
            )
        }
    })
}