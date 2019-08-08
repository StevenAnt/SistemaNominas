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


                

<!---------------------------- Formulario crear Asiento ------------------------------------------------>
            <div class="card card-body">
                <form id="IDform" action="guardar_asiento.php" method="POST">
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
                        
        <!------------------------------- Fin Boton Dropdownlist  ------------------------------------------------>
                    </select>
                    <br>
                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control varchar50" placeholder="Descripción" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cuenta" class="form-control select" placeholder="No. de Cuenta">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tipo_movimiento" class="form-control varchar2" placeholder="Tipo de Movimiento">
                    </div>
                    <div class="form-group">
                        <input type="text" name="monto_asiento" class="form-control salario" placeholder="Monto">
                    </div>
                    
                    <div class="form-group">
                        <select name="estado" class="btn btn-light form-control">
                            <option value="activo">Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_asiento" value="Guardar Transacción">
                </form>
            </div>
        </div>
        <div class="col-md-9">
<!---------------------------- Fin Formulario crear Asiento --------------------------------------------> 


<!---------------------------- Tabla Detalle del Asiento ------------------------------------------------->
        <form action="enviar_asiento.php" method="POST">
        <input type="submit" name="enviar_asiento" class="btn btn-outline-info btn-sm float-left" value ="Enviar Asiento">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- <th>ID</th>
                        <th>Empleado</th> -->
                        <th>Descripción</th>
                        <th>Cuenta</th>
                        <th>Movimiento</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!---------------------------- Fin Tabla Detalle del Asiento --------------------------------------------->                   
                
                    <?php  
/////////////////// Extraccion de registros e insercion en la tabla /////////////////////////////
                    $query = "SELECT * FROM asiento_contable";
                    $resultado_asiento = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($resultado_asiento)) { ?>
                        <tr>
                            <!-- <td><?php echo $row['id_asiento_contable'] ?></td>
                            <td><?php echo $row['id_empleado'] ?></td> -->
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['cuenta'] ?></td>
                            <td><?php echo $row['tipo_movimiento'] ?></td>
                            <td><?php echo $row['fecha_asiento'] ?></td>
                            <td><?php echo $row['monto_asiento'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td>
                                <a href="editar_asiento.php?id=<?php echo $row['id_asiento_contable'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                                </a>
                                
                                <a href="eliminar_asiento.php?id=<?php echo $row['id_asiento_contable'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        
                    <?php 
/////////////////// Fin Extraccion de registros e insercion en la tabla /////////////////////////
                    } ?>
                </tbody>
            </table>  
        </div>
   </div>
</div>

<?php include("includes/footer_task.php") ?>
    