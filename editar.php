<?php

include_once("conexion.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM tareas WHERE id = $id";
  $resultado = mysqli_query($conn, $query);
  if(mysqli_num_rows ($resultado)==1){
    $row = mysqli_fetch_array($resultado);
    $title = $row['titulo'];
    $description = $row['descripcion'];
  }
}

?>

<?php include_once("index.php") ?>


<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">      
      <div class="card card-body">      
        <h5>Actualización de datos</h5>      
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
  </div>
</div>




<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualización de datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
             <div class="form-group">
                <input type="text" name="titulo" value="<?php echo $title; ?>" class="form-control" placement="Actualizar titulo">
            </div>
            <div class="form-group">
                <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualizar descripción"><?php echo $description ?></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">        
        <button type="submit" class="btn btn-primary" name="Actualizar">Guardar</button>
      </div>
    </div>
  </div>
</div>
