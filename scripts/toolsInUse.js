function finishRent(id){
    var data = {
        id: id
    }
    fetch("../API/CRUD/finishRentTool.php",{
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
                `El alquiler de la herramienta a sido finalizado`,
                'success'
            )
        }else{
            Swal.fire(
                'Error!',
                `Ha habido un error al finalizar el alquiler de la herramienta`,
                'error'
            )
        }
    })
}