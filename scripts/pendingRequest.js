function validate(id) {
    var data = {
        id: id
    }
    fetch("../API/CRUD/validateTool.php",{
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
                `El alquiler de la herramienta a sido validada`,
                'success'
            )
        }else{
            Swal.fire(
                'Hecho!',
                `Ha habido un error al validar el alquiler de la herramienta`,
                'error'
            )
        }
    })
}

function reject(id) {
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
                'Hecho!',
                `Ha habido un error al rechazar el alquiler de la herramienta`,
                'error'
            )
        }
    })
}