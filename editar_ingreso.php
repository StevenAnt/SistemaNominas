<?php

include("db.php");

//////////////// Extraccion de Datos de Ingreso /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tipo_ingreso WHERE id_tipo_ingreso = $id";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $depende_salario = $row['depende_salario'];
            $estado = $row['estado'];            
        }
    }
//////////////// Fin Extraccion de Datos de Ingreso ////////////////////////

//////////////// Consulta para actualizar datos de Ingreso /////////////////////////////
    if (isset($_POST['actualizar_ingreso'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $depende_salario = $_POST['depende_salario'];
        $estado = $_POST['estado'];

        $query = "UPDATE tipo_ingreso SET nombre = '$nombre', depende_salario = '$depende_salario', estado = '$estado' 
        WHERE id_tipo_ingreso = $id";
        mysqli_query($conn, $query);

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Editado Exitosamente';
        $_SESSION['mensaje_color'] = 'primary';
        header("Location: crear_ingreso.php");

    }
////////////////  Fin Consulta para actualizar datos de Ingreso ///////////////////////
?>

<?php include("includes/header_task.php") ?>

<!--------------------- Formulario de Edicion --------------------------------->
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_ingreso.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre de Ingreso">
                        </div>
                            <div class="form-group">
                                    <select name="depende_salario"  value="<?php echo $depende_salario; ?>" class="btn btn-light btn-block form-control" placeholder="Depende de Salario">
                                        <option value="depende">Seleccione Salario</option>
                                        <option value="Depende">Depende</option>
                                        <option value="No Depende">No Depende</option>
                                </select>
                            </div>
                        <div class="form-group">
                                    <select name="estado"  value="<?php echo $estado; ?>" class="btn btn-light btn-block form-control" placeholder="Estado">
                                        <option value="activo">Seleccione Estado</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        <button class="btn btn-success" name="actualizar_ingreso">
                            Actualizar Empleado
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--------------------- Fin Formulario de Edicion ----------------------------->
 
<?php include("includes/footer_task.php") ?>