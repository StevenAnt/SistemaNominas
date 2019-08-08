<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEMA DE NOMINAS</title>

    <!--------------------------------- Bootstrap 4 ------------------------------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!------------------------------- Bootstrap select ---------------------------------------------------->
    <link href="css/bootstrap-select.min.css"></link>
    <link href="css/select2.min.css">

    <!----------------------------- JQuery validation ----------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-colvis-1.5.6/b-html5-1.5.6/datatables.min.css"/>  
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="principal.php" class="navbar-brand mx-auto" >Sistema de Nóminas</a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
          <a class="nav-link" href="crear_empleado.php">Empleados <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="crear_ingreso">Tipos de Ingresos <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="crear_deduccion">Tipos de Deducciones <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="crear_transaccion">Registro de Transacciones <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="crear_asiento">Asientos Contables <span class="sr-only">(current)</span></a>
        </li>
    </ul>
  </div>
</nav>
