<?php
include_once("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programacion web PHP</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--Iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
    <nav class="navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">CRUD PHP</a>
        </div>
    </nav>

    <div class="container p-4">

        <div class="row">

        <div class="col-md-4">

            <?php if(isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">   
                <?=$_SESSION['mensaje']?>            
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control my-3" placeholder="Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control my-3" placeholder="Descripción de la tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="guardar_tarea" value="Guardar tarea">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $query = "SELECT * FROM tareas";
                      $resultado_tarea = mysqli_query($conn, $query);  

                      while($row = mysqli_fetch_array($resultado_tarea)){ ?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['fecha de creacion']?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']?>" clasas="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="borrar.php?id=<?php echo $row['id']?>" clasas="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>  

    </div>
    




    <!--Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
</body>
</html>