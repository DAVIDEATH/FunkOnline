<?php session_start();
    include_once "../includes/conexion.php";
    $login=$_SESSION['correo'];
    if(!isset($login) or isset($_SESSION['rango'])>1){
        header("location:../index.php");
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
    <title>FunkOnline</title>
</head>
<body>
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
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../carrito_deseado/deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../carrito_deseado/carrito.php">
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
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../carrito_deseado/deseado.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>    
                                    Lista de deseos</a></l1>
                                    <l1 class="nav-item"><a class="nav-link text-capitalize " href="../carrito_deseado/carrito.php">
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
    <div class="container-fluid">
        <div class="row">
<!--aside-->
<aside class="aside col-md-3 bg-light pb-5">
                <a class="navbar-brand ps-5 text-center" href="../index.php"><h2><strong class="text-center">FunkOnline</strong></h2></a>
                <h3 class="text-center mt-4 pb-0 mb-0"><strong>Bienvenido:</strong></h3>
                <h4 class="text-center"><?php echo $_SESSION['username']?></h4>
<!--grupo de acordion-->
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
<!--item 1 del acordion-->
<!--titulo de acordion1-->
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button text-dark fw-bold text-uppercase mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Productos
                        </button>
                    </h2>
<!--fin titulo de acordion1-->
                    <div class="accordion-collapse collapse show accordion-dark" id="panelsStayOpen-collapseOne" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="acordion-body">
<!--grupo de listas-->
                            <div class="list-group  ms-1 me-2">
                                <a class="list-group-item list-group-action bg-light text-capitalize" aria-current="true" href="admin.php">Nuevo Producto</a>
                            </div>
                            <div class="list-group mt-1 ms-1 me-2">
                                <a class="list-group-item list-group-action bg-light" aria-current="true" href="almacen.php">Almacen</a>
                            </div>
                            <div class="list-group mt-1 ms-1 me-2 pb-1">
                                <a class="list-group-item list-group-action bg-dark border-dark text-white active" aria-current="true" href="Nueva_adicionales.php">tematica/categoria</a>
                            </div>
<!--fin del grupo de listas-->
                        </div>
                    </div>
<!--fin de adentro del acordion-->
                </div>
<!--fin del item 1 acordion-->
<!--item 2 del acordion-->
<div class="accordion-item">
<!--titulo de acordion 2-->
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button text-dark fw-bold text-uppercase mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Usuarios
                        </button>
                    </h2>
<!--fin titulo de acordion 2-->
                    <div class="accordion-collapse collapse show accordion-dark" id="panelsStayOpen-collapseTwo" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="acordion-body">
<!--grupo de listas-->
                            <div class="list-group  ms-1 me-2">
                                <a class="list-group-item list-group-action bg-light" aria-current="true" href="editar_usuarios.php">Agregar/Editar Usuarios</a>
                            </div>
                            <div class="list-group mt-1 ms-1 me-2 pb-1">
                                <a class="list-group-item list-group-action bg-light text-capitalize" aria-current="true" href="Buscar_usuarios.php">Buscar Usuarios</a>
                            </div>
<!--fin del grupo de listas-->
                        </div>
                    </div>
<!--fin de adentro del acordion 2-->
                </div>
<!--fin del item 1 acordion 2-->
            </div>
<!--fin del grupo de acordion 2-->
            </aside>
<!--find el aside-->
<!--columna de los adicionales-->
        <div class="col-md-9">
<!--php del primer formulario-->
        <?php
            if(isset($_POST['submit'])){
                //si se agregsa solo la categoria
                if(!empty($_POST['nueva_categoria']) and empty($_POST['nueva_tematica'])){
                    $nueva_categoria=$_POST['nueva_categoria'];
                    //agregamos a la base de datos
                    $consulta="INSERT INTO categorias (nombre) VALUES ('$nueva_categoria')";
                    $resultado=mysqli_query($conn,$consulta);
                    if($resultado){
                    //cerramos php
                    ?>
                    <h1 class="text-center bg-success text-white text-capitalize pt-2"><strong class="pt-2">se ha agregado la categoria</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }else{
                        //cerramos php
                    ?>
                        <h1 class="text-center bg-danger text-white text-capitalize pt-2"><strong class="pt-2">No se ha agregado la categoria</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }
                }
                //si se agrega solo la tematica
                if(!empty($_POST['nueva_tematica']) and empty($_POST['nueva_categoria'])){
                    $nueva_tematica=$_POST['nueva_tematica'];
                    //agregamos a la base de datos
                    $consulta2="INSERT INTO tematica (nombre_tematica) VALUES ('$nueva_tematica')";
                    $resultado2=mysqli_query($conn,$consulta2);
                    if($resultado2){
                        //cerramos php
                    ?>
                        <h1 class="text-center bg-success text-white text-capitalize pt-2"><strong class="pt-2">se ha agregado la tematica</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }else{
                         //cerramos php
                    ?>
                        <h1 class="text-center bg-danger text-white text-capitalize pt-2"><strong class="pt-2">No se ha agregado la tematica</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }
                }
                //si se agregan las 2
                if(!empty($_POST['nueva_tematica']) and !empty(['nueva_categoria'])){
                    $nueva_categoria=$_POST['nueva_categoria'];
                    $nueva_tematica=$_POST['nueva_tematica'];
                    //consultas
                    $consulta="INSERT INTO categorias (nombre) VALUES ('$nueva_categoria')";
                    $resultado=mysqli_query($conn,$consulta);
                    //consultas
                    $consulta2="INSERT INTO tematica (nombre_tematica) VALUES ('$nueva_tematica')";
                    $resultado2=mysqli_query($conn,$consulta2);
                    //si se agregaron
                    if($resultado and $resultado2){
                        //cerramos php
                    ?>
                        <h1 class="text-center bg-success text-white text-capitalize pt-2"><strong class="pt-2">se ha agregado la categoria y tematica</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }else{
                         //cerramos php
                    ?>
                        <h1 class="text-center bg-danger text-white text-capitalize pt-2"><strong class="pt-2">No se ha agregado la categoria ni tematica</strong></h1>
                    <!--volvemos a php-->
                    <?php
                    }
                }
                //si esta vacio los botones
            }
        ?>
<!--fin del primer formulario-->
<!--primer formulario-->
            <form action="" method="POST">
                <h1 class="text-center text-capitalize">agregar nueva tematica/categoria</h1>
                <label for=""><strong class="fs-3 text-capitalize">agregar categoria: </strong></label>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" name="nueva_categoria" id="floatingInput-nueva_categoria" placeholder="nueva categoria">
                    <label class="text-capitalize" for="floatingInput-nueva_categoria">Nueva categoria</label>
                </div>
                <label class="fs-3 text-capitalize" for=""><strong>agregar tematica</strong></label>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" name="nueva_tematica" id="floatingInput-nueva_tematica" placeholder="nueva categoria">
                    <label class="text-capitalize" for="floatingInput-nueva_tematica">nueva tematica</label>
                </div>
                <input name="submit" class="btn btn-secondary mt-3 btn-lg mb-1" type="submit" value="Agregar">
            </form>
<!--fin del primer formulario-->
                    <!--hacemos codigo que cambie los datos-->
                        <?php
                            if(isset($_POST['button-editar_tematica'])){
                                $id=$_POST['id'];
                                $nuevo_nombre=$_POST['nuevo_nombre'];
                                //creamos codigo php
                                $consulta="UPDATE tematica SET nombre_tematica='$nuevo_nombre' WHERE id_tematica='$id'";
                                $resultado=mysqli_query($conn,$consulta);
                                if($resultado){
                                    ?>
                                    <h3 class="text-center text-capitalize bg-primary pb-1 text-white">se ha cambiado</h3>
                                    <?php
                                }
                            }

                            if(isset($_POST['button-eliminar_tematica'])){
                                $id=$_POST['id'];
                                //creamos consulta
                                $consulta="DELETE FROM tematica WHERE id_tematica='$id'";
                                $resultado=mysqli_query($conn,$consulta);
                                if($resultado){
                                    ?>
                                        <h3 class="text-center text-capitalize bg-primary pb-1 text-white">se ha eliminado</h3>
                                    <?php
                                }
                            }

                            if(isset($_POST['button-editar_categoria'])){
                                $id_categoria=$_POST['id_categoria'];
                                $nuevo_nombre_categoria=$_POST['nuevo_nombre_categoria'];
                                //creamos consulta
                                $consulta="UPDATE categorias SET nombre='$nuevo_nombre_categoria' WHERE id='$id_categoria'";
                                $resultado=mysqli_query($conn,$consulta);
                                if($resultado){
                                    ?>
                                    <h3 class="text-center text-capitalize bg-primary pb-1 text-white">se ha cambiado</h3>
                                    <?php
                                }
                            }

                            if(isset($_POST['button-eliminar_categoria'])){
                                $id_categoria=$_POST['id_categoria'];
                                $nuevo_nombre_categoria=$_POST['nuevo_nombre_categoria'];
                                //creamos consulta
                                $consulta="DELETE FROM categorias WHERE id='$id_categoria'";
                                $resultado=mysqli_query($conn,$consulta);
                                if($resultado){
                                    ?>
                                        <h3 class="text-center text-capitalize bg-primary pb-1 text-white">se ha eliminado</h3>
                                    <?php
                                }
                            }
                        ?>
                    <!--fin de cambio de datos-->
<!--codigo para editar la tematica/categoria-->
            <?php
                if(isset($_POST['submit-editar_tematica'])){
                    $editar_tematica=$_POST['editar_tematica'];
                    $pre_consulta="SELECT * FROM tematica where id_tematica ='$editar_tematica'";
                    $pre_resultado=mysqli_query($conn,$pre_consulta);
                    if(mysqli_num_rows($pre_resultado)>0){
                        $fila=mysqli_fetch_row($pre_resultado);
                        $id_tematica=$fila['0'];
                        $nombre_tematica=$fila['1'];
                    }
                //cerramos php para crear codigo html//
                    ?>
                        <div class="row mt-2 mb-3">
                            <h2 class="text-white bg-success text-center text-capitalize pb-1">tematica</h2>
                                <div class="col-md-4">
                                <form action="" method="POST">
                                    <div class="form-floating">
                                        <input class="form-control" type="number" name="id" id="floatingInput-id_tematica" placeholder="id:" value="<?php echo $id_tematica?>" required readonly>
                                        <label class="ms-2" for="floatingInput-id_tematica">Id:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input class="form-control text-capitalize" type="text" name="nuevo_nombre" id="floatingInput-nombre_tematica" placeholder="nombre: " value="<?php echo $nombre_tematica?>">
                                        <label class="ms-2" for="floatingInput-nombre_tematica">Nombre: </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <input class="btn btn-success btn-lg mt-1 text-capitalize" type="submit" name="button-editar_tematica" value="editar">
                                </div>
                                <div class="col-md-1 ms-3">
                                    <input class="btn btn-danger btn-lg mt-1 text-capitalize" type="submit" name="button-eliminar_tematica" value="eliminar">
                                </div>
                            </form>
                        </div>
                    <?php
                }
                if(isset($_POST['submit-editar_categoria'])){
                    $editar_categoria=$_POST['editar_categorias'];
                    $pre_consulta="SELECT * FROM categorias where id ='$editar_categoria'";
                    $pre_resultado=mysqli_query($conn,$pre_consulta);
                    if(mysqli_num_rows($pre_resultado)>0){
                        $filas=mysqli_fetch_row($pre_resultado);
                        $id=$filas['0'];
                        $nombre_categoria=$filas['1'];
                    }
                    //cerramos php
                    ?>
                    <div class="row mt-2 mb-3">
                        <h2 class="text-white bg-success text-center text-capitalize pb-1">categoria</h2>
                        <div class="col-md-4">
                            <form action="" method="POST">
                                <div class="form-floating">
                                    <input class="form-control text-capitalize" type="number" name="id_categoria" id="floatingInput-id" placeholder="id:" value="<?php echo $id?>" readonly>
                                    <label for="floatingInput-id">id:</label>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="nuevo_nombre_categoria" id="floatingInput-nombre_categoria" placeholder="nombre" value="<?php echo $nombre_categoria?>">
                                <label for="floatingInput-nombre_categoria">nombre: </label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-success btn-lg mt-1 text-capitalize" type="submit" name="button-editar_categoria" value="editar">
                        </div>
                        <div class="col-md-1 ms-3">
                            <input class="btn btn-danger btn-lg mt-1 text-capitalize" type="submit" name="button-eliminar_categoria" value="eliminar">
                        </div>
                            </form>
                    </div>
                    <!--continuamos con php-->
                    <?php
                }
            ?>
<!--fin para editar la tematica/categoria-->
<!--editar formulario-->
            <h1 class="text-center text-capitalize">editar tematica/categoria</h1>
            <div class="row mb-5 pb-1">
                <form action="" method="POST">
                    <label class="text-capitalize fs-4" for="">tematica: </label>
                    <div class="input-group">
                    <!--consulta-->
                        <?php
                            $consulta2="SELECT * FROM tematica ORDER BY tematica.nombre_tematica ASC";
                            $resultado2=mysqli_query($conn,$consulta2);
                        ?> 
                        <select class="form-select text-capitalize" name="editar_tematica" id="inputGroupSelect-tematica" required>
                                <?php foreach($resultado2 as $datos2):
                                //cerramos php
                                ?>
                            <option class="text-capitalize" value="<?php echo $datos2['id_tematica']?>"><?php echo $datos2['nombre_tematica']?></option>
                            <?php endforeach?>
                    <!--end foreach-->
                        </select>
                        <input class="btn btn-secondary btn-lg" type="submit" name="submit-editar_tematica" value="Siguiente">
                    </div>
                </form>

                <form action="" method="POST">
                    <label class="text-capitalize fs-4" for="">Categoria </label>
                    <div class="input-group">
                        <select class="form-select text-capitalize" name="editar_categorias" id="inputGroupSelect-tematica" required>
                            <?php
                                $consulta="SELECT * FROM categorias ORDER BY categorias.id ASC";
                                $resultado=mysqli_query($conn,$consulta);
                                ?>
                        <!--foreach-->
                                <?php
                                foreach($resultado as $datos) :
                                //cerramos php
                                ?>
                                <option class="text-capitalize" value="<?php echo $datos['id']?>"><?php echo $datos['nombre']?></option>
                                <?php endforeach?>
                        <!--end foreach-->
                        </select>
                        <input class="btn btn-secondary btn-lg" type="submit" name="submit-editar_categoria" value="Siguiente">
                    </div>
                </form>
            </div>
<!--fin de editar formulario-->
        </div>
<!--fin de la columna de los adicionales-->
        </div>
    </div>
<!--footer-->
<?php include "../includes/footer.php"?>
<!--fin del footer-->    
<!--scripts-->
<script src="js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>