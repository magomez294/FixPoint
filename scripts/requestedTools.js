function rent(id) {
    var data = {
        id: id
    }
    fetch("../API/CRUD/rentTool.php",{
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
                `El alquiler de la herramienta a sido validado`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al validar el alquiler de la herramienta`,
                'error'
            )
        }
    })
}

function notRent(id) {
    var data = {
        id: id
    }
    fetch("../API/CRUD/rejectTool.php",{
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
                `El alquiler de la herramienta a sido rechazada`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al rechazar el alquiler de la herramienta`,
                'error'
            )
        }
    })
}