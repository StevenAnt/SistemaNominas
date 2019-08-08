<?php

 include("db.php");

//////////////// Extraccion de Datos de Transaccion /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM registro_transaccion WHERE id_registro_transaccion = $id";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $tipo_transaccion = $row['tipo_transaccion'];
            $monto = $row['monto'];
            $estado = $row['estado'];            
        }
    }
//////////////// Fin Extraccion de Datos de Transaccion ////////////////////////

//////////////// Consulta para actualizar datos de Transaccion /////////////////////////////
    if (isset($_POST['actualizar_transaccion'])) {
        $id = $_GET['id'];
        $tipo_transaccion = $_POST['tipo_transaccion'];
        $monto = $_POST['monto'];
        $estado = $_POST['estado'];

        $query = "UPDATE registro_transaccion SET tipo_transaccion = '$tipo_transaccion', 
        monto = '$monto', estado = '$estado'
        WHERE id_registro_transaccion = $id";
        mysqli_query($conn, $query);

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Editado Exitosamente';
        $_SESSION['mensaje_color'] = 'primary';
        header("Location: crear_transaccion.php");
    }
//////////////// Fin Consulta para actualizar datos de Transaccion ////////////////////////
?>

<?php include("includes/header_task.php") ?>

<!--------------------- Formulario de Edicion --------------------------------->
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_transaccion.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <select class="btn btn-light btn-block" id='combo1' name='combo1'>
                            <option value='1'>Selecciona Empleado</option>
                            <option value='2'>Empleado 1</option>
                            <option value='2'>Empleado 2</option>
                        </select>
                        <br>
                        <select class="btn btn-light btn-block" id='combo1' name='combo1'>
                            <option value='1'>Selecciona Deducción</option>
                            <option value='2'>Empleado 1</option>
                            <option value='2'>Empleado 2</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <input type="text" name="tipo_transaccion" value="<?php echo $tipo_transaccion; ?>" class="form-control" placeholder="Tipo de Transacción">
                        </div>
                        <div class="form-group">
                            <input type="text" name="monto" value="<?php echo $monto; ?>" class="form-control" placeholder="Monto">
                        </div>
                        <div class="form-group">
                                    <select name="estado"  value="<?php echo $estado; ?>" class="btn btn-light btn-block form-control" placeholder="Estado">
                                        <option value="activo">Seleccione Estado</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        <button class="btn btn-success" name="actualizar_transaccion">
                            Actualizar Transacción
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--------------------- Fin Formulario de Edicion --------------------------------->
 
<?php include("includes/footer_task.php") ?>