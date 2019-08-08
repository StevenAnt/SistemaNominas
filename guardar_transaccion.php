<?php

include("db.php");

//////////////// Insertar Registro de Transaccion /////////////////////////////
    if (isset($_POST['guardar_transaccion'])) {
        
        $id_empleado = $_POST['empleado1'];
        $id_deduccion = $_POST['deduccion1'];
        $tipo_transaccion = $_POST['tipo_transaccion'];
        $monto = $_POST['monto'];
        $estado = $_POST['estado'];
        
    //////////////// Insertar datos con proteccion de INYECCION SQL /////////////////////////////    
    //////////////// Prepara la insercion de forma segura //////////////////////////////////////
        $stmt = mysqli_prepare($conn, "INSERT INTO registro_transaccion(id_empleado, id_tipo_deduccion, tipo_transaccion, monto, estado) 
        VALUES (?,?,?,?,?)");

        mysqli_stmt_bind_param($stmt, "sssds", $id_empleado, $id_deduccion, $tipo_transaccion, $monto, $estado);
        mysqli_stmt_execute($stmt);

    //////////////// Mensaje de Edicion F5 para visualizar datos (BUG) /////////////////////////////  
        $id_insertado = mysqli_stmt_insert_id($stmt);
            if(mysqli_stmt_affected_rows($stmt)){
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_insertado' => $id_insertado
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }

            mysqli_stmt_close();
            mysqli_close();

            die(json_encode($respuesta));
    
    }
//////////////// Insertar Registro de Transaccion /////////////////////////////
?>