$(document).ready(function () {
    $('#modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this);

        var titulo = button.data('titulo');
        var ubicacion = button.data('ubicacion');
        var categoria = button.data('categoria');
        var autor = button.data('autor');
        var editorial = button.data('editorial');
        var isbn = button.data('isbn');

        modal.find('#titulo').html(titulo)
        modal.find('#ubicacion').html(ubicacion)
        modal.find('#categoria').html(categoria)
        modal.find('#autor').html(autor)
        modal.find('#editorial').html(editorial)
        modal.find('#isbn').html(isbn)

    })
});