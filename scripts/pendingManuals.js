function validate(id) {
    console.log(id)
    var data = {
        id: id
    }
    fetch("/API/CRUD/validateManual.php",{
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
            ).then(()=>{
                window.location.replace("/pages/admin/manageManual/pendingManuals.php");
            }); 
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al intentar validar el manual con id ${id}`,
                'error'
            )
        }
    })
}

function reject(id) {
    var data = {
        id: id
    }
    fetch("/API/CRUD/rejectManual.php",{
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
                `El manual con id ${id} a sido rechazado`,
                'success'
            ).then(()=>{
                window.location.replace("/pages/admin/manageManual/pendingManuals.php");
            }); 
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al intentar rechazar el manual con id ${id}`,
                'error'
            )
        }
    })
}