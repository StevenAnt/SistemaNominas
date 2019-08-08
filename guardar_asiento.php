<?php

include("db.php");

//////////////// Insertar Registro de asiento /////////////////////////////
    if (isset($_POST['guardar_asiento'])) {
        
        $descripcion = $_POST['descripcion'];
        $cuenta = $_POST['cuenta'];
        $tipo_movimiento = $_POST['tipo_movimiento'];
        $monto_asiento = $_POST['monto_asiento'];
        $estado = $_POST['estado'];

        $query = "INSERT INTO asiento_contable(descripcion, cuenta, tipo_movimiento, monto_asiento, estado) 
        VALUES ('$descripcion', '$cuenta', '$tipo_movimiento', '$monto_asiento', '$estado')";

        $resultado = mysqli_query ($conn, $query);

        if (!$resultado) {
            die("Query failed");
        }

//////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Creado Exitosamente';
        $_SESSION['mensaje_color'] = 'success';
        header("Location: crear_asiento.php");
    }
?>