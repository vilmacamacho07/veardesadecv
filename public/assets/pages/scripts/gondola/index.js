$(document).ready(function () {
    $("#tabla-data").on('submit', '.form-eliminar', function (event) {
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
                ajaxRequest(form.serialize(), form.attr('action'), 'eliminarGondola', form);
            }
        });
    });

    $('.ver-gondola').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const gondo = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(gondo, url, 'verGondola');
    });

    function ajaxRequest(gondo, url, funcion, form = false) {
        $.ajax({
            url: url,
            type: 'POST',
            data: gondo,
            success: function (respuesta) {
                if (funcion == 'eliminarGondola') {
                    if (respuesta.mensaje == "ok") {
                        form.parents('tr').remove();
                        Fletes.notificaciones('El registro fue eliminado correctamente', 'Fletes', 'success');
                    } else {
                        Fletes.notificaciones('registro no pudo ser eliminado, hay recursos usandolo', 'Fletes', 'error');
                    }
                } else if (funcion == 'verGondola') {
                    $('#modal-ver-gondola .modal-body').html(respuesta)
                    $('#modal-ver-gondola').modal('show');
                }
            },
            error: function () {

            }
        });
    }
});
