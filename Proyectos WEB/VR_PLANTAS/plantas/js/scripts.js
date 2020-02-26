$(document).ready(function () {
    $("#plantas").dataTable({
        "order": [[0, "asc"]],
        dom: 'lBfrtip',
        buttons: [
            {extend: 'copy', title: 'Datos Planta'},
            {extend: 'csv', title: 'Datos Planta'},
            {extend: 'excel', title: 'Datos Planta'},
            {extend: 'pdf', title: 'Datos Planta'},
            {extend: 'print', title: 'Datos Planta'}
        ],
        columnDefs: [

            {targets: -1,
                className: 'dt-body-left'}

        ],
        "language": {
            "lengthMenu": "Desplegar _MENU_ Filas por pagina",
            "zeroRecords": "No se han encontrado registros",
            "info": "Mostrando pagina _PAGE_ of _PAGES_",
            "search": "Buscar:",
            "infoEmpty": "No hay filas disponibles",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    $("#plantas_tablas").dataTable({
        "order": [[4, "desc"]],
        dom: 'lBfrtip',
        buttons: [
            {extend: 'copy', title: 'Datos Planta'},
            {extend: 'csv', title: 'Datos Planta'},
            {extend: 'excel', title: 'Datos Planta'},
            {extend: 'pdf', title: 'Datos Planta'},
            {extend: 'print', title: 'Datos Planta'}
        ],
        columnDefs: [

            {targets: -1,
                className: 'dt-body-left'}

        ],
        "language": {
            "lengthMenu": "Desplegar _MENU_ Filas por pagina",
            "zeroRecords": "No se han encontrado registros",
            "info": "Mostrando pagina _PAGE_ of _PAGES_",
            "search": "Buscar:",
            "infoEmpty": "No hay filas disponibles",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mm-yy'
    });

});
