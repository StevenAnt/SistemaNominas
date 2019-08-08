<?php

include("db.php");

//////////////// Extraccion de Datos de Asiento Contable /////////////////////////////
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM asiento_contable WHERE id_asiento_contable = $id";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $descripcion = $row['descripcion'];
            $cuenta = $row['cuenta'];
            $tipo_movimiento = $row['tipo_movimiento'];    
            $monto_asiento = $row['monto_asiento']; 
            $estado = $row['estado'];         
        }
    }
//////////////// Fin Extraccion de Datos de Asiento Contable ////////////////////////


/////////////// Consulta para actualizar datos del asiento /////////////////////////////
    if (isset($_POST['actualizar_asiento'])) {
        //$id = $_GET['id'];
        $descripcion = $_POST['descripcion'];
        $cuenta = $_POST['cuenta'];
        $tipo_movimiento = $_POST['tipo_movimiento'];
        $monto_asiento = $_POST['monto_asiento'];
        $estado = $_POST['estado'];

        $query = "UPDATE asiento_contable SET descripcion = '$descripcion', cuenta = '$cuenta', 
        tipo_movimiento = '$tipo_movimiento', monto_asiento = '$monto_asiento', estado = $estado
        WHERE id_asiento_contable = $id";
        mysqli_query($conn, $query);

    //////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Editado Exitosamente';
        $_SESSION['mensaje_color'] = 'primary';
        header("Location: crear_asiento.php");

    }
/////////////// Fin Consulta para actualizar datos del asiento ////////////////////////
?>

<?php include("includes/header_task.php") ?>

<!--------------------- Formulario de Edicion --------------------------------->
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_asiento.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <select class="btn btn-light btn-block" id='combo1' name='combo1'>
                            <option value='1'>Selecciona Empleado</option>
                            <option value='2'>Empleado 1</option>
                            <option value='2'>Empleado 2</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" placeholder="Descripción">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cuenta" value="<?php echo $cuenta; ?>" class="form-control" placeholder="Cuenta">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tipo_movimiento" value="<?php echo $tipo_movimiento; ?>" class="form-control" placeholder="Tipo de Movimiento">
                        </div>
                        <div class="form-group">
                            <input type="text" name="monto_asiento" value="<?php echo $monto_asiento; ?>" class="form-control" placeholder="Monto">
                        </div>
                        <div class="form-group">
                                <label for="nombre">Estado</label>
                                    <select name="estado"  value="<?php echo $estado; ?>" class="btn btn-light form-control" placeholder="Estado">
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        <button class="btn btn-success" name="actualizar_asiento">
                            Actualizar Asiento Contable
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--------------------- Fin Formulario de Edicion ----------------------------->

<?php include("includes/footer_task.php") ?>