<?php

include_once("conexion.php");

if(isset($_POST['guardar_tarea'])){
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];
    /*echo $title;
    echo $descripcion;*/

    $query = "INSERT INTO tareas(title,descripcion) VALUES('$title','$descripcion')";
    $resultado = mysqli_query($conn,$query);

    /*if(!$resultado){
        die("Query Fallido");
    }

    echo 'guardado';*/

    $_SESSION['mensaje'] = 'Tarea guardada correctamente';
    $_SESSION['tipo_mensaje'] = 'success';

    header("Location: index.php");
}

?>


