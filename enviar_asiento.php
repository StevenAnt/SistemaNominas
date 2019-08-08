<?php include("db.php");

//////////////// Consulta para llenar el Array ////////////////////////////
    if (isset($_POST['enviar_asiento'])) {

    $sql="SELECT * FROM asiento_contable";
    $resultado = mysqli_query($conn, $sql);
   // $url = 'https://sistemacontabilidadintegraciones.azurewebsites.net/api/asientocontable';

    //create a new cURL resource
    //$ch = curl_init($url);

        while($row = mysqli_fetch_assoc($resultado))
        {
            $id = $row['id_asiento_contable'];
            $descripcion = $row['descripcion'];
            $movimiento = $row['tipo_movimiento'];
            $monto = $row['monto_asiento'];

            $jsonarray[] = array(
                "Asientos" => array(
                'id' => $id, 
                'Descripcion' => $descripcion,
                'Tipo de Movimiento' => $movimiento,
                'Monto' => $monto,
                ),
                'Descripcion' => "Asiento de Nominas correspondiente al periodo 2019-10-01",
                'Auxiliar' => 2
            );
            
        }
//////////////// Fin Consulta para llenar el Array /////////////////////// 


        // $payload = json_encode(array("user" => $jsonarray));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($ch);
        // curl_close($ch);

//////////////// Convertir Array en Json /////////////////////////////
        echo json_encode($jsonarray, JSON_UNESCAPED_SLASHES);


////////////// Mensaje de Edicion  /////////////////////////////
        $_SESSION['mensaje'] = 'Asiento Enviado Exitosamente';
        $_SESSION['mensaje_color'] = 'success';
        header("Location: crear_asiento.php");
    }
?>

<?php include_once "includes/footer_task.php" ?>