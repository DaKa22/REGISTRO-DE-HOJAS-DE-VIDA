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
//Movimiento
function deleteMovimiento(id){
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

function updateMovimiento(id){
    $.ajax({
        url:"movimiento/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearMovimiento").modal("show")
            $("#tipo_movimiento").val(data.tipo_movimiento)
            $("#cedula_movimiento").val(data.cedula_movimiento)
            $("#nombre_movimiento").val(data.nombre_movimiento)
            $("#valor_total_movimiento").val(data.valor_total_movimiento)
            $("#id").val(data.id)
            $("#titulo").text("Editar Movimiento")

        }
    });
}
//DATOS_PRODUCTOS
function deleteDatos_producto(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"datos_producto/"+id,
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

function updateDatos_producto(id){
    $.ajax({
        url:"datos_producto/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearDatos_producto").modal("show")
            $("#codigo_producto").val(data.codigo_producto)
            $("#descripcion").val(data.descripcion)
            $("#costo_ultimo").val(data.costo_ultimo)
            $("#stock").val(data.stock)
            $("#lineas_id").val(data.lineas_id)
            $("#sublineas_id").val(data.sublineas_id)
            $("#id").val(data.id)
            $("#titulo").text("Editar Datos del Producto")

        }
    });
}
//Articulos_Movimiento
function deleteArticulos_movimiento(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"articulos_movimiento/"+id,
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

function updateArticulos_movimiento(id){
    $.ajax({
        url:"articulos_movimiento/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            $("#modal_crearArticulos_movimiento").modal("show")
            $("#cantidad").val(data.cantidad)
            $("#valor").val(data.valor)
            $("#datos_productos_id").val(data.datos_productos_id)
            $("#movimientos_id").val(data.movimientos_id)
            $("#id").val(data.id)
            $("#titulo").text("Editar Datos del Producto")

        }
    });
}




