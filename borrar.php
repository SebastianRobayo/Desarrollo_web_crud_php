<?php

include_once("conexion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tareas WHERE id = $id";
    mysqli_query($conn,$query);
    /*if(!resultado){
        die("Query Fallido");
    }
*/
    $_SESSION['mensaje'] = 'Tarea eliminada correctamente';
    $_SESSION['tipo_mensaje'] = 'danger';
    header("Location: index.php");
}

?>