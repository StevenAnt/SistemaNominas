<?php include("db.php") ?>

<?php include("includes/header_task.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

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


<!---------------------------- Formulario crear Ingreso ------------------------------------------------>
            <div class="card card-body">
                <form id="IDform" action="guardar_ingreso.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control varchar50" placeholder="Nombre de Ingreso" autofocus>
                    </div>
                    <div class="form-group">
                        <select name="depende_salario" class="btn btn-light btn-block form-control">
                            <option value="activo">Seleccione Salario</option>
                            <option value="Depende">Depende</option>
                            <option value="No Depende">No Depende</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="estado" class="btn btn-light btn-block form-control">
                            <option value="activo" >Seleccione Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_ingreso" value="Guardar Ingreso">
                </form>
            </div>
        </div>
<!---------------------------- Fin Formulario crear Empleado-------------------------------------------->
        

<!---------------------------- Tabla Detalle de Ingreso ------------------------------------------------->
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Nombre</th>
                        <th>Depende de Salario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!---------------------------- Fin Tabla Detalle de Ingreso --------------------------------------------->
                    <?php  
///////////////////// Extraccion de registros e insercion en la tabla ///////////////////////////
                    $query = "SELECT * FROM tipo_ingreso";
                    $resultado_ingreso = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($resultado_ingreso)) { ?>
                        <tr>
                            <!-- <td><?php echo $row['id_tipo_ingreso'] ?></td> -->
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['depende_salario'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td>
                                <a href="editar_ingreso.php?id=<?php echo $row['id_tipo_ingreso'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                                </a>

                                <a href="eliminar_ingreso.php?id=<?php echo $row['id_tipo_ingreso'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
///////////////////// Extraccion de registros e insercion en la tabla //////////////////////////
                    } ?>
                </tbody>
            </table>  
        </div>
   </div>
</div>

<?php include("includes/footer_task.php") ?>
    