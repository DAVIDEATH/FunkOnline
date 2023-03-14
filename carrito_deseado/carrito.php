<?php session_start(); 
include_once "../includes/conexion.php";
    if(!isset($_SESSION['correo'])){
        header("location:../registrar.php");
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

                    <a class="navbar-brand ps-5" href="../index.php"><strong>FunkOnline</strong></a>
                </div>
<!--links-->
                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav col-md-7 col-lg-9">
                        <l1 class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="../tienda.php">Tienda</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="../funkos.php">Funkos</a></l1>
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
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="deseado.php">
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
                                    <l1 class="nav-item"><a class="nav-link" href="../admin/admin.php">Administrador</a></l1>
                                <?php
                            }else{
                                //cerramos php para crear codigo html
                                ?>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="deseado.php">
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
                        <a class="text-dark text-decoration-none ps-2 pe-2" href="../perfil/perfil.php">Mi Perfil</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="text-dark text-decoration-none ps-2 pe-2" href="../includes/cerrar_session.php">Cerrar Sesion</a>
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
<!--menu-->
<!--precio total-->
<?php 
        $consultado="SELECT SUM(precio_total) FROM carrito WHERE usuario = $id_usuario";
        $resulta = mysqli_query($conn, $consultado);

        if(mysqli_num_rows($resulta)>0){
            $row=$resulta->fetch_array(MYSQLI_ASSOC);
            $precio_total_carrito=$row['SUM(precio_total)'];
        }
    ?>
<!--fin del precio total-->
<!--consulta para traer datos-->
    <?php
        $consulta = "SELECT * FROM carrito INNER JOIN productos WHERE carrito.usuario = $id_usuario AND productos.id = carrito.id_producto ORDER BY carrito.id DESC";
        $resultado = mysqli_query($conn, $consulta);

        if(mysqli_num_rows($resultado)>0){
            ?>
            <?php
        }
        else{
        ?>
        
        <?php
        }
    ?>
<!--fin de la consulta-->
<!--container-->
    <div class="container mt-3">
        <div class="row col-md-12">
            <!-- ========== Start pagar carrito ========== -->
                <div class="mx-auto d-flex mb-3">
                    <form action="pagos/pagos.php" method="get" class="mx-auto">
                        <button class="ps-5 pe-5 mx-auto shadow-lg rounded-4 border border-warning-subtle bg-secondary-subtle" type="submit" name="pago" value="pending">
                            <h3 class="fw-bold">Compra todo de tu carrito</h3>
                            <h4>Envio hasta tu casa:</h4>
                            <h2 class="text-center"><?php echo $precio_total_carrito + 25?>.000</h2>
                        </button>
                    </form>
                </div>
            <!-- ========== End pagar carrito ========== -->
            <!-- ========== Start titulo ========== -->
            <div class="row mt-4">
                <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
                <div class="col-md-4" data-bs-spy="scroll" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
                    <h1 id="#loNuevo" class="text-center text-uppercase">Tu carrito</h1>
                </div>
                <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
            </div>
            <!-- ========== End titulo ========== -->
<!--foreach-->
            <?php 
                foreach($resultado as $result):
            ?>
            <div class="col-md-3 mt-4 mb-3">
                <div class="card">
                    <a href="../producto.php ?id=<?php echo $result['id']?>">
                        <img class="card-img-top img-fluid" src="../<?php echo $result['imagen']?>" alt="..." width="250" height="100">
                    </a>
                    <div class="card-body">
                        <a class="text-dark text-decoration-none" href="../producto.php ?id=<?php echo $result['id']?>"><h5 class="card-title"><?php echo $result['nombre']?></h5></a>
                        <p class="card-text text-capitalize"><?php echo $result['informacion']?></p>
                            <div class="col-md-12 mb-1"><div class="text-capitalize fw-bold">Unidad: </div><?php echo $result['precio']?></div>
                            <div class="col-md-12 mb-1"><div class="text-capitalize fw-bold">Cantidad: </div><?php echo $result['cantidad']?></div>
                            <div class="col-md-12 mb-1 text-center h4"><div class="text-capitalize fw-bold text-center text-primary">Total: </div>$<?php echo $result['precio_total']?></div>
                            <div class="row">
                                <a class="btn btn bg-danger fw-bolder mt-2 text-white" href="eliminar_carrito.php ?id=<?php echo $result['id']?>">Eliminar</a>
                            </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
<!--fin del foreach-->
        </div>
    </div>
<!--fin del container-->
<!--fin menu-->
<!--footer-->
<?php include "../includes/footer.php"?>
<!--fin del footer-->
<!--scripts-->
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>    
</body>
</html>