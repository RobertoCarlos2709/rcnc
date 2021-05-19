$(document).on('click', '#js-enviar', function(e){
    e.preventDefault();

    var dataTable = $('#usuario1').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
         url:"datos1.php",
         type:"POST"
        }
       });

    var nom = $("#nombrep").val();
    var ap = $("#marcap").val();
    var carg = $("#costop").val();

    $.ajax({
        method: 'POST',
        dataType: "html",
        url: "insertRegister1.php",
        data: "nombrep="+nom+"&marcap="+ap+"&costop="+carg,
        success: function(r){
            if (r == '200') { // Si el php anterior, imprimió 200
                $('#estado').html('<hr><p>Datos guardados correctamente.</p><hr>');
            } else {
                $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
            }
        }
    });
    
    $('#usuario1').DataTable().ajax.reload();
});