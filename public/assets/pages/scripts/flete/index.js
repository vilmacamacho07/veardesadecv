$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
        const url = $(this).attr('href');
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarFlete', form);
            }
        });
    });

  
    $('.flete_llegada').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val(),
            _method: 'put'
        }
        ajaxRequest(data, url, 'flete_llegada', $(this));
    });

    
    $('.ver-gondola').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verGondola');
    });


    function ajaxRequest(data, url, funcion,  link, form = false) {    
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (funcion == 'eliminarFlete') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        Fletes.notificaciones('El registro fue eliminado correctamente', 'Fletes', 'success');
                    } else {
                        Fletes.notificaciones('El flete sigue en ruta, para eliminar por favor Finalizar', 'Fletes', 'error');
                    }
                } else if (funcion == 'verGondola') {
                    $('#modal-ver-gondola .modal-body').html(respuesta)
                    $('#modal-ver-gondola').modal('show');
                } else if (funcion == 'flete_llegada') {
                    const fecha = respuesta.fecha_llegada;
                    link.closest('tr').find('td.fecha-llegada').text(fecha);
                    link.remove();
                    location.reload();
                }
               
            },
            error: function () {

            }
        });
    }
   
});
