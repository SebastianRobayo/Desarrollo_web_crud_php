<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'crud_php'
);
/*
if(isset($conn)){
    echo 'conexión establecida';
}
else{
    echo 'error en la conexión'
}
*/
?>