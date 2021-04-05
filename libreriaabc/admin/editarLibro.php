<?php
  require_once('conexion.php');
  $conn =mysqli_connect($host, $user, $pwd, $db);
  
  if(isset($_SESSION['idusuario'])==false){
      header('location: index.php');
  }


 if(isset($_REQUEST['guardar'])){
    
     
     $nombre=mysqli_real_escape_string($conn,$_REQUEST['nombre'] ?? '');
     $autor=mysqli_real_escape_string($conn,$_REQUEST['autor'] ?? '');
     $isbn=mysqli_real_escape_string($conn,$_REQUEST['isbn'] ?? '');
     $precio=mysqli_real_escape_string($conn,$_REQUEST['precio'] ?? '');
     $existencia=mysqli_real_escape_string($conn,$_REQUEST['existencia'] ?? '');
     $descripcion=mysqli_real_escape_string($conn,$_REQUEST['descripcion'] ?? '');
     $idlibro=mysqli_real_escape_string($conn,$_REQUEST['idlibro'] ?? '');

        
        $sql="UPDATE libro SET
        nombre='".$nombre."',autor='".$autor."',isbn='".$isbn."',
        precio='".$precio."',existencia='".$existencia."',descripcion='".$descripcion."'
        WHERE idlibro='".$idlibro."';";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=libros&mensaje=Libro '.$nombre.' Actualizado">';

        }else{
       ?>

         <div class="alert alert-danger" role="alert">
            Error al actualizar usuario <?php echo mysqli_error($conn); ?>
         </div>
         <?php
        }
      } 
      
      //consulta a la tabla libro
      $idlibro= mysqli_real_escape_string($conn,$_REQUEST['idlibro']?? '');
      $sql = "SELECT idlibro, nombre, autor, isbn, precio, existencia, descripcion 
      FROM libro WHERE idlibro = '".$idlibro."';";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);


    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Libros</h1>
        </div><!-- /.col -->          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <section class="content">      
            <div class="row">
            <div class="col-12">
                <div class="card">
          <!--crear usuario-->
                        <div class="card-body">
                            <form action="panel.php?modulo=editarLibro" method="post" id="editarLibro">
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']?>">
                            </div>
                            <div class="form-group">
                                <label for="Autor">Autor</label>
                                <input type="text" name="autor" id="autor" class="form-control" placeholder="Autor" value="<?php echo $row['autor']?>">
                            </div>
                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN" value="<?php echo $row['isbn']?>">
                            </div>
                            <div class="form-group">
                                <label for="Precio">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" value="<?php echo $row['precio']?>">
                            </div>
                            <div class="form-group">
                                <label for="Existencia">Existencia</label>
                                <input type="text" name="existencia" id="existencia" class="form-control" placeholder="Existencia" value="<?php echo $row['existencia']?>">
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                               <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripción"><?php echo $row['descripcion']?></textarea>                           </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="idlibro" value="<?php echo $row['idlibro'] ?>"> 
                                <button type="submit" name="guardar" class="btn btn-primary">Crear Libro</button>
                                <button type="reset"  class="btn btn-danger">Cancelar Libro</button>
                                
                            </div>                
                        </form>
                    </div>

            
            </div>
          </div>
        </div>            
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->