<?php 

include_once 'db.php';

//////////////// Validacion de la Cedula /////////////////////////////
    if(isset($_POST['cedulaValidar'])){
        $cedulaValidar = $_POST['cedulaValidar'];
        $cedulaCorrecta = validarCedulaCorrecta($cedulaValidar);

        try{

            $resultado = "";

    //////////////// Selecciona la Cedula de la tabla empleados /////////////////////////////
            $sql = "SELECT * FROM empleado WHERE cedula = $cedulaValidar";
            $result = mysqli_query($conn, $sql);

    //////////////// Verifica si la Cedula Existe  /////////////////////////////
            if (mysqli_num_rows($result) != 0) 
            {
                $resultado = "existe";
            }
        
        }catch (Exception $e)
        {
            $resultado = $e->getMessage();
        }
    //////////////// Valida que la Cedula digitada cumple el algoritmo /////////////////////////////
        $respuesta = array(
            'respuesta' => $cedulaCorrecta,
            'resultado' => $resultado
        );

        die(json_encode($respuesta));
        
    }

    //////////////// Funcion de Validacion de Cedula /////////////////////////////
        function validarCedulaCorrecta(&$cedulaValidar){

                $vnTotal = 0;
                settype($vnTotal, "integer");

                $cedulaValidar = trim($cedulaValidar);

                $pLongCed = strlen($cedulaValidar);
                settype($pLongCed, "integer");

                $digitoMult = array(1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1);

                if($pLongCed < 11 || $pLongCed > 11){
                    return false;
                }

                for ($vDig = 1; $vDig <= $pLongCed; $vDig++){

                    $vCalculo = substr($cedulaValidar, $vDig - 1, 1) * $digitoMult[$vDig - 1];

                    if($vCalculo < 10){
                        $vnTotal += $vCalculo;
                    }else{
                        $vnTotal += substr($vCalculo, 0, 1) + substr($vCalculo, 1, 1);
                    }

                    
                }
                $respuesta = true;

                if( ($vnTotal % 10)  == 0){
                return $respuesta;
                } else{
                    $respuesta = false;
                    return $respuesta;
                }
        }
    //////////////// Fin Funcion de Validacion de Cedula ////////////////////////
//////////////// Fin Validacion de la Cedula ////////////////////////////
?>



