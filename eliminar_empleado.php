<?php

include("db.php");

//////////////// Eliminar Registro de Empleado /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM empleado WHERE id_empleado = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query Fallo");
        }

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Eliminado Exitosamente';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: crear_empleado.php");

    }
//////////////// Fin Eliminar Registro de Empleado /////////////////////////////
?>
