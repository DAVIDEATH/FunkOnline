<?php session_start(); 
include_once "includes/conexion.php";
if(!isset($_SESSION['correo'])){
        
}else{
    $login=$_SESSION['correo'];
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
                        <l1 class="nav-item active"><a class="nav-link active" href="index.php">Inicio</a></l1>
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
<!--logo-->
    <div class="row col-md-12">
            <img class="mx-auto d-block col-md-5" src="img/logo.png" alt="">
    </div>
<!--productos-->
    <div class="container p-1 mt-4">
        <div class="row col-md-12 m-0 p-1">
            <div class="col-md-7">
            <nav id="navbar-example2">
                <a id="navbar-example2" href="#navbar-example2">
                    <img class="img-fluid" src="img/inicio.PNG" alt="...">
                </a>
            </nav>
            </div>
            <div class="col-md-5 pt-2 p-1">
                <img class="img-fluid" src="img/aside1.PNG" alt="...">
                <nav id="navbar-example">
                    <a id="navbar-example" href="#navbar-example">
                        <img class="img-fluid" src="img/aside2.PNG" alt="...">
                    </a>
                </nav>
            </div>
        </div>
    </div>
<!--lo mas nuevo-->
<!--titulo-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
            <div class="col-md-4" data-bs-spy="scroll" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
                <h1 id="#loNuevo" class="text-center text-uppercase">Lo mas nuevo</h1>
            </div>
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
        </div>
    </div>
<!--productos nuevos-->
<!--consulta para traer los productos de la base de datos-->
    <?php
        $consulta="SELECT * FROM productos ORDER BY id DESC LIMIT 3;";
        $resultado=mysqli_query($conn,$consulta);
    ?>
<!--fin consulta para traer los productos de la base de datos-->
<!--producto 1-->
    <div class="container">
        <div class="row">
<!--primer foreach-->
            <?php 
                foreach($resultado as $opciones) :
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-img">
                        <a href="producto.php ?id=<?php echo $opciones['id']?>">
                            <img class="card-img-top img-fluid" src="<?php echo $opciones['imagen']?>" alt="..." width="250" height="100">
                        </a>
                    </div>
                    <div class="card-body">
                        <a class="text-dark text-decoration-none text-capitalize" href="producto.php ?id=<?php echo $opciones['id']?>"><h5 class="card-title"><?php echo $opciones['nombre']?></h5></a>
                        <p class="card-text text-capitalize"><?php echo $opciones['informacion']?></p>
                        <h5 class="text-primary text-center">$<?php echo $opciones['precio']?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach?>
<!--fin del foreach-->
        </div>
    </div>
<!--fin de productos nuevos-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
                <div class="col-md-4" data-bs-spy="scroll" data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true">
                    <h1 id="#juegos" class="text-center text-uppercase">Video Juegos</h1>
                </div>
            <div class="col-md-4 border-3 border-success pt-2"><hr class="border border-primary border-3 opacity-75 p-0"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
<!--consulta de video juegos-->
        <?php
            $sql = "SELECT * FROM productos WHERE tematica = 119 ORDER BY id DESC LIMIT 4";
            $runsql = mysqli_query($conn, $sql);
        ?>           
<!--fin de consulta de video juegos-->
            <?php 
                foreach($runsql as $opciones2) :
            ?>
                <div class="col-md-3 mx-auto">
                    <div class="card mb-3 mx-auto">
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
    </div>
<!--footer-->
<?php include "includes/footer.php"?>
<!--fin del footer-->
<!--scripts-->
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>