$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//user
function deleteUser(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"user/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateUser(id){
    $.ajax({
        url:"user/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearUser").modal("show")
            $("#cedula").val(data.cedula)
            $("#nombre1").val(data.nombre1)
            $('#nombre2').val(data.nombre2)
            $('#apellido1').val(data.apellido1)
            $('#apellido2').val(data.apellido2)
            $('#telefono').val(data.telefono)
            $('#direccion').val(data.direccion)
            $('#email').val(data.email)
            $('#genero').val(data.genero)
            $('#nacionalidad').val(data.nacionalidad)
            $('#estado_civil').val(data.estado_civil)
            $('#fecha_nacimiento').val(data.fecha_nacimiento)
            $('#rh').val(data.rh)
            $("#id").val(data.id)
            $("#titulo").text("Editar Linea")
        }
    });
}
//TablaEstudio
function deleteTablaEstudio(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"tabla_estudio/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateTablaEstudio(id){
    $.ajax({
        url:"tabla_estudio/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearTablaEstudio").modal("show")
            $("#TE_titulo").val(data.titulo)
            $("#entidad_educativa").val(data.entidad_educativa)
            $("#fecha_terminacion").val(data.fecha_terminacion)
            $("#users_id").val(data.users_id)
            $("#id").val(data.id)
            $("#titulo").text("Editar Tabla de Estudio")

        }
    });
}
//HistoriaLaboral
function deleteHistorialLaboral(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"historial_laboral/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateHistorialLaboral(id){
    $.ajax({
        url:"historial_laboral/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearHistorialLaboral").modal("show")
            $("#users_id").val(data.users_id)
            $("#empresa").val(data.empresa)
            $("#cargo").val(data.cargo)
            $("#fecha_inicio").val(data.fecha_inicio)
            $("#fecha_terminacion").val(data.fecha_terminacion)
            $("#id").val(data.id)
            $("#titulo").text("Editar Historia Laboral")

        }
    });
}





