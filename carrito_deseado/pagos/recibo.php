<?php require('../../fpdf/fpdf.php');
 session_start();
$id_usuario = $_SESSION['id'];
//<!-- ========== Start incluimos la conexion ========== -->
include_once "../../includes/conexion.php";
//<!-- ========== End incluimos la conexion ========== -->
//<!-- ========== Start si existe una cuenta ========== -->
if(!isset($_SESSION['correo'])){
    header("location:../../registrar.php");
}else{
    $login=$_SESSION['correo'];
    $rango=$_SESSION['rango'];
    $_SESSION['id'];
    $id_usuario = $_SESSION['id'];
}
//<!-- ========== End si existe una cuenta ========== -->
//<!-- ========== Start saber que referencia es ========== -->
    $sql= "SELECT referencia FROM compras WHERE cliente = $id_usuario ORDER BY id DESC";
    $execute = mysqli_query($conn, $sql);
    if(mysqli_num_rows($execute)>0){
        $filaa=$execute->fetch_array(MYSQLI_ASSOC);
        //agregamos a las variables
        $referencia_compra =$filaa['referencia'];
    }
//<!-- ========== End saber que referencia es ========== -->
//<!-- ========== Start saber informacion del cliente ========== -->
    $sqlCliente = "SELECT * FROM login WHERE id = $id_usuario";
    $execute_Cliente = mysqli_query($conn, $sqlCliente);
    if(mysqli_num_rows($execute_Cliente)>0){
        $filas=$execute_Cliente->fetch_array(MYSQLI_ASSOC);
        //agregamos a las variables
        $correo_cliente =$filas['correo'];
        $nombres_cliente =$filas['nombres'];
        $apellidos_cliente =$filas['apellidos'];
        $username_cliente=$filas['username'];
        $direccion_cliente=$filas['direccion'];
        $barrio_cliente=$filas['barrio'];
        $telefono_cliente=$filas['telefono'];
    }
//<!-- ========== End saber informacion del cliente ========== -->
//<!-- ========== Start saber informacion de la compra ========== -->
    $sqlCompra = "SELECT * FROM compras WHERE referencia = '$referencia_compra'";
    $execute_compra = mysqli_query($conn,$sqlCompra);
    if(mysqli_num_rows($execute_compra)>0){
        $fila=$execute_compra->fetch_array(MYSQLI_ASSOC);
        //agregamos variables
        $nombre_productos = $fila['nombre_producto'];
        $descripcion_compra = $fila['descripcion'];
        $cantidad_compra = $fila['cantidad'];
        $precion_compra = $fila['precio_unidad'];
        $precio_total_compra = $fila['precio_total'] + 25.000;
        $fecha_compra = $fila['fecha_compra'];
    }
//<!-- ========== End saber informacion de la compra ========== -->
//<!-- ========== Start saber el numero de resultados ========== -->
    $sql_num_resultado="SELECT count(*) AS id_producto FROM carrito WHERE usuario = $id_usuario;";
    $execute_num_resultado = mysqli_query($conn,$sql_num_resultado);
    if(mysqli_num_rows($execute_num_resultado)>0){
        $num_resultado = $execute_num_resultado->fetch_array(MYSQLI_ASSOC);
        $num_resultado = $num_resultado['id_producto'];
    }
//<!-- ========== End saber el numero de resultados ========== -->


    $pdf = new FPDF();
    $pdf->AddPage();
    // 1fontfamily 2 'B'=bold/'I'=italic/'U'=underline ''=normalText 3 FONT SIZE
    $pdf->SetFont('arial','','34');
    // 1IMAGEN 2MOVIMIENTO Width 3 movimiento height 4 width 5 height
    $pdf->Image('../../img/logo.png', 10,10,80,30);
    // 1width 2height 3'TEXT' 4border 5new line(ocupa toda la linea) 6'TEXT ALING'->C=center
    $pdf->Cell(90, 20, '',0,0,'C');
    //factura
    $pdf->Cell(90, 20, 'FACTURA',0,1,'C');
    $pdf->Cell(90, 20, '',0,1,'C');
    //detalles del cliente
    $pdf->SetFont('arial','B','20');
    $pdf->Cell(80, 15, 'Detalles del Cliente',0,1,'C');
    $pdf->SetFont('arial','','16');
    $pdf->Cell(27, 10, 'Nombres: ',0,0,'');
    $pdf->Cell(70, 10, $nombres_cliente, 0,0,'');
    $pdf->Cell(50, 10, 'Fecha de compra: ', 0,0,'C');
    $pdf->Cell(40, 10, $fecha_compra, 0,1,'');
    $pdf->Cell(27, 10, 'Apellidos: ',0,0,'');
    $pdf->Cell(70, 10, $apellidos_cliente, 0,0,'');
    $pdf->Cell(50, 10, 'Referencia de compra: ', 0,0,'C');
    $pdf->Cell(30, 10, $referencia_compra, 0,1,'C');
    $pdf->Cell(27, 10, 'telefono: ',0,0,'');
    $pdf->Cell(70, 10, $telefono_cliente, 0,1,'');
    //detalles del envio
    $pdf->SetFont('arial','B','20');
    $pdf->Cell(80, 15, 'Detalles del Envio',0,1,'C');
    $pdf->SetFont('arial','','16');
    $pdf->Cell(27, 10, 'direccion: ',0,0,'');
    $pdf->Cell(90, 10, $direccion_cliente, 0,1,'');
    $pdf->Cell(27, 10, 'Barrio: ',0,0,'');
    $pdf->Cell(90, 10, $barrio_cliente, 0,1,'');
    //detalles de la compra
    $pdf->Cell(90, 5, '',0,1,'C');
    $pdf->SetFont('arial','B','20');
    $pdf->Cell(80, 15, 'Detalles de la Compra',0,1,'C');
    $pdf->SetFont('arial','','16');
    $pdf->Cell(90,10, 'Nombre', 1,0,'C');
    $pdf->Cell(40,10, 'cantidad', 1,0,'C');
    $pdf->Cell(50,10, 'Precio Unidad', 1,1,'C');
    foreach ($execute_compra as $productos) {
        $pdf->Cell(90,10, $productos['nombre_producto'], 1,0,'');
        $pdf->Cell(40,10, $productos['cantidad'], 1,0,'C');
        $pdf->Cell(50,10, $productos['precio_unidad'], 1,1,'C');
    }
    $pdf->Cell(50,3, '', 0,1,'C');
    $pdf->Cell(130,10, 'Precio envio', 1,0,'C');
    $pdf->Cell(50,10, '25.000', 1,1,'C');
    $pdf->Cell(130,10, 'Precio Total:', 1,0,'C');
    $pdf->Cell(50,10,$precio_total_compra. ".000" , 1,1,'C');
    $pdf->Output();

?>