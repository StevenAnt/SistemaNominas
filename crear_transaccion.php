<?php include("db.php") ?>

<?php include("includes/header_task.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-3">

<!--------------------------- Mensajes de Alerta del Formulario ----------------------------------------->
            <?php if(isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?= $_SESSION['mensaje_color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje'] ?>   
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); } ?>
<!--------------------------------------- Fin Mensajes -------------------------------------------------->


<!---------------------------- Formulario crear Transaccion --------------------------------------------->
            <div class="card card-body">
                <form id="IDform" action="guardar_transaccion.php" method="POST">
                    <select class="btn btn-light btn-block" id='combo1' name='empleado1'>

    <!-------------------- Boton Dropdownlist Seleccion de Empleados ---------------------------------------->

                        <option>Selecciona Empleado</option>
        
                        <?php 
                        /////////////////// Consulta a Base de Datos ///////////////////////
                        $query = "SELECT * FROM empleado";
                        $resultado_empleado = mysqli_query($conn, $query);
                        
                        while ($row = mysqli_fetch_assoc($resultado_empleado)) { ?>
                        
                        <option value='<?php echo $row['id_empleado']  ?>'>
                        <?php echo $row['nombre_empleado']  ?>
                        </option>
                         
                        <?php } ?>
                               
                    </select>
    <!------------------------------- Fin Boton Dropdownlist  ----------------------------------------------->
        

    <!-------------------- Boton Dropdownlist Seleccion Deduccion -------------------------------------------->
                    <select class="btn btn-light btn-block" id='combo1' name='deduccion1'>
         
                        <option>Selecciona Deducción</option>
                        <?php 
                        /////////////////// Consulta a Base de Datos ///////////////////////
                        $query = "SELECT * FROM tipo_deduccion";
                        $resultado_deduccion = mysqli_query($conn, $query);
                        
                        while ($row = mysqli_fetch_assoc($resultado_deduccion)) { ?>
                        
                        <option value='<?php echo $row['id_tipo_deduccion']  ?>'>
                        <?php echo $row['nombre_deduccion']  ?>
                        </option>

                        <?php } ?>
                    </select>
    <!------------------------------- Fin Boton Dropdownlist  ------------------------------------------------>
                    <br>
                    <div class="form-group">
                        <input type="text" name="tipo_transaccion" class="form-control varchar50" placeholder="Tipo de Transacción" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="monto" class="form-control salario" placeholder="Monto de Transacción">
                    </div>
                    <div class="form-group">
                        <select name="estado" class="btn btn-light form-control">
                            <option value="activo">Seleccione Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_transaccion" value="Guardar Transacción">
                </form>
            </div>
        </div>
<!---------------------------- Fin Formulario crear Transaccion------------------------------------------> 


<!---------------------------- Tabla Detalle del Asiento ---------------------------------------------->
        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Empleado</th>
                        <th>Deducción</th>
                        <th>Transacción</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
        
<!---------------------------- Tabla Detalle del Asiento ---------------------------------------------->                   
                    <?php  
 //////////// Extraccion de registros e insercion en la tabla con INNER JOIN /////////////////
                    $query = "SELECT id_registro_transaccion, nombre_empleado, nombre_deduccion, tipo_transaccion, monto,fecha, registro_transaccion.estado
                     FROM registro_transaccion inner join empleado on registro_transaccion.id_empleado = empleado.id_empleado
                     inner join tipo_deduccion on registro_transaccion.id_tipo_deduccion = tipo_deduccion.id_tipo_deduccion 
                     order by  id_registro_transaccion";
                    $resultado_transaccion = mysqli_query($conn, $query);
                
                    while ($row = mysqli_fetch_assoc($resultado_transaccion)) { 
                    ?>
                        <tr>
                            <!-- <td><?php echo $row['id_registro_transaccion'] ?></td> -->
                            <td><?php echo $row['nombre_empleado'] ?></td>
                            <td><?php echo $row['nombre_deduccion'] ?></td>
                            <td><?php echo $row['tipo_transaccion'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['monto'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td>
                                <a href="editar_transaccion.php?id=<?php echo $row['id_registro_transaccion'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                                </a>

                                <a href="eliminar_transaccion.php?id=<?php echo $row['id_registro_transaccion'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
/////////////////// Fin Extraccion de registros e insercion en la tabla con INNER JOIN /////////////////////////
                    } ?>
                </tbody>
            </table>  
        </div>
   </div>
</div>

<?php include("includes/footer_task.php") ?>
    