function reject(id){
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
                `Herramineta rechazada`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `ha habido un problema al rechazar la herramienta`,
                'error'
            )
        }
    })
}

function validate(id){
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
                `Herramineta validada`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `ha habido un problema al validadr la herramienta`,
                'error'
            )
        }
    })
}