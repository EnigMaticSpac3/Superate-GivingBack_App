// AQUI SE ENCUENTRA LA INICIALIZACIÓN DEL PLUGIN DE DATATABLES

$(document).ready( function () {
    $('#data-table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json'
        }
    });
} );