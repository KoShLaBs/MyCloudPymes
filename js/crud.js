$(document).ready(function() {

    $("#tablaDatos").bind("submit", function() {
        $.ajax({
            type:"POST",
            url:"../../php/CRUD/ReadV.php",
            
        })
    });
});

function obtenerDatos(id){

}

function eliminarDatos(id){
    swal({
        title: "¿Esta seguro de elminar este usuario",
        text: "Una vez eliminado no podrá recuperarse",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) =>{
        if(willDelete){

        }
    }) 
}
