<?php

include("db.php");

//////////////// Insertar Registro Deduccion /////////////////////////////
    if (isset($_POST['guardar_deduccion'])) {
        
        $nombre_deduccion = $_POST['nombre_deduccion'];
        $depende_salario = $_POST['depende_salario'];
        $estado = $_POST['estado'];

    //////////////// Insertar datos con proteccion de INYECCION SQL /////////////////////////////    
    //////////////// Prepara la insercion de forma segura /////////////////////////////
    
        $stmt = mysqli_prepare($conn, "INSERT INTO tipo_deduccion(nombre_deduccion, depende_salario, estado) VALUES 
        (?,?,?)");
        mysqli_stmt_bind_param($stmt, "sss", $nombre_deduccion, $depende_salario, $estado);
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
//////////////// Fin Insertar Registro Deduccion ////////////////////////
?>