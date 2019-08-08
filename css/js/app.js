$(document).ready(function(){


$('.seleccionar').select2();


/// validaciones//// 

$('#cedula').on('blur', function(){

  var inputElement = $('#cedula'),
  data = {"cedulaValidar" : inputElement.val()}

  $.ajax({

    type: 'post',
    url: 'validaciones.php',
    dataType: 'json',
    data: data,
    success: function(data)
    {
        console.log(data);
        if(data.respuesta == false){
           alert("Esta cédula no es correcta");
            $('#cedula').val('');
          
        }
        if(data.resultado == 'existe'){
          alert("Esta cédula ya existe");
          $('#cedula').val('');
        }
       
  }      
});

});

$.validator.setDefaults({
    errorClass: 'form_error',
    errorElement: 'div'
  });


$.validator.addMethod("cRequired", $.validator.methods.required,
"Este campo debe ser completado");
// alias minlength, too
$.validator.addMethod("cMinlength", $.validator.methods.minlength,
// leverage parameter replacement for minlength, {0} gets replaced with 2
 $.validator.format("Este campo debe tener al menos {0} caracteres"));

 //validación que solo acepta números
 $.validator.addMethod("numbersOnly", $.validator.methods.number, $.validator.format("Este campo no acepta letras"));

$.validator.addMethod("cMaxlength", $.validator.methods.maxlength,
// leverage parameter replacement for minlength, {0} gets replaced with 2
$.validator.format("Este campo no debe pasar de {0} caracteres"));
//combine them both, including the parameter for minlength
//función para validar que solo entren letras
$.validator.addMethod("lettersOnly", function(value, element) {
 return this.optional(element) || /^[a-zA-Záãâäàéêëèíîïìóõôöòúûüùçñ ]*$/.test(value)}, 
 $.validator.format("Este campo solo acepta letras y espacios"));
 //validar fechas correctas
//$.validator.addMethod("fechas", $.validator.methods.dateISO,$.validator.format("Selecciona una fecha correcta"));
 //validar que no se acepten números negativos
$.validator.addMethod("NoNegativos", $.validator.methods.min, $.validator.format("Este campo no acepta números negativos"));

//$.validator.addMethod("telefono", $.validator.methods.phoneUS, $.validator.format("Este número no es un teléfono"));

$.validator.addMethod("jerarquiaFechas", function(value,element){
   var date1 = new Date($('#fecha_desde').val());
   var date2 = new Date($('#fecha_hasta').val());

   if(date1 >= date2){
      return false;
   }
   else{
     return true;
   }
},$.validator.format("Fecha desde debe ser menor a fecha hasta"));


$.validator.addMethod("jerarquiaSalarios", function(value,element){

 var salario_minimo = $('#minimo').val();
 var salario_maximo = $('#maximo').val();

 if(salario_minimo > salario_maximo){
    return false;
 }
 else{
   return true;
 }
},$.validator.format("Salario minimo debe ser menor que el salario máximo"));


////// Validaciones //// 

$.validator.addClassRules({
  
    varchar2:{

    cRequired: true, 
    cMinlength: 2, 
    cMaxlength:2,
    lettersOnly:true
    }, 
        
    varchar10:{

      cRequired: true, 
      cMinlength: 10, 
      cMaxlength:10,
      lettersOnly:true
      }, 

    varchar50:{

      cRequired: true, 
      cMinlength: 3, 
      cMaxlength:50,
      lettersOnly:true
    }, 
    varchar70:{
      cRequired:true,
      cMinlength: 3,
      cMaxlength:70,
      lettersOnly:true
    },

    varchar100:{
      cRequired:true,
      cMinlength: 3,
      cMaxlength:70,
      lettersOnly:true
    },
    varchar150: {
      cRequired:true,
      cMinlength: 3,
      cMaxlength:70,
      lettersOnly:true
    },
     cedula:{
        cRequired:true,
        cMinlength: 11,
        cMaxlength:11,
        numbersOnly:true,
        NoNegativos: 5,
       
     },

    fecha:{
      cRequired:true
    },

    jerarquiaFechas:{
      jerarquiaFechas: true
    },

    salario:{
      cRequired:true,
      NoNegativos:1
    },

    jerarquiaSalarios:{
      jerarquiaSalarios: true
    },

    select:{
      cRequired:true
    },

    telefono:{
      cRequired:true,
      telefono: true
    }


     });

    });