<?php

include("db.php");

//////////////// Eliminar Registro de Asiento /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM asiento_contable WHERE id_asiento_contable = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query Fallo");
        }

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Eliminado Exitosamente';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: crear_asiento.php");
    }
//////////////// Fin Eliminar Registro de Asiento ////////////////////////
?>
