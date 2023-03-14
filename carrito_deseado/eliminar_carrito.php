<?php session_start(); 
include_once "../includes/conexion.php";
     if(!isset($_SESSION['correo'])){
        header('location:../registrar.php');
     }else{
         $login=$_SESSION['correo'];
         $rango=$_SESSION['rango'];
         $id_producto = $_GET['id'];
         $id_usuario = $_SESSION['id'];

         $eliminar = "DELETE FROM  carrito WHERE id_producto = $id_producto AND usuario ='$id_usuario'";
         $ejecutar= mysqli_query($conn, $eliminar);

         if ($ejecutar = true){
            header('location:carrito.php');
         }else{
            ?>
            <div class="row">
                <h2 class="bg-danger text-white text-center pb-2">No se ha encontrado el id del producto: <?php echo $id_producto?></h2><br>
                <a class="btn btn-primary text-decoration-none p-2 text-uppercase" href="../index.php">Vuelve al inicio</a>
            </div>
            <?php            
         }
     }
     
     
?>