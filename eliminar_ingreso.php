<?php

include("db.php");

//////////////// Eliminar Registro de ingreso /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tipo_ingreso WHERE id_tipo_ingreso = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query Fallo");
        }

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Eliminado Exitosamente';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: crear_ingreso.php");
    }
//////////////// Fin Eliminar Registro de ingreso /////////////////////////////
?>
