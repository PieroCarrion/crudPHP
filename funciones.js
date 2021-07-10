function addData(){
    var datos = $("#frmInsert").serialize();
    $.ajax({
        method:"POST",
        url:"insert.php",
        data: datos,
        success: function(e){
            console.log(e);
            if(e == 1){
                alert("Registro exitoso");
                $("#crud").load("index.php");
            }else{
                alert("Error de Registro");
            }
        }
    });
    return false;
}

function completeModal(datos){
    d = datos.split('||');
    $("#idU").val(d[0]);
    $("#nombreU").val(d[1]);
    $("#apellidosU").val(d[2]);
}

function actualizarDatos(){
    var datos = $("#frmUpdate").serialize();
    $.ajax ({
        method: "POST",
        url: "update.php",
        data: datos,
        success: function(e){
            console.log(e);
            if(e == 1){
                alert("Registro actualizado");
                $("#crud").load("index.php");
            }else{
                alert("Error de Actualización");
            }
        }
    });
    return false;
}
function eliminarDatos(){
    var datos = $("#frmUpdate").serialize();

    $.ajax({
        method: "POST",
        url: "delete.php",
        data: datos,
        success: function(e){
            if(e ==1){
                alert("Eliminado exitosamente");
                $("#crud").load("index.php");
            }else{
                alert("Error");
            }
        }

    });
    return false;
}
