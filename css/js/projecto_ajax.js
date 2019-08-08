
$(document).ready(function(){
    
    $('#IDform').validate({
        submitHandler: function(){
            var datos = $('#IDform').serializeArray();
            $.ajax({
                type: $('#IDform').attr('method'),
                data: datos,
                url: $('#IDform').attr('action'),
                dataType: 'json',
                success: function(data) {
                    var resultado = data;
                   if(data.respuesta){
                    console.log(data);
                    $_SESSION['mensaje'] = 'Creado Exitosamente';
                    $_SESSION['mensaje_color'] = 'success';
                    header("Location: crear_empleado.php");
                   }
                    // $(':input','#IDform')
                    // .not(':button, :submit, :reset, :hidden')
                    // .val('')
                    // .prop('checked', false)
                    // .prop('selected', false);
                }
            })
        }
    }); 
});