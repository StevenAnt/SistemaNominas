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


<!---------------------------- Formulario crear Empleado ------------------------------------------------>
            <div class="card card-body">
                <form id="IDform" action="guardar_empleado.php" method="POST">

                    <div class="form-group">
                        <input type="text" id="cedula" name="cedula" class="form-control cedula"  placeholder="Cedula" autofocus >
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre_empleado" class="form-control varchar50" placeholder="Nombre" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="departamento" class="form-control varchar50" placeholder="Departamento" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="puesto" class="form-control varchar50" placeholder="Puesto" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="salario_mensual" class="form-control salario" placeholder="Salario" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="id_nomina" class="form-control salario" placeholder="Codigo de Nómina" >
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_empleado" value="Guardar Empleado">
                </form>
            </div>
        </div>
<!---------------------------- Fin Formulario crear Empleado--------------------------------------------->
        
        
<!---------------------------- Tabla Detalle de Deduccion ------------------------------------------------->
        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Nómina</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<!---------------------------- Fin Tabla Detalle de Deduccion --------------------------------------------->
                     <?php  
///////////////////// Extraccion de registros e insercion en la tabla //////////////////////////
                    $query = "SELECT * FROM empleado";
                    $resultado_empleados = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($resultado_empleados)) { ?>
                        <tr>
                            <!-- <td><?php echo $row['id_empleado'] ?></td> -->
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['nombre_empleado'] ?></td>
                            <td><?php echo $row['departamento'] ?></td>
                            <td><?php echo $row['puesto'] ?></td>
                            <td><?php echo $row['salario_mensual'] ?></td>
                            <td><?php echo $row['id_nomina'] ?></td>
                            <td>
                                <a href="editar_empleado.php?id=<?php echo $row['id_empleado'] ?>" class="btn btn-info">
                                <i class="far fa-edit"></i>
                                </a>

                                <a href="eliminar_empleado.php?id=<?php echo $row['id_empleado'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
///////////////////// Extraccion de registros e insercion en la tabla /////////////////////////
                    } ?>
                </tbody>
            </table>  
        </div>
   </div>
</div>

<?php include_once "includes/footer_task.php" ?>
    