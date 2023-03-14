<?php session_start(); 
include_once "includes/conexion.php";
if(!isset($_SESSION['correo'])){
        
}else{
    $login=$_SESSION['correo'];
    header('location:index.php');
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
    <title>FunkOnline</title>
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

                    <a class="navbar-brand ps-5"><strong>FunkOnline</strong></a>
                </div>
<!--links-->
                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav col-md-7 col-lg-9">
                        <l1 class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></l1>
                        <l1 class="nav-item"><a class="nav-link" href="tienda.php">Tienda</a></l1>
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
<!--php para registrar los datos-->
<?php 
        if(isset($_POST['registrar'])){
            $nombre=$_POST['name'];
            $apellido=$_POST['surname'];
            $nickname=$_POST['nickname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $rango=2;

            $query = "SELECT * FROM login WHERE correo = '$email'";
            $runQuery = mysqli_query($conn, $query);
            if(mysqli_num_rows($runQuery) > 0){
                echo '<div class="alert alert-danger" role="alert">';
                echo '<h4 class="alert-heading text-center">Oops!</h4>';
                echo '<p class="alert-text text-center text-capitalize">YA existe la cuenta</p>';
                echo '</div>';
            }else{
                $query = "INSERT INTO login(correo, password, nombres, apellidos, username, rango) VALUES ('$email','$password','$nombre','$apellido','$nickname', '$rango')";
                $runQuery = mysqli_query($conn, $query);

                if($runQuery = true){
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<h4 class="alert-heading text-center text-capitalize">Se ha creado tu cuenta nueva!</h4>';
                    echo '<p class="alert-text text-center text-capitalize">ingresa con tu correo y contraseña</p>';
                    echo '</div>';
                }
            }
        }
    ?>
<!--fin de php para registrar los datos-->
<!--menu-->
    <div class="container-fluid mt-5 pt-1">
        <div class="row mb-2">
<!--row de imagen-->
            <div class="col-md-4 mb-1">
                <img class="img-fluid mb-4" src="img/logo.png" alt="">
                <img class="img-fluid rounded" src="img/coleccion_funko.png" alt="">
            </div>
<!--fin de row de imagen-->
<!--registrar-->
<div class="col-md-4 mb-1 mt-4">
                <div class="bg-light rounded ">
                    <h2 class="text-center fw-bold text-capitalize pt-5">¿Ya tienes cuenta?</h2>
<!--row de registro con google-->
                    <div class="row mt-4">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 ms-5">
                            <button class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google mb-1" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg>    
                            Registrate con Google</button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
<!--fin de row de regsitro-->
<!--formulario de registro-->
                    <div class="row mt-4">
                        <h5 class="text-center">Ingresa los siguientes datos</h5>
                        <form class="was-validated" action="" method="POST">
                            <!--nombre-->
                            <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="name" type="name" id="floatingInput1" placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput1">Nombre</label>
                            </div>
                            <!--fin de nombre-->
                            <!--apellido-->
                                <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="surname" type="surname" id="floatingInput1" placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput1">Apellidos</label>
                            </div>
                            <!--fin de apellido-->
                            <!--username-->
                                <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="nickname" type="nickname" id="floatingInput1" placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput1">Nickname</label>
                            </div>
                            <!--fin de username-->
                            <!--email-->
                            <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="email" type="email" id="floatingInput2" placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput2">Email</label>
                            </div>
                            <!--fin de email-->
                            <!--password-->
                            <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="password" type="password" id="floatingInput3" placeholder="paswword" autocomplete="off">
                                <label for="floatingInput3">Contraseña</label>
                            </div>
                            <!--fin de password-->
                            <!--input submit-->
                                <input class="btn btn-outline-success fw-bold text-uppercase mt-3 ms-4 mb-4" name="registrar" type="submit" value="Registrar" >
                            <!--fin de submit-->
                        </form>
                    </div>
<!--fin de formulario de registro-->
                </div>
            </div>
<!--fin de registro-->
<!--ingresar-->
<div class="col-md-4 mb-1 mt-4">
                <div class="bg-light rounded ">
                    <h2 class="text-center fw-bold text-capitalize pt-5 pb-2">¿Ya tienes cuenta?</h2>
<!--formulario de ingresar-->
                    <div class="row mt-5 pt-4">
                        <h5 class="text-center">Ingresa los siguientes datos</h5>
                        <form class="was-validated" action="" method="POST">
                            <!--email-->
                            <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="email" type="email" id="floatingInput2" placeholder="name@example.com" autocomplete="off">
                                <label for="floatingInput2">Email</label>
                            </div>
                            <!--fin de email-->
                            <!--password-->
                            <div class="form-floating ms-4 me-4 mt-3">
                                <input class="form-control" name="password" type="password" id="floatingInput3" placeholder="paswword" autocomplete="off">
                                <label for="floatingInput3">Contraseña</label>
                            </div>
                            <!--fin de password-->
                            <!--input submit-->
                                <input class="btn btn-outline-success fw-bold text-uppercase mt-3 ms-4 mb-4" name="submit" type="submit" value="Ingresar" >
                            <!--fin de submit-->
                        </form>
                    </div>
<!--fin de formulario de ingresar-->
                </div>
            </div>
<!--fin de ingresar-->
        </div>
    </div>
<!--fin del menu-->
<!--footer-->
<?php include "includes/footer.php"?>
<!--fin del footer-->
<!--scripts-->
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>