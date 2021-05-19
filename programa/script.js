$(document).ready(function(){

 var dataTable = $('#usuario').DataTable({
  "language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
  },
  "paging" : false,
  "searching" : false,
  "processing" : true,
  "serverSide" : true,
  "retrieve" : true,
  "order" : [],
  "ajax" : {
   url:"datos.php",
   type:"POST"
  }
 });

 $('#usuario').on('draw.dt', function(){

  $('#usuario').Tabledit({
   url:'edicion.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
	editable:[[1, 'firstname'], [2, 'lastname'], [3, 'email']]
   },


   
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.idp).remove();
     $('#usuario').DataTable().ajax.reload();
    }
   }
  });


 });

 
  
}); 

$(document).on('click', '#js-enviar', function(e){
    e.preventDefault();

    var nom = $("#firstname").val();
    var ap = $("#lastname").val();
    var carg = $("#email").val();

    $.ajax({
        method: 'POST',
        dataType: "html",
        url: "insertRegister.php",
        data: "firstname="+nom+"&lastname="+ap+"&email="+carg,
        success: function(r){
            if (r == '200') { // Si el php anterior, imprimió 200
                $('#estado').html('<hr><p>Datos guardados correctamente.</p><hr>');
            } else {
                $('#estado').html('<hr><p>Error al guardar los datos.</p><hr>');
            }
        }
    });
    
    $('#usuario').DataTable().ajax.reload();

});