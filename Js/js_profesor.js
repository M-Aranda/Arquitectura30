$(document).ready(function () {
    var fillTable = function () {
        var anioIngreso = $("#cboAnioIngreso option:selected").index();
        var asignatura = $("#cboAsignatura option:selected").index();

        $.ajax({
            type: "POST",
            url: '../Controller/FetchAlumnos.php',
            data: {
                id_ingreso: anioIngreso,
                id_asignatura: asignatura
            }
        }).done(function (res) {
            $("#tbodyAlumnos").html(res);
        });
    }

    var fillCboAnioIngreso = function () {
        $.ajax({
            type: "POST",
            url: '../Controller/FetchAnioIngreso.php'
        }).done(function (res) {
            $("#cboAnioIngreso").html(res);
        });
    }
    
    var fillCboAsignatura = function () {
        $.ajax({
            type: "POST",
            url: '../Controller/FetchAsignatura.php'
        }).done(function (res) {
            $("#cboAsignatura").html(res);
        });
    }
    
    fillTable();
    fillCboAnioIngreso();
    fillCboAsignatura();
});

