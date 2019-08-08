<?php

include("db.php");

//////////////// Extraccion de Datos de Empleado /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM empleado WHERE id_empleado = $id";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $cedula = $row['cedula'];
            $nombre = $row['nombre_empleado'];
            $departamento = $row['departamento'];
            $puesto = $row['puesto'];
            $salario_mensual = $row['salario_mensual'];
            $id_nomina = $row['id_nomina']; 
        }
    }
//////////////// Fin Extraccion de Datos de Empleado ////////////////////////////

//////////////// Consulta para actualizar datos de Empleado /////////////////////////////
    if (isset($_POST['actualizar_empleado'])) {
        $id = $_GET['id'];
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre_empleado'];
        $departamento = $_POST['departamento'];
        $puesto = $_POST['puesto'];
        $salario_mensual = $_POST['salario_mensual'];
        //$id_nomina = $_POST['id_nomina'];

        $query = "UPDATE empleado SET cedula = '$cedula', nombre_empleado = '$nombre', departamento = '$departamento', 
        puesto = '$puesto', salario_mensual = '$salario_mensual' /*id_nomina = '$id_nomina'*/ WHERE id_empleado = $id";
        mysqli_query($conn, $query);

        //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Editado Exitosamente';
        $_SESSION['mensaje_color'] = 'primary';
        header("Location: crear_empleado.php");
    }
//////////////// Fin Consulta para actualizar datos de Empleado ////////////////////////
?>

<?php include("includes/header_task.php") ?>

<!--------------------- Formulario de Edicion --------------------------------->
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_empleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="cedula" value="<?php echo $cedula; ?>" class="form-control" placeholder="Cédula">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre_empleado" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="departamento" value="<?php echo $departamento; ?>" class="form-control" placeholder="Departamento">
                        </div>
                        <div class="form-group">
                            <input type="text" name="puesto" value="<?php echo $puesto; ?>" class="form-control" placeholder="Puesto">
                        </div>
                        <div class="form-group">
                            <input type="text" name="salario_mensual" value="<?php echo $salario_mensual; ?>" class="form-control" placeholder="Salario">
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" name="id_nomina" value="<?php echo $id_nomina; ?>" class="form-control" placeholder="Nómina">
                        </div> -->
                        <button class="btn btn-success" name="actualizar_empleado">
                            Actualizar Empleado
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--------------------- Fin Formulario de Edicion --------------------------------->
 
<?php include("includes/footer_task.php") ?>