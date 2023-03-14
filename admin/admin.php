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
<!--item 1 del acordion-->
                <div class="accordion-item">
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
                                <a class="list-group-item list-group-action bg-dark border-dark text-white active" aria-current="true" href="admin.php">Nuevo Producto</a>
                            </div>
                            <div class="list-group mt-1 ms-1 me-2">
                                <a class="list-group-item list-group-action bg-light" aria-current="true" href="almacen.php">Almacen</a>
                            </div>
                            <div class="list-group mt-1 ms-1 me-2 pb-1">
                                <a class="list-group-item list-group-action bg-light text-capitalize" aria-current="true" href="Nueva_adicionales.php">tematica/categoria</a>
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
                            <div class="list-group  ms-1 me-2 mt-1">
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
<!--fin del item 2 acordion 2-->
            </div>
<!--fin del grupo de acordion 2-->
            </aside>
<!--find el aside-->
<!--contenedor-->
            <div class="col-md-9 border">
                <h1 class="text-center">Nuevo Producto</h1>
<!--traer el ultimo id insertado en el almecen-->
                <?php
                    $id_almacen="SELECT * FROM almacen WHERE id_producto = (SELECT MAX(id_producto) FROM almacen)";
                    $resultado_id_almacen=mysqli_query($conn,$id_almacen);

                    if(mysqli_num_rows($resultado_id_almacen)>0){
                        $rows=$resultado_id_almacen->fetch_array(MYSQLI_ASSOC);
                        //agregamos a las variables
                        $id_nuevo_producto=$rows['id_producto'];
                        $cantidad_nuevo_producto=$rows['cantidad'];
                    }
                ?>
<!--fin de traer el ultimo id insertado en el almecen-->
<!--insert de producto-->
                <?php
                    if(isset($_POST['submit'])){
                    //creamos variables
                        $nombre_producto=$_POST['nombre_producto'];
                        $descripcion_producto=$_POST['descripcion_producto'];
                        $precio_producto=$_POST['precio_producto'];
                        $_FILES['img_producto'] ['tmp_name'];
                        $categoria_producto=$_POST['categoria_producto'];
                        $tematica_producto=$_POST['tematica_producto'];
                        $cantidad_producto=$_POST['cantidad_producto'];
                    //creamos la variable de la imagen
                        if(move_uploaded_file($_FILES['img_producto'] ['tmp_name'], '../productos/'.$_FILES['img_producto'] ['name'])){
                            $url='productos/'.$_FILES['img_producto'] ['name'];
                        }else{
                            echo "error al subir la imagen";
                        }
                    //fin de la variable imagen
                        $consulta3="INSERT INTO productos (nombre, informacion, precio, imagen, categoria, tematica) VALUES ('$nombre_producto', '$descripcion_producto', '$precio_producto', '$url','$categoria_producto', '$tematica_producto')";
                        $resultado3=mysqli_query($conn,$consulta3);
                    //comprobar si se ejecuto correctamente
                        if($consulta3){
                    //cerramos para crear html
                        ?>
                            <h1 class="text-center text-white bg-success pb-2"><strong>¡Se ha agregado correctamente!</strong></h1>
                            <!--agregar al almacen-->
                                <?php
                                    $lastid=mysqli_insert_id($conn);
                                    $consulta4="INSERT INTO almacen (id_producto, cantidad) VALUES ('$lastid', '$cantidad_producto')";
                                    $resultado4=mysqli_query($conn, $consulta4);
                                ?>
                            <!--fin de agregar al almacen-->
                    <!--continuamos con php-->
                        <?php  
                        }else{
                    //cerramos para crear html
                        ?>
                            <h1 class="text-center text-white bg-danger pb-2"><strong>¡No se ha podido subir!</strong></h1>
                    <!--continuamos con php-->
                        <?php  
                        }
                    }
                ?>
<!--formulario-->
                <form class="needs-validation" method="POST" enctype="multipart/form-data">
                    <label for="">Nombre Producto:</label>
                    <div class="form-floating">
                        <input class="form-control" type="text" name="nombre_producto" id="floatingInput-Nombre" placeholder="Nombre" required>
                        <label class="text-dark" for="floatingInput-Nombre">Nombre del Producto:</label>
                    </div>
                    <label class="mt-3" for="">Descripcion</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="descripcion_producto" id="validationTextarea" placeholder="Required example textarea" rows="2" required></textarea>
                        <label for="validationTextarea">Descripcion del producto:</label>
                    </div>
                    <label class="mt-3" for="">Precio:</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">$</span>
                        <div class="form-floating">
                        <input class="form-control" type="number" name="precio_producto" id="floatingInput-Precio" placeholder="$00.000" required>
                        <label for="floatingInput-Precio">Precio del producto:</label>
                        </div><span class="input-group-text pe-4" id="basic-addon1">.000</span>
                    </div>
                    <label class="mt-3" for="">Imagen: </label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="img_producto" id="inputGroupFile" required>
                        <label class="input-group-text" for="inputGroupFile"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2z"/>
                        </svg></label>
                    </div>
                    <label class="mt-3" for="">Categoria: </label>
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect-Categoria">Selecciona</label>
                        <select class="form-select text-capitalize" name="categoria_producto" id="inputGroupSelect-Categoria" required>
<!--consulta a la base de datos 1-->
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
                    </div>
                    <label class="mt-3" for="">Tematica: </label>
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelect-Tematica">Selecciona</label>
<!--consulta a la base de datos 2-->   
                           <?php
                            $consulta2="SELECT * FROM tematica ORDER BY tematica.nombre_tematica ASC";
                            $resultado2=mysqli_query($conn,$consulta2);
                           ?> 
                        <select class="form-select text-capitalize" name="tematica_producto" id="inputGroupSelect-tematica" required>
                                <?php foreach($resultado2 as $datos2):
                                //cerramos php
                                ?>
                            <option class="text-capitalize" value="<?php echo $datos2['id_tematica']?>"><?php echo $datos2['nombre_tematica']?></option>
                                <?php endforeach?>
<!--end foreach-->
                        </select>
                    </div>
                    <label for="">Cantidad: </label>
                    <div class="form-floating">
                        <input class="form-control" type="number" name="cantidad_producto" id="floatingInput-cantidad" placeholder="cantidad:" required>
                        <label class="text-dark" for="floatingInput-cantidad">Cantidad: </label>
                    </div>
<!--submit-->
                    <input name="submit" class="btn btn-secondary mt-3 btn-lg mb-4" type="submit" value="Agregar">
                </form>
            </div>
<!--fin del contenedor-->
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