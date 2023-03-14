<?php
use Doctrine\Common\CommonException;
 session_start();
$id_usuario = $_SESSION['id'];
//<!-- ========== Start si existe una sesion ========== -->
?>
<!-- ========== Start top navegacion ========== -->
<?php
include_once "../../includes/conexion.php";
    if(!isset($_SESSION['correo'])){
        header("location:../../registrar.php");
    }else{
        $login=$_SESSION['correo'];
        $rango=$_SESSION['rango'];
        $_SESSION['id'];
        $id_usuario = $_SESSION['id'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../includes/logo.png">
    <title>Tienda FunkOnline</title>
</head>
<body>
<?php
//login
    if(isset($_POST['submit'])){
//creamos variables
        $email=$_POST['email'];
        $password=$_POST['password'];
//consulta
        $consulta="SELECT * FROM login WHERE correo='$email' AND password='$password'";
        $resultado=mysqli_query($conn,$consulta);

        if(mysqli_num_rows($resultado)>0){
            $filas=$resultado->fetch_array(MYSQLI_ASSOC);
            //agregamos a las variables
            $_SESSION['id']=$filas['id'];
            $_SESSION['correo']=$filas['correo'];
            $_SESSION['nombres']=$filas['nombres'];
            $_SESSION['apellidos']=$filas['apellidos'];
            $_SESSION['username']=$filas['username'];
            $_SESSION['rango']=$filas['rango'];
//swich
            switch($_SESSION['rango']){
                case 1;
                    header("location:../admin/admin.php");
                break;

                case 2;
                    header("location:../index.php");
                break;

                default;
            }
        }else{
//cerramos php para crear html
        ?>
        <h1 class="text-white bg-danger text-center m-0 pb-2">No se encontro ningun usuario</h1>
<!--continuamos con php-->
        <?php
        }
    }
?>
<!--navegacion-->
<header class="">
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-dark bg-dark navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header ps-4">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand ps-5" href="../../index.php"><strong>FunkOnline</strong></a>
                </div>
<!--links-->
                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav col-md-7 col-lg-9">
                        <l1 class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="../../tienda.php">Tienda</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="../../funkos.php">Funkos</a></l1>
                        <l1 class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="">Contactanos</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Nosotros</a></li>
                                <li><a class="dropdown-item" href="#">¿Quienes somos?</a></li>
                            </ul>
                        </l1>
<!--si es un administrador-->
<!--consulta php-->
<?php
                        if(isset($_SESSION['correo']) AND isset($login)){
                            $consulta="SELECT * FROM login WHERE correo='$login' AND rango <2";
                            $resultado=mysqli_query($conn,$consulta);
                            if(mysqli_num_rows($resultado)>0){
                                //cerramos php para crear codigo html
                                ?>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize active" href="../carrito.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    Carrito</a></l1>
                                    <l1 class="nav-item"><a class="nav-link" href="../../admin/admin.php">Administrador</a></l1>
                                <?php
                            }else{
                                //cerramos php para crear codigo html
                                ?>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize active" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    Carrito</a></l1>
                                <!--volvemos con php-->
                                <?php
                            }
                        }
                    ?>
<!--fin de administrador-->
                    </ul>
<!--login-->
<!--saber si se logeo-->
<?php
    if(!isset($_SESSION['correo'])){
//cerramos para el login
?>
                    <ul class="nav navbar-nav col-md-5 col-lg-3 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="">Login</a>
                            <ul class="dropdown-menu p-2" style="width: 235px;">
                                <form class="was-validated" method="POST">
                                    <li class="">
                                        <div class="form-floating">
                                            <input class="form-control" name="email" type="email" id="floatingInput" placeholder="name@example.com" required>
                                            <label class="ps-4" for="floatingInput">Email</label>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="form-floating">
                                            <input class="form-control" id="floatingInput" name="password" type="password" placeholder="password" required>
                                            <label class="ps-4" for="floatingInput">Contraseña</label>
                                        </div>
                                    </li>
                                    <li>
                                        <input class="btn btn-primary mt-2 ms-2" name="submit" type="submit" value="Ingresar">
                                    </li>
                                </form>
                            </ul>
                        </li>
                    </ul>
<!--continuamos con php cerrando el if anterior-->
    <?php
    }else{
//cerramos php para crear codigo html
    ?>
    <div class="col-md-5 col-lg-3 pe-3">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href=""><?php echo $_SESSION['username']?></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item">
                        <a class="text-dark text-decoration-none ps-2 pe-2" href="perfil/perfil.php">Mi Perfil</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="text-dark text-decoration-none ps-2 pe-2" href="includes/cerrar_session.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
<!--continuamos con codigo php-->
    <?php
    }
    ?>             
<!--fin de login-->
                </div>
            </div>
        </nav>
    </header>
<!--fin de navegacion-->
        <!-- ========== End top navegacion ========== -->
<?php
if(!isset($id_usuario)){
    echo "porfavor registrate";
}else{
    $estado_compra= $_GET['pago'];
//<!-- ========== Start compra exitosa ========== -->
    if(isset($estado_compra) and $estado_compra == 'good'){
        echo    '<script>
                    if (window.history.replaceState){
                        history.replaceState( null, null, window.location.href );
                    }
                </script>';
        //<!-- ========== End para que no se vuelvan a enviar los datos ========== -->
        //<!-- ========== Start sql ========== -->
            $sql= "SELECT * FROM carrito WHERE usuario = $id_usuario";
            $execute = mysqli_query($conn, $sql);
            if (mysqli_num_rows($execute) <=0){
                echo '<h1 class="bg-danger pb-2 fw-bolder text-white text-center">No tienes articulos en el Carrito</h1>';
            }else{
                //<!-- ========== Start suma total ========== -->
                $consultado="SELECT SUM(precio_total) FROM carrito WHERE usuario = $id_usuario";
                $resulta = mysqli_query($conn, $consultado);

                if(mysqli_num_rows($resulta)>0){
                    $row=$resulta->fetch_array(MYSQLI_ASSOC);
                    $precio_total_carrito=$row['SUM(precio_total)'];
                } 
                //<!-- ========== End  ========== -->
                if($execute == true){
                //<!-- ========== Start traer la ultima referencia ========== -->
                $sql_productos = "SELECT * FROM COMPRAS WHERE referencia IN (SELECT MAX(referencia) FROM compras ) ORDER BY id";
                $result_sql_productos = mysqli_query($conn,$sql_productos);


                if(mysqli_num_rows($result_sql_productos)>0){
                    $filaa=$result_sql_productos->fetch_array(MYSQLI_ASSOC);
                    //agregamos a las variables
                    $referencia_productos =$filaa['referencia'];
                    $referencia = $referencia_productos + 1;
                }
                //<!-- ========== End traer la ultima referencia ========== -->
                //<!-- ========== Start while ========== -->
                while($filas=$execute->fetch_array(MYSQLI_ASSOC)){
                    //agregamos a variables
                    $id_productos_compra = $filas['id_producto'];
                    $cantidad_compra = $filas['cantidad'];
                    $precio_productos_compra = $filas['precio_total'];
                    $precio_total = $filas['precio_total'];
                    $fecha_actual = date("Y-m-d");
                    $direccion = "";
                    $ciudad = "";
                    $telefono = "";
                //<!-- ========== End while ========== -->
                //<!-- ========== Start traer datos del producto ========== -->
                    $sql_productos = "SELECT nombre, informacion, imagen FROM productos WHERE id = $id_productos_compra";
                    $execute_sql_productos = mysqli_query($conn, $sql_productos);
                        if(mysqli_num_rows($execute_sql_productos)>0){
                            $fila=$execute_sql_productos->fetch_array(MYSQLI_ASSOC);
                            //agregamos a las variables
                            $nombre_producto =$fila['nombre'];
                            $descripcion = $fila['informacion'];
                            $imagen_producto = $fila['imagen'];
                        }
                    //<!-- ========== End traer datos del producto ========== -->
                    $sql2 = "INSERT INTO compras (referencia, nombre_producto, descripcion, cantidad, precio_unidad, precio_total, imagen, cliente, direccion, ciudad, telefono, fecha_compra) VALUES ('$referencia', '$nombre_producto', '$descripcion', '$cantidad_compra', '$precio_productos_compra', '$precio_total_carrito', '$imagen_producto', '$id_usuario', '$direccion', '$ciudad', '$telefono', '$fecha_actual')";
                    $execute2 = mysqli_query($conn, $sql2);
                };
                if ($execute2 == true){
                    echo    '<script>
                    if (window.history.replaceState){
                        history.replaceState( null, null, window.location.href );
                    }</script>';
                    //<!-- ========== Start eliminar de compras ========== -->
                    $sql_eliminar = "DELETE FROM carrito WHERE usuario = '$id_usuario'";
                    $execute_eliminar = mysqli_query($conn,$sql_eliminar);

                    if ($execute_eliminar == false){
                        echo '<div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Alert Heading</h4>
                        <p>Alert Content</p>
                        <hr>
                        <p class="mb-0">Error intente mas tarde</p>
                    </div>
                        ';
                    };
                    //<!-- ========== End eliminar de compras ========== -->
                }else{
                    echo "no se pudo agregar a las compras";
                };
                }else{
                echo "no se pudo realizar la compra";
                }

                //<!-- ========== End sql ========== -->
    ?>
    <div class="container-fluid">
        <div class="container">
            <!-- ========== Start 1 seccion ========== -->
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <img class="img-fluid" src="../../img/logo.png" alt="Logo">
                </div>
                <div class="col">
                    <h1 class="text-center fw-bold text-uppercase">!!Compra Exitosa!!</h1>
                </div>
            </div>
            <!-- ========== End 1 seccion ========== -->
            <!-- ========== Start 2 seccion ========== -->
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <img class="img-fluid mx-auto d-block" src="../../img/carita_happy.svg" alt=":)" width="400">
                </div>
                <div class="col">
                    <h3 class="text-center">su compra ha sido confirmada</h3><br>
                    <h4 class="text-center">
                        tus productos seran enviados a tu casa la direccion es: (insertar direccion) el envio se realizara el dia: (insertar dia) recuerda que te llamaremos antes para confirmar el envio 
                    </h4><br>
                    <!-- ========== Start imprimir recibo ========== -->
                    <form action="recibo.php" method="post">
                        <button class="btn btn-secondary btn-lg mx-auto d-block fw-bold text-uppercase " name="recibo" value="1" type="submit" >Imprimir Recibo</button>
                    </form>
                    <!-- ========== End imprimir recibo ========== -->
                </div>
            </div>
            <!-- ========== End 2 seccion ========== -->
            <!-- ========== Start 3 seccion productos ========== -->
            <!-- ========== Start titulo ========== -->
            <div class="row justify-content-center align-items-center g-2 mt-5">
                <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
                <div class="col-md-4" data-bs-spy="scroll" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
                    <h1 id="#loNuevo" class="text-center text-uppercase">Productos Comprados</h1>
                </div>
                <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
            </div>
            <!-- ========== End titulo ========== -->
            <!-- ========== Start SQL de los productos comprados para la card ========== -->
                <?php
                    $sql_productos = "SELECT * FROM COMPRAS WHERE referencia IN (SELECT MAX(referencia) FROM compras WHERE cliente =1 ) ORDER BY id";
                    $result_sql_productos = mysqli_query($conn,$sql_productos);


                    if(mysqli_num_rows($result_sql_productos)>0){
                        $filaa=$result_sql_productos->fetch_array(MYSQLI_ASSOC);
                        //agregamos a las variables
                        $referencia_productos =$filaa['referencia'];
                    }else{
                        $referencia = '';
                    }
                ?>
            <!-- ========== End SQL de los productos comprados para la card ========== -->
            <!--consulta para traer los productos de la base de datos-->
                <?php
                    $consulta="SELECT * FROM compras WHERE referencia = $referencia ORDER BY id DESC;";
                    $resultado=mysqli_query($conn,$consulta);
                ?>
            <!--fin consulta para traer los productos de la base de datos-->
            <!-- ========== Start card ========== -->
            <div class="container">
        <div class="row">
<!--primer foreach-->
            <?php 
                foreach($resultado as $opciones) :
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-img">
                        <img class="card-img-top img-fluid" src="../../<?php echo $opciones['imagen']?>" alt="..." width="250" height="100">
                    </div>
                    <div class="card-body">
                        <a class="text-dark text-decoration-none text-capitalize"><h5 class="card-title"><?php echo $opciones['nombre_producto']?></h5></a>
                        <p class="card-text text-capitalize"><?php echo $opciones['descripcion']?></p>
                        <h5 class="text-primary text-center">$<?php echo $opciones['precio_unidad']?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach?>
<!--fin del foreach-->
        </div>
    </div>
            <!-- ========== End card ========== -->
            <!-- ========== End 3 seccion productos ========== -->
        </div>
    </div>
    <?php
            }
        
//<!-- ========== End compra exitosa ========== -->
//<!-- ========== Start compra fallida ========== -->
    }elseif ($estado_compra=='bad'){
        ?>
        <!-- ========== Start conatiner fluid ========== -->
            <div class="container-fluid">
                <!-- ========== Start 1 container ========== -->
                <div class="container mt-5 mb-4">
                    <!-- ========== Start 1 row ========== -->
                    <div class="row justify-content-center align-items-center g-2 mt-5">
                        <div class="col ms-5">
                            <img class="img-fluid" src="../../img/logo.png" alt="logo...">
                        </div>
                        <div class="col">
                            <h1 class="text-center fw-bold text-capitalize pt-5">!!Oops Ha Ocurrido un Problema!!</h1>
                        </div>
                    </div>
                    <!-- ========== End 1 row ========== -->
                    <!-- ========== Start 2 row ========== -->
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col ms-5 justify-content-center align-items-center">
                            <img class="img-fluid mx-auto d-block" src="../../img/carita_sad.png" alt="..." width="450">
                        </div>
                        <div class="col h-100 d-inline-block">
                            <h3 class="text-xl-start fs-1 ps-4 h-100 d-inline-block text-center pb-5 mb-5">Tu compra no se ha completado correctamente, porfavor intente mas tarde nuevamente.</h3><br>
                            <a class="btn btn-secondary text-uppercase btn-lg ps-5 pe-5 pt-2 pb-2 ms-5" href="../../index.php">
                            <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/osuxyevn.json"
                                    trigger="loop"
                                    delay="3000"
                                    colors="primary:#ffffff"
                                    state="in"
                                    style="width:25px;height:25px; padding-top:4px; padding-right:3px;">
                                </lord-icon>    
                            Inicio</a>
                        </div>
                    </div>
                    <!-- ========== End 2 row ========== -->
                </div>
                <!-- ========== End 1 container ========== -->
            </div>
        <!-- ========== End conatiner fluid ========== -->
        <?php
    }
//<!-- ========== End compra fallida ========== -->
//<!-- ========== Start compra pendiente ========== -->
    else{
        ?>
        
        <!-- ========== Start titulo ========== -->
        <div class="container">
            <div class="row mx-auto mt-5 mb-4">
                <h1 class="text-center text-uppercase fw-bold">Su pedido esta cargando</h1>
            </div>
        </div>
        <!-- ========== End titulo ========== -->
        <!-- ========== Start icon ========== -->
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-2"></div>
                    <div class="col">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/akuwjdzh.json"
                            trigger="loop"
                            delay="000"
                            colors="primary:#121331"
                            state="loop"
                            style="width:280px;height:280px; justify-content:center; align-items:center;">
                        </lord-icon>
                    </div>
                    <div class="col">
                        <h1 class="text-center fw-bold">Su pedido esta cargando</h1><br>
                        <h3 class="text-center">esperando para confirmar su compra, no nos tomara mucho tiempo</h3><br>
                        <p class="text-center">(cambia el metodo Get para continuar "good" o "bad")</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== End icon ========== -->
        <?php
    }
//<!-- ========== End compra pendiente ========== -->
echo    '<script>
if (window.history.replaceState){
    history.replaceState( null, null, window.location.href );
}
</script>';
}
include "../../includes/footer.php";
//<!-- ========== End si existe una sesion ========== -->
?>