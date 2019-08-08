<?php

include("db.php");

//////////////// Eliminar Registro de ingreso /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM registro_transaccion WHERE id_registro_transaccion = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query Fallo");
        }

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Eliminado Exitosamente';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: crear_transaccion.php");

    }
//////////////// Fin Eliminar Registro de ingreso ////////////////////////////
?>
