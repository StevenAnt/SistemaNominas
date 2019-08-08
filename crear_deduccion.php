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



<!---------------------------- Formulario crear Deduccion ------------------------------------------------>
            <div class="card card-body">
                <form id="IDform" action="guardar_deduccion.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre_deduccion" class="form-control varchar50" placeholder="Nombre" autofocus>
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
                            <option value="activo">Seleccione Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_deduccion" value="Guardar Deducción">
                </form>
            </div>
        </div>
<!---------------------------- Fin Formulario crear Deduccion -------------------------------------------->
        
        
<!---------------------------- Tabla Detalle de Deduccion ------------------------------------------------->
        <div class="col-md-9">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Nombre</th>
                        <th>Depende Salario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!---------------------------- Fin Tabla Detalle Deduccion-- ---------------------------------------------->  
                    <?php  
///////////////////// Extraccion de registros e insercion en la tabla //////////////////////////
                    $query = "SELECT * FROM tipo_deduccion";
                    $resultado_deduccion = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($resultado_deduccion)) { ?>
                        <tr>
                            <!-- <td><?php echo $row['id_tipo_deduccion'] ?></td> -->
                            <td><?php echo $row['nombre_deduccion'] ?></td>
                            <td><?php echo $row['depende_salario'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td>
                                <a href="editar_deduccion.php?id=<?php echo $row['id_tipo_deduccion'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                                </a>

                                <a href="eliminar_deduccion.php?id=<?php echo $row['id_tipo_deduccion'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
/////////////////// Extraccion de registros e insercion en la tabla ////////////////////////////
                    } ?>
                </tbody>
            </table>  
        </div>
   </div>
</div>

<?php include("includes/footer_task.php") ?>
    