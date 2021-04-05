<?php
 if(isset($_REQUEST['guardar'])){
     require_once('conexion.php');
     $conn =mysqli_connect($host, $user, $pwd, $db);
     
     $nombre=mysqli_real_escape_string($conn,$_REQUEST['nombre'] ?? '');
     $autor=mysqli_real_escape_string($conn,$_REQUEST['autor'] ?? '');
     $isbn=mysqli_real_escape_string($conn,$_REQUEST['isbn'] ?? '');
     $precio=mysqli_real_escape_string($conn,$_REQUEST['precio'] ?? '');
     $existencia=mysqli_real_escape_string($conn,$_REQUEST['existencia'] ?? '');
     $descripcion=mysqli_real_escape_string($conn,$_REQUEST['descripcion'] ?? '');

     $veriuser="SELECT * FROM libro WHERE nombre='" .$nombre."' OR isbn='".$isbn."';";
     $verResult=$conn->query($veriuser);
     $verRow=$verResult->num_rows;

     //para evitar injection sql 
       if ($nombre !='' && $autor !='' && $isbn !='' &&  $precio !='' && $existencia !='' && $verRow==null) {     
       
        $sql="INSERT INTO libro(nombre,autor,isbn,precio,existencia,descripcion)
        VALUES('".$nombre."','".$autor."','".$isbn."','".$precio."','".$existencia."','".$descripcion."');";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=libros&mensaje=Libro Creado">';

        }else{
       ?>

         <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($conn); ?>
         </div>
         <?php
        }
      }
    }


    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Libros</h1>
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
                            <form action="panel.php?modulo=crearLibro" method="post" id="crearLibro">
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Autor">Autor</label>
                                <input type="text" name="autor" id="autor" class="form-control" placeholder="Autor">
                            </div>
                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN">
                            </div>
                            <div class="form-group">
                                <label for="Precio">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio">
                            </div>
                            <div class="form-group">
                                <label for="Existencia">Existencia</label>
                                <input type="text" name="existencia" id="existencia" class="form-control" placeholder="Existencia">
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripcion</label>
                               <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripción"></textarea>                           </div>
                            <div class="form-group">
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