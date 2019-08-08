<?php

include("db.php");

//////////////// Insertar Registro de Empleado /////////////////////////////
    if (isset($_POST['guardar_empleado'])) {
        
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre_empleado'];
        $departamento = $_POST['departamento'];
        $puesto = $_POST['puesto'];
        $salario_mensual = $_POST['salario_mensual'];
        $id_nomina = $_POST['id_nomina'];

    //////////////// Insertar datos con proteccion de INYECCION SQL /////////////////////////////    
    //////////////// Prepara la insercion de forma segura /////////////////////////////

        $stmt = mysqli_prepare($conn, "INSERT INTO empleado(cedula, nombre_empleado, departamento, puesto, salario_mensual, id_nomina) VALUES 
        (?, ?, ?,?,?,?)");

        mysqli_stmt_bind_param($stmt, "ssssdi", $cedula, $nombre, $departamento, $puesto, $salario_mensual, $id_nomina);
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
    
//////////////// Fin Insertar Registro de Empleado /////////////////////////////
?>