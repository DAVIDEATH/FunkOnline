<?php session_start(); 
include_once "includes/conexion.php";
    if(!isset($_SESSION['correo'])){
        $productoo = $_GET['id'];
    }else{
        $login=$_SESSION['correo'];
        $rango=$_SESSION['rango'];
        $_SESSION['id'];
        $productoo = $_GET['id'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="includes/logo.png">
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
                    header("location:admin/admin.php");
                break;

                case 2;
                    header("location:index.php");
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

                    <a class="navbar-brand ps-5" href="index.php"><strong>FunkOnline</strong></a>
                </div>
<!--links-->
                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav col-md-7 col-lg-9">
                        <l1 class="nav-item"><a class="nav-link" href="index.php">Inicio</a></l1>
                        <l1 class="nav-item"><a class="nav-link active" href="tienda.php">Tienda</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="funkos.php">Funkos</a></l1>
                        <l1 class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="">Contactanos</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Nosotros</a></li>
                                <li><a class="dropdown-item" href="">¿Quienes somos?</a></li>
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
                                    <l1 class="nav-item"><a class="nav-link text-capitalize" href="carrito_deseado/deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="carrito_deseado/carrito.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    Carrito</a></l1>
                                    <l1 class="nav-item"><a class="nav-link" href="admin/admin.php">Administrador</a></l1>
                                <?php
                            }else{
                                //cerramos php para crear codigo html
                                ?>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="carrito_deseado/deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="carrito_deseado/carrito.php">
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
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" href="">
                                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/bhfjfgqz.json"
                                    trigger="click"
                                    colors="primary:#b4b4b4"
                                    state="hover"
                                    class="pe-2"
                                    style="width:25px;height:25px; padding-top:8px; padding-right:3px;">
                                    
                                </lord-icon>
                                Login    
                            </a>
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
                        <a class="nav-link mt-2" role="button" href="registrar.php">Registrate</a>
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
<!--menu-->
<!--trater la cantidad de producto -->
    <?php
        $consul="SELECT * FROM almacen WHERE id_producto = $productoo";
        $resul =mysqli_query($conn, $consul);
        if (mysqli_num_rows($resul)>0){
            $rrow=$resul->fetch_array(MYSQLI_ASSOC);
            $id_almaen_producto= $rrow['id_producto'];
            $cantidad_almacen=$rrow['cantidad'];
        }
    ?>
<!--fin de traer la cantidad de producto-->
<!--consulta para traer el producto-->
    <?php
        $id = $_GET['id'];
        $id_producto = $_GET['id'];
        $consulta = "SELECT * FROM productos WHERE id = '$id'";
        $resultado = mysqli_query($conn, $consulta);

        if(mysqli_num_rows($resultado)==0){
            ?>
                <div class="container-fluid ">
                    <div class="container bg-light mt-3 mb-2 ps-5 pe-5">
                        <!-- ========== Start alerta ========== -->
                            <div class="row">
                                <div class="alert alert-danger mt-3 text-center fw-bold h1 text-capitalize" role="alert">
                                    <!-- ========== Start icono de alerta ========== -->
                                        <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                        <lord-icon
                                            src="https://cdn.lordicon.com/wdqztrtx.json"
                                            trigger="loop"
                                            delay="500"
                                            colors="primary:#911710"
                                            style="width:50px;height:50px; padding-top:10px;">
                                        </lord-icon>
                                    <!-- ========== End icono de alerta ========== -->

                                    No se encontro el producto
                                    <!-- ========== Start icono de alerta ========== -->
                                        <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                        <lord-icon
                                            src="https://cdn.lordicon.com/wdqztrtx.json"
                                            trigger="loop"
                                            delay="500"
                                            colors="primary:#911710"
                                            style="width:50px;height:50px; padding-top:10px;">
                                        </lord-icon>
                                    <!-- ========== End icono de alerta ========== -->
                                </div>
                            </div>
                        <!-- ========== End alerta ========== -->
                        <!-- ========== Start carita sad ========== -->
                        <div class="row mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="300pt" height="300pt" version="1.1" viewBox="0 0 700 700">
                            <defs>
                            <symbol id="u" overflow="visible">
                            <path d="m24.047-1.4375c-1.2422 0.64844-2.5312 1.1328-3.875 1.4531-1.3438 0.33203-2.7461 0.5-4.2031 0.5-4.3672 0-7.8242-1.2188-10.375-3.6562-2.543-2.4375-3.8125-5.7422-3.8125-9.9219 0-4.1758 1.2695-7.4844 3.8125-9.9219 2.5508-2.4375 6.0078-3.6562 10.375-3.6562 1.457 0 2.8594 0.16797 4.2031 0.5 1.3438 0.32422 2.6328 0.80859 3.875 1.4531v5.4062c-1.25-0.85156-2.4844-1.4766-3.7031-1.875-1.2109-0.39453-2.4844-0.59375-3.8281-0.59375-2.418 0-4.3125 0.77344-5.6875 2.3125-1.375 1.543-2.0625 3.668-2.0625 6.375 0 2.7109 0.6875 4.8359 2.0625 6.375 1.375 1.543 3.2695 2.3125 5.6875 2.3125 1.3438 0 2.6172-0.19531 3.8281-0.59375 1.2188-0.40625 2.4531-1.0352 3.7031-1.8906z"/>
                            </symbol>
                            <symbol id="c" overflow="visible">
                            <path d="m17.594-14.281c-0.55469-0.25781-1.1016-0.44531-1.6406-0.5625-0.54297-0.125-1.0898-0.1875-1.6406-0.1875-1.6055 0-2.8438 0.51562-3.7188 1.5469s-1.3125 2.5117-1.3125 4.4375v9.0469h-6.2656v-19.625h6.2656v3.2188c0.8125-1.2812 1.7383-2.2109 2.7812-2.7969 1.0508-0.59375 2.3047-0.89062 3.7656-0.89062 0.20703 0 0.42969 0.011719 0.67188 0.03125 0.25 0.011719 0.60938 0.046875 1.0781 0.10938z"/>
                            </symbol>
                            <symbol id="a" overflow="visible">
                            <path d="m22.609-9.8594v1.7812h-14.672c0.15625 1.4688 0.6875 2.5742 1.5938 3.3125 0.91406 0.74219 2.1914 1.1094 3.8281 1.1094 1.3125 0 2.6602-0.19531 4.0469-0.59375 1.3828-0.39453 2.8047-0.98828 4.2656-1.7812v4.8438c-1.4805 0.5625-2.9648 0.98438-4.4531 1.2656-1.4805 0.28906-2.9609 0.4375-4.4375 0.4375-3.5547 0-6.3125-0.89844-8.2812-2.7031-1.9688-1.8125-2.9531-4.3477-2.9531-7.6094 0-3.1953 0.96094-5.7109 2.8906-7.5469 1.9375-1.832 4.5977-2.75 7.9844-2.75 3.082 0 5.5508 0.92969 7.4062 2.7812 1.8516 1.8555 2.7812 4.3398 2.7812 7.4531zm-6.4531-2.0938c0-1.1875-0.35156-2.1445-1.0469-2.875-0.6875-0.73828-1.5938-1.1094-2.7188-1.1094-1.2188 0-2.2109 0.34375-2.9688 1.0312-0.75 0.6875-1.2188 1.6719-1.4062 2.9531z"/>
                            </symbol>
                            <symbol id="j" overflow="visible">
                            <path d="m11.812-8.8281c-1.3125 0-2.2969 0.22656-2.9531 0.67188-0.65625 0.4375-0.98438 1.0898-0.98438 1.9531 0 0.79297 0.26562 1.418 0.79688 1.875 0.53125 0.44922 1.2695 0.67188 2.2188 0.67188 1.1758 0 2.1641-0.42188 2.9688-1.2656 0.8125-0.85156 1.2188-1.9141 1.2188-3.1875v-0.71875zm9.5781-2.375v11.203h-6.3125v-2.9062c-0.84375 1.1875-1.793 2.0586-2.8438 2.6094-1.0547 0.53906-2.3359 0.8125-3.8438 0.8125-2.0312 0-3.6836-0.59375-4.9531-1.7812-1.2617-1.1875-1.8906-2.7266-1.8906-4.625 0-2.3008 0.78906-3.9883 2.375-5.0625 1.582-1.0703 4.0664-1.6094 7.4531-1.6094h3.7031v-0.5c0-0.98828-0.39844-1.7109-1.1875-2.1719-0.78125-0.46875-2-0.70312-3.6562-0.70312-1.3438 0-2.5938 0.13672-3.75 0.40625-1.1562 0.27344-2.2305 0.67969-3.2188 1.2188v-4.7969c1.3438-0.32031 2.6914-0.56641 4.0469-0.73438 1.3516-0.16406 2.707-0.25 4.0625-0.25 3.5391 0 6.0938 0.69922 7.6562 2.0938 1.5703 1.3984 2.3594 3.6641 2.3594 6.7969z"/>
                            </symbol>
                            <symbol id="b" overflow="visible">
                            <path d="m9.8594-25.203v5.5781h6.4688v4.4844h-6.4688v8.3281c0 0.90625 0.17969 1.5234 0.54688 1.8438 0.36328 0.32422 1.082 0.48438 2.1562 0.48438h3.2344v4.4844h-5.3906c-2.4805 0-4.2344-0.51562-5.2656-1.5469-1.0312-1.0391-1.5469-2.7969-1.5469-5.2656v-8.3281h-3.125v-4.4844h3.125v-5.5781z"/>
                            </symbol>
                            <symbol id="i" overflow="visible">
                            <path d="m16.375-16.75v-10.516h6.2969v27.266h-6.2969v-2.8438c-0.86719 1.1562-1.8203 2.0078-2.8594 2.5469-1.043 0.53906-2.2461 0.8125-3.6094 0.8125-2.418 0-4.4062-0.95703-5.9688-2.875-1.5547-1.9258-2.3281-4.4062-2.3281-7.4375 0-3.0195 0.77344-5.4883 2.3281-7.4062 1.5625-1.9258 3.5508-2.8906 5.9688-2.8906 1.3516 0 2.5508 0.27344 3.5938 0.8125 1.0508 0.54297 2.0078 1.3867 2.875 2.5312zm-4.1406 12.703c1.3438 0 2.3672-0.48828 3.0781-1.4688 0.70703-0.98828 1.0625-2.4141 1.0625-4.2812 0-1.8633-0.35547-3.2852-1.0625-4.2656-0.71094-0.98828-1.7344-1.4844-3.0781-1.4844-1.3359 0-2.3555 0.49609-3.0625 1.4844-0.71094 0.98047-1.0625 2.4023-1.0625 4.2656 0 1.8672 0.35156 3.293 1.0625 4.2812 0.70703 0.98047 1.7266 1.4688 3.0625 1.4688z"/>
                            </symbol>
                            <symbol id="h" overflow="visible">
                            <path d="m13.453-4.0469c1.3438 0 2.3672-0.48828 3.0781-1.4688 0.70703-0.98828 1.0625-2.4141 1.0625-4.2812 0-1.8633-0.35547-3.2852-1.0625-4.2656-0.71094-0.98828-1.7344-1.4844-3.0781-1.4844s-2.375 0.49609-3.0938 1.4844c-0.71875 0.99219-1.0781 2.4141-1.0781 4.2656 0 1.8555 0.35938 3.2773 1.0781 4.2656 0.71875 0.99219 1.75 1.4844 3.0938 1.4844zm-4.1719-12.703c0.86328-1.1445 1.8203-1.9883 2.875-2.5312 1.0508-0.53906 2.2656-0.8125 3.6406-0.8125 2.4141 0 4.3984 0.96484 5.9531 2.8906 1.5508 1.918 2.3281 4.3867 2.3281 7.4062 0 3.0312-0.77734 5.5117-2.3281 7.4375-1.5547 1.918-3.5391 2.875-5.9531 2.875-1.375 0-2.5898-0.27344-3.6406-0.8125-1.0547-0.55078-2.0117-1.3984-2.875-2.5469v2.8438h-6.2656v-27.266h6.2656z"/>
                            </symbol>
                            <symbol id="g" overflow="visible">
                            <path d="m0.4375-19.625h6.2812l5.2656 13.312 4.4844-13.312h6.2812l-8.25 21.484c-0.83594 2.1875-1.8047 3.7109-2.9062 4.5781-1.1055 0.875-2.5625 1.3125-4.375 1.3125h-3.625v-4.125h1.9688c1.0625 0 1.832-0.17188 2.3125-0.51562 0.48828-0.33594 0.86328-0.9375 1.125-1.8125l0.1875-0.54688z"/>
                            </symbol>
                            <symbol id="f" overflow="visible">
                            <path d="m3.2969-26.172h6.75v9.5625l9.7188-9.5625h7.8281l-12.594 12.391 13.891 13.781h-8.4375l-10.406-10.297v10.297h-6.75z"/>
                            </symbol>
                            <symbol id="t" overflow="visible">
                            <path d="m0.54688-19.625h6.2656l4.8906 13.562 4.875-13.562h6.2969l-7.7344 19.625h-6.8906z"/>
                            </symbol>
                            <symbol id="s" overflow="visible">
                            <path d="m3.0156-19.625h6.2656v19.625h-6.2656zm0-7.6406h6.2656v5.1094h-6.2656z"/>
                            </symbol>
                            <symbol id="e" overflow="visible">
                            <path d="m22.75-11.953v11.953h-6.3125v-9.1406c0-1.6953-0.042969-2.8633-0.125-3.5-0.074219-0.64453-0.19922-1.125-0.375-1.4375-0.25-0.40625-0.58984-0.72266-1.0156-0.95312-0.41797-0.22656-0.89062-0.34375-1.4219-0.34375-1.3125 0-2.3438 0.50781-3.0938 1.5156-0.75 1.0117-1.125 2.4141-1.125 4.2031v9.6562h-6.2656v-19.625h6.2656v2.875c0.94531-1.1445 1.9531-1.9883 3.0156-2.5312 1.0625-0.53906 2.2383-0.8125 3.5312-0.8125 2.2578 0 3.9766 0.69531 5.1562 2.0781 1.1758 1.3867 1.7656 3.4062 1.7656 6.0625z"/>
                            </symbol>
                            <symbol id="r" overflow="visible">
                            <path d="m15.938-27.266v4.1094h-3.4844c-0.88672 0-1.5078 0.16406-1.8594 0.48438-0.34375 0.32422-0.51562 0.88281-0.51562 1.6719v1.375h5.3594v4.4844h-5.3594v15.141h-6.2812v-15.141h-3.1094v-4.4844h3.1094v-1.375c0-2.1328 0.59375-3.7109 1.7812-4.7344 1.1953-1.0195 3.0469-1.5312 5.5469-1.5312z"/>
                            </symbol>
                            <symbol id="d" overflow="visible">
                            <path d="m12.359-15.609c-1.3984 0-2.4609 0.5-3.1875 1.5-0.73047 0.99219-1.0938 2.4297-1.0938 4.3125 0 1.8867 0.36328 3.3281 1.0938 4.3281 0.72656 0.99219 1.7891 1.4844 3.1875 1.4844 1.3633 0 2.4062-0.49219 3.125-1.4844 0.72656-1 1.0938-2.4414 1.0938-4.3281 0-1.8828-0.36719-3.3203-1.0938-4.3125-0.71875-1-1.7617-1.5-3.125-1.5zm0-4.4844c3.375 0 6.0078 0.91406 7.9062 2.7344 1.8945 1.8125 2.8438 4.3359 2.8438 7.5625 0 3.2305-0.94922 5.7578-2.8438 7.5781-1.8984 1.8242-4.5312 2.7344-7.9062 2.7344-3.3984 0-6.0469-0.91016-7.9531-2.7344-1.9062-1.8203-2.8594-4.3477-2.8594-7.5781 0-3.2266 0.95312-5.75 2.8594-7.5625 1.9062-1.8203 4.5547-2.7344 7.9531-2.7344z"/>
                            </symbol>
                            <symbol id="q" overflow="visible">
                            <path d="m21.203-16.375c0.78906-1.207 1.7344-2.1289 2.8281-2.7656 1.0938-0.63281 2.2969-0.95312 3.6094-0.95312 2.25 0 3.9609 0.69531 5.1406 2.0781 1.1875 1.3867 1.7812 3.4062 1.7812 6.0625v11.953h-6.3125v-10.234c0.007812-0.15625 0.015625-0.3125 0.015625-0.46875 0.007813-0.16406 0.015625-0.39844 0.015625-0.70312 0-1.3945-0.20312-2.4062-0.60938-3.0312s-1.0703-0.9375-1.9844-0.9375c-1.1875 0-2.1094 0.49609-2.7656 1.4844-0.64844 0.98047-0.98047 2.3984-1 4.25v9.6406h-6.3125v-10.234c0-2.1758-0.1875-3.5781-0.5625-4.2031-0.36719-0.625-1.0273-0.9375-1.9844-0.9375-1.2109 0-2.1406 0.49609-2.7969 1.4844-0.65625 0.99219-0.98438 2.4023-0.98438 4.2344v9.6562h-6.2969v-19.625h6.2969v2.875c0.76953-1.1133 1.6562-1.9453 2.6562-2.5 1-0.5625 2.1016-0.84375 3.3125-0.84375 1.3516 0 2.5508 0.32812 3.5938 0.98438 1.0391 0.64844 1.8281 1.5586 2.3594 2.7344z"/>
                            </symbol>
                            <symbol id="p" overflow="visible">
                            <path d="m22.75-11.953v11.953h-6.3125v-9.1094c0-1.7188-0.042969-2.8945-0.125-3.5312-0.074219-0.64453-0.19922-1.125-0.375-1.4375-0.25-0.40625-0.58984-0.72266-1.0156-0.95312-0.41797-0.22656-0.89062-0.34375-1.4219-0.34375-1.3125 0-2.3438 0.50781-3.0938 1.5156-0.75 1.0117-1.125 2.4141-1.125 4.2031v9.6562h-6.2656v-27.266h6.2656v10.516c0.94531-1.1445 1.9531-1.9883 3.0156-2.5312 1.0625-0.53906 2.2383-0.8125 3.5312-0.8125 2.2578 0 3.9766 0.69531 5.1562 2.0781 1.1758 1.3867 1.7656 3.4062 1.7656 6.0625z"/>
                            </symbol>
                            <symbol id="o" overflow="visible">
                            <path d="m3.2969-26.172h7.5312l9.5156 17.953v-17.953h6.4062v26.172h-7.5469l-9.5156-17.953v17.953h-6.3906z"/>
                            </symbol>
                            <symbol id="n" overflow="visible">
                            <path d="m2.7969-7.6406v-11.984h6.3125v1.9531c0 1.0742-0.007813 2.4141-0.015625 4.0156-0.011719 1.6055-0.015625 2.6797-0.015625 3.2188 0 1.5742 0.039063 2.7109 0.125 3.4062 0.082031 0.6875 0.22266 1.1953 0.42188 1.5156 0.25 0.40625 0.58203 0.72656 1 0.95312 0.41406 0.21875 0.89453 0.32812 1.4375 0.32812 1.3008 0 2.3281-0.5 3.0781-1.5 0.75-1.0078 1.125-2.4102 1.125-4.2031v-9.6875h6.2656v19.625h-6.2656v-2.8438c-0.94922 1.1484-1.9531 1.9961-3.0156 2.5469-1.0547 0.53906-2.2148 0.8125-3.4844 0.8125-2.2734 0-4-0.69141-5.1875-2.0781-1.1875-1.3945-1.7812-3.4219-1.7812-6.0781z"/>
                            </symbol>
                            <symbol id="m" overflow="visible">
                            <path d="m3.2969-26.172h11.203c3.3203 0 5.875 0.74219 7.6562 2.2188 1.7812 1.4805 2.6719 3.5898 2.6719 6.3281 0 2.7422-0.89062 4.8516-2.6719 6.3281-1.7812 1.4805-4.3359 2.2188-7.6562 2.2188h-4.4531v9.0781h-6.75zm6.75 4.8906v7.3125h3.7344c1.3008 0 2.3047-0.31641 3.0156-0.95312 0.71875-0.63281 1.0781-1.5352 1.0781-2.7031 0-1.1641-0.35938-2.0664-1.0781-2.7031-0.71094-0.63281-1.7148-0.95312-3.0156-0.95312z"/>
                            </symbol>
                            <symbol id="l" overflow="visible">
                            <path d="m3.0156-19.625h6.2656v19.281c0 2.625-0.63281 4.6289-1.8906 6.0156-1.2617 1.3828-3.0898 2.0781-5.4844 2.0781h-3.0938v-4.125h1.0781c1.1953 0 2.0156-0.27344 2.4531-0.8125 0.44531-0.53125 0.67188-1.5859 0.67188-3.1562zm0-7.6406h6.2656v5.1094h-6.2656z"/>
                            </symbol>
                            <symbol id="k" overflow="visible">
                            <path d="m18.875-19.016v5.125c-0.85547-0.58203-1.7148-1.0156-2.5781-1.2969-0.85547-0.28125-1.7422-0.42188-2.6562-0.42188-1.7617 0-3.1328 0.51172-4.1094 1.5312-0.96875 1.0234-1.4531 2.4492-1.4531 4.2812 0 1.8359 0.48438 3.2617 1.4531 4.2812 0.97656 1.0234 2.3477 1.5312 4.1094 1.5312 0.97656 0 1.9062-0.14453 2.7812-0.4375 0.88281-0.28906 1.7031-0.72266 2.4531-1.2969v5.1406c-0.98047 0.36719-1.9766 0.63281-2.9844 0.8125-1.0117 0.1875-2.0273 0.28125-3.0469 0.28125-3.543 0-6.3125-0.90625-8.3125-2.7188-1.9922-1.8203-2.9844-4.3516-2.9844-7.5938 0-3.2383 0.99219-5.7656 2.9844-7.5781 2-1.8125 4.7695-2.7188 8.3125-2.7188 1.0312 0 2.0469 0.089844 3.0469 0.26562 1 0.17969 1.9922 0.44922 2.9844 0.8125z"/>
                            </symbol>
                            </defs>
                            <g>
                            <path d="m235.55 457.34c-1.5508-9.1289 5.9375-17.035 13.176-22.473 58.203-43.547 137.59-39.848 191.8 8.9375 2.2734 1.8594 4.2148 4.1133 5.75 6.6602 4.9648 9.1953-2.0664 21.613-11.77 24.773-9.6992 3.1562-20.285-0.60156-28.953-6.168-8.6641-5.5625-16.152-12.891-25.066-17.938-7.9766-4.3281-16.621-7.1719-25.543-8.4023-24.895-3.7969-50.297 1.3086-72.031 14.48-8.1094 4.9648-15.926 11.129-25.191 12.891-9.2656 1.7617-20.535-3.1367-22.172-12.762z"/>
                            <path d="m271.64 323.51c8.625 6.7695 7.8398 22.754-1.4062 28.574-5.3984 3.3945-12.098 3.3516-18.426 3.1797l-55.074-1.375c-6.7031-0.17188-13.672-0.40625-19.672-3.5234-5.9961-3.1133-10.711-10.055-9.2422-16.863 0.8125-3.293 2.707-6.1914 5.3555-8.1875 5.9961-4.7461 14.086-5.0898 21.633-5.2422l55.488-1.1172c7.4258-0.12891 15.449 0 21.344 4.5547z"/>
                            <path d="m129 469.35c-16.602-17.777-31.172-37.477-43.43-58.719-38.305-68.75-40.332-156.52-9.5977-229.16 30.734-72.637 92.324-129.42 163.8-157.39 71.477-27.973 151.89-27.93 225.04-5.1797 20.906 6.3047 41.066 15.027 60.102 25.996 77.473 45.699 124.56 140.04 119.95 232.46-4.6133 92.426-59.254 179.48-136.75 225.14-30.816 18.156-64.734 30.078-99.273 38.672-74.973 18.5-158.59 19.574-224.09-22.602-20.68-13.383-39.004-30.656-55.84-49.156zm80.762 23.289c19.391 11.941 40.469 20.641 62.457 25.781 26.887 6.1641 54.684 6.4453 82.086 4.0391 31.023-2.7305 62.047-8.8945 91.312-20.367 76.645-30.078 139.08-99.605 157.86-182.47 18.781-82.867-8.9727-176.52-72.551-230.23-59.043-49.887-140.82-62.176-216.35-52.25-21.645 2.5977-42.965 7.5742-63.598 14.844-83.906 30.641-147.32 114.66-155.92 206.62-8.6055 91.953 38.117 187.11 114.76 234.03z"/>
                            <path d="m489.36 348.07c-4.2812 2.2969-9.2852 2.4492-14.102 2.5547l-45.191 0.98828c-6.8242 0.15234-13.98 0.23828-20.082-2.9648-6.1016-3.1992-10.652-10.742-8.2734-17.445 2.3789-6.7031 10.344-9.1719 17.043-10.504 16.102-3.1875 32.41-5.1211 48.789-5.7812 10.008-0.40625 21.633 0.49609 27.422 8.9609 2.457 3.9492 3.2461 8.7695 2.1875 13.344-1.0625 4.5703-3.875 8.4883-7.793 10.848z"/>
                            <path d="m207.57 238.13c3.9922-6.25 7.7773-12.891 13.586-17.359 5.8125-4.4688 14.477-6.0391 20.125-1.4414-8.582 16.094-17.809 32.102-30.422 45.121-12.617 13.02-29.121 22.578-46.824 23.375-5.0234 0.52344-10.082-0.57812-14.477-3.1602-4.1367-2.8359-6.9688-8.4219-5.3789-13.34 1.7188-5.3516 7.6953-7.9727 13.113-8.207 5.418-0.23828 10.836 1.2227 16.254 0.96484 14.602-0.81641 25.957-13.34 34.023-25.953z"/>
                            <path d="m420.43 212.28c7.0508 1.3125 10.566 9.2617 14.352 15.578 13.195 21.98 43.164 30.98 65.602 19.723 3.1875-1.5898 6.9492 2.1484 6.8672 5.7812-0.082032 3.6289-2.625 6.7461-5.293 9.1289-12.184 10.938-29.617 14.504-45.5 11.152-15.883-3.3516-29.906-13.062-40.703-25.48-5.1484-5.9297-9.8008-13.086-9.7812-21.078 0.019531-7.9922 6.8867-16.223 14.457-14.805z"/>
                            </g>
                        </svg>
                        </div>
                        <!-- ========== End carita sad ========== -->
                        <!-- ========== Start href ========== -->
                        <div class="row mx-auto">
                            <div class="row col-md-3 mx-auto">
                                <a href="index.php" class="btn btn-lg btn-dark text-uppercase mx-auto">
                                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                    <lord-icon
                                        class="pt-1"
                                        src="https://cdn.lordicon.com/osuxyevn.json"
                                        trigger="loop"
                                        delay="2500"
                                        colors="primary:#ffffff"
                                        state="in"
                                        style="width:30px;height:30px;">
                                    </lord-icon>
                                Inicio</a>
                            </div>
                        </div>
                        <!-- ========== End href ========== -->
                    </div>
                </div>
            <?php
        }else{
            $filas=$resultado->fetch_array(MYSQLI_ASSOC);
            //agregamos a las variables
            $id_producto = $filas['id'];
            $Nombre_producto = $filas['nombre'];
            $informacion_producto = $filas['informacion'];
            $precio_producto =$filas['precio'];
            $imagen_producto = $filas['imagen'];
            $categoria_producto=$filas['categoria'];
            $tematica_producto=$filas['tematica'];
            
            ?>
            <!--container-->
    <div class="container">
    <div class="row mt-4 mb-4">
<!--aside-->
        <div class="col-md-6 ">
            <img class="img-fluid mt-md-5 mb-md-4 p-5 border" src="<?php echo $imagen_producto?>" alt="">
        </div>
        <div class="col-md-6 pt-5 ">
            <h1 class="mt-5 pt-5 text-center text-uppercase"><stronger><?php echo $Nombre_producto?></stronger></h1>
            <p class="ms-5 me-5 mt-5 h4"><?php echo $informacion_producto?></p>
<!--convertimos en nombre la categoria-->
            <?php
                $preConsulta1 = "SELECT * FROM categorias WHERE id = '$categoria_producto'";
                $preResultado1 = mysqli_query($conn, $preConsulta1);
                if(mysqli_num_rows($preResultado1)>0){
                    $filas=$preResultado1->fetch_array(MYSQLI_ASSOC);
                    //agregamos a las variables
                    $nombre_categoria = $filas['nombre'];
                }
            ?>
            <h4 class="mt-4 ms-5">Categoria: <a class="text-decoration-none text-capitalize text-primary" href="categorias.php ?id=<?php echo $nombre_categoria ?>"><?php echo $nombre_categoria ?></a></h4>
<!--fin de la conversion-->
<!--convertimos en nombre la tematia-->
            <?php
                $preConsulta2 = "SELECT * FROM tematica WHERE id_tematica = $tematica_producto";
                $preResultado2 = mysqli_query($conn, $preConsulta2);
                if(mysqli_num_rows($preResultado2)>0){
                    $filas=$preResultado2->fetch_array(MYSQLI_ASSOC);
                    //agregamos a las variables
                    $nombre_tematica = $filas['nombre_tematica'];
                }
            ?>
            <h4 class="mt-2 ms-5">Tematica: <a class="text-decoration-none text-capitalize text-primary" href="tematicas.php ?id=<?php echo $nombre_tematica ?>"><?php echo $nombre_tematica ?></a></h4>
<!--fin de la conversion-->
<!--precio-->
            <h2 class="text-uppercase text-center mt-5 text-success fw-bolder fs-2">$<?php echo $precio_producto?></h2>
<!--fin del precio-->
<!--php de deseos-->
    <?php
        if(isset($_POST['deseado']) and $_POST['cantidad'] >0){
            if(isset($_SESSION['correo'])){
                $cantidad = $_POST['cantidad'];
                $pruducto = $_GET["id"];
                $id_usuario = $_SESSION['id'];

                $consult= "SELECT precio FROM productos WHERE id = $pruducto";
                $result=mysqli_query($conn, $consult);

                if(mysqli_num_rows($result)>0){
                    $row=$result->fetch_array(MYSQLI_ASSOC);
                    $preciodelproducto= $row['precio'];

                    $pre_consulta = "SELECT * FROM deseado WHERE id_producto = $pruducto and usuario ='$id_usuario'";
                    $pre_resultado = mysqli_query($conn,$pre_consulta);
                    if(mysqli_num_rows($pre_resultado)>=1){
                        $roww=$pre_resultado->fetch_array(MYSQLI_ASSOC);
                        //actualizamos
                        $id_consulta=$roww['id'];
                        $precio_total= $preciodelproducto * $cantidad;
                        $consultaa="UPDATE deseado SET cantidad=$cantidad, precio_total=$precio_total WHERE id = '$id_consulta' and usuario ='$id_usuario'";
                        $resultadoo = mysqli_query($conn,$consultaa);

                        if($resultadoo = true){
                            //html
                            ?>
                            <div class="row">
                                <h3 class="text-center text-white bg-success pb-2 text-capitalize">se ha Editado tu producto</h3>
                                <a class="btn btn-danger" href="carrito_deseado/deseado.php">
                                    <svg class=" pb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 17 17">
                                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                    </svg>
                                Tu lista de Deseado</a>
                            </div>
                            <?php
                        }
                    }else{
                        $precio_total= $preciodelproducto * $cantidad;
                        $insert= "INSERT INTO deseado (id_producto, cantidad, precio_total, usuario) VALUES ('$pruducto', '$cantidad', '$precio_total', '$id_usuario')";
                        $execute=mysqli_query($conn, $insert);

                            if($execute = true){
                                //html
                                ?>
                                <div class="row">
                                    <h3 class="text-center text-white bg-success pb-2 text-capitalize">se ha agregado correctamente</h3>
                                    <a class="btn btn-danger" href="carrito_deseado/deseado.php">
                                        <svg class=" pb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 17 17">
                                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                        </svg>
                                    Tu lista de Deseado</a>
                                </div>
                                <?php
                            }
                    }
                }
            }else{
                ?>
<!--row para que se registre-->
                    <div class="row ">
                        <h4 class="fw-bold text-center text-danger">Registrate para poder tener tu lista de deseados</h4>
                        <a class="text-decoration-none text-center text-primary h5" href="registrar.php">Registrate aqui!
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb" viewBox="0 0 16 16">
                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z"/>
                            </svg>
                        </a>
                    </div>
<!--fin del row para que se registre-->
                <?php
            }
        }
    ?>
<!--fin de php deseos -->
<!--php  de carrito-->
    <?php
        if(isset($_POST['carrito']) and $_POST['cantidad'] > 0){
            if(isset($_SESSION['correo'])){
                $cantidad = $_POST['cantidad'];
                $pruducto = $_GET["id"];
                $id_usuario = $_SESSION['id'];

                $consult= "SELECT precio FROM productos WHERE id = $pruducto";
                $result=mysqli_query($conn, $consult);

                if(mysqli_num_rows($result)>0){
                    $row=$result->fetch_array(MYSQLI_ASSOC);
                    $preciodelproducto= $row['precio'];
                    
                    $pre_consulta = "SELECT * FROM carrito WHERE id_producto = $pruducto and usuario ='$id_usuario'";
                    $pre_resultado = mysqli_query($conn, $pre_consulta);

                    if(mysqli_num_rows($pre_resultado)>=1){
                        $roww=$pre_resultado->fetch_array(MYSQLI_ASSOC);
                        //actualizamos
                        $id_consulta=$roww['id'];

                        $precio_total= $preciodelproducto * $cantidad;
                        $consultaa="UPDATE carrito SET cantidad=$cantidad, precio_total=$precio_total WHERE id = '$id_consulta' and usuario ='$id_usuario'";
                        $resultadoo = mysqli_query($conn,$consultaa);
                        if($resultadoo = true){
                            //html
                            ?>
                                <div class="row">
                                    <h3 class="text-center text-white bg-success pb-2 text-capitalize">se ha Editado tu producto</h3>
                                    <a class="btn btn-warning" href="carrito_deseado/carrito.php">
                                        <svg class=" pb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 17 17">
                                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                        </svg>
                                    Tu lista de carrito</a>
                                </div>
                            <?php
                        }    
                    }else{
                        $precio_total= $preciodelproducto * $cantidad;
                        $insert= "INSERT INTO carrito (id_producto, cantidad, precio_total, usuario) VALUES ('$pruducto', '$cantidad', '$precio_total', '$id_usuario')";
                        $execute=mysqli_query($conn, $insert);

                            if($execute = true){
                                //html
                                ?>
                                <div class="row">
                                    <h3 class="text-center text-white bg-success pb-2 text-capitalize">se ha agregado correctamente</h3>
                                    <a class="btn btn-warning" href="carrito_deseado/carrito.php">
                                        <svg class=" pb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 17 17">
                                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                        </svg>
                                    Tu lista de carrito</a>
                                </div>
                                <?php
                            }
                    }
                }    
            }else{
                ?>
<!--row para que se registre2-->
                    <div class="row ">
                        <h4 class="fw-bold text-center text-danger">Registrate para poder tener tu lista de carrito</h4>
                        <a class="text-decoration-none text-center text-primary h5" href="registrar.php">Registrate aqui!
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb" viewBox="0 0 16 16">
                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z"/>
                            </svg>
                        </a>
                    </div>
<!--fin del row para que se registre2-->
                <?php
            }
        }
    ?>
<!--fin de php deseos -->
<!--corazon y carrito-->
            <div class="row mt-2">
                <div class="col-md-4">
                </div>
                <div class="col-md-8 mt-4">
                    <!--button trigger modal -->
                    <button class="btn btn-danger p-2 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    lista de deseos
                    </button>
                    <!--modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center text-success">
                                    <h5 class="modal-title text-center ps-5" id="exampleModal"><h3>¿Quieres agregar a deseados?</h3></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-budy text-center">
                                    <h5 class="pt-3 pb-4">¿cuanta cantidad quieres agregar?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                                    <form class="" action="" method="POST">
                                        <div class="input-group">
                                            <input class="form-control" name="cantidad" type="number" placeholder="¿cuantos quieres?" value="1" min="1" max="<?php echo $cantidad_almacen?>">
                                            <input class="btn btn-secondary" name="deseado" type="submit" value="Enviar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin de Button trigger modal -->
                    <!--button trigger modal2 -->
                    <button class="btn btn-warning fs-5 pe-3 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <svg class=" pb-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 17 17">
                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                        </svg>
                    Agregar a Carrito
                    </button>
                    <!--modal-->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center text-success">
                                    <h5 class="modal-title text-center ps-5" id="exampleModal2"><h3>¿Quieres agregar al carrito?</h3></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-budy text-center">
                                    <h5 class="pt-3 pb-4">¿cuanta cantidad quieres agregar?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                                    <form class="" action="" method="POST">
                                        <div class="input-group">
                                            <input class="form-control" name="cantidad" type="number" placeholder="¿cuantos quieres?" value="1" min="1" max="<?php echo $cantidad_almacen?>">
                                            <input class="btn btn-secondary" name="carrito" type="submit" value="enviar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--fin del carrito-->
        </div>
<!--fin del aside-->
    </div>
<!--redcomendado-->
    <?php
        $sql="SELECT * FROM productos WHERE categoria = $categoria_producto AND tematica = $tematica_producto AND NOT id= $productoo ORDER BY id DESC limit 6";
        $runsql=mysqli_query($conn, $sql);

        if(mysqli_num_rows($runsql) <1){
        }else{
            ?>
<div class="row">
    <div class="col-md-12">
        <div class="row mt-4">
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
            <div class="col-md-4" data-bs-spy="scroll" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
                <h1 id="#loNuevo" class="text-center text-uppercase">Recomendado</h1>
            </div>
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
        </div>
<!--cards-->
        <div class="row">
            <?php 
                foreach($runsql as $opciones2) :
            ?>
                <div class="col-md-2">
                    <div class="card mb-3">
                        <div class="card-img">
                            <a href="producto.php ?id=<?php echo $opciones2['id']?>">
                                <img class="card-img-top img-fluid" src="<?php echo $opciones2['imagen']?>" alt="..." width="250" height="100">
                            </a>
                        </div>
                        <div class="card-body">
                            <a class="text-dark text-decoration-none text-capitalize" href="producto.php ?id=<?php echo $opciones2['id']?>"><h5 class="card-title"><?php echo $opciones2['nombre']?></h5></a>
                            <p class="card-text text-capitalize"><?php echo $opciones2['informacion']?></p>
                            <h5 class="text-primary text-center">$<?php echo $opciones2['precio']?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
<!--fin de cards-->
    </div>
</div>
            <?php
        }
    ?>

<!--fin de recomendado-->
    </div>
<!--fin del container-->
<!--fin del si es un producto-->
            <?php
        }
    ?>
<!--fin de la consulta para el producto-->

<!--fin de menu-->
<!--footer-->
    <?php include "includes/footer.php"?>
<!--fin del footer-->
<!--scripts-->
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>    
</body>
</html>