<?php

include("db.php");

//////////////// Eliminar Registro Deduccion /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tipo_deduccion WHERE id_tipo_deduccion = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query Fallo");
        }

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Eliminado Exitosamente';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: crear_deduccion.php");
    }
//////////////// Fin Eliminar Registro Deduccion ////////////////////////////
?>
