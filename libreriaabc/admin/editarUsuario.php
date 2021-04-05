<?php
   require_once('conexion.php');
   $conn =mysqli_connect($host, $user, $pwd, $db);

  if(isset($_SESSION['idusuario'])==false){
    header('location: index.php');
  }

 if(isset($_REQUEST['guardar'])){
    
     

     $nombre=mysqli_real_escape_string($conn,$_REQUEST['nombre'] ?? '');
     $email=mysqli_real_escape_string($conn,$_REQUEST['email'] ?? '');
     $pass=md5(mysqli_real_escape_string($conn,$_REQUEST['pass'] ?? ''));
     $idusuario=mysqli_real_escape_string($conn,$_REQUEST['idusuario'] ?? '');
      
       //actualizar o editar se utiliza
        $sql="UPDATE usuarios SET
        nombre='".$nombre."',email='".$email."',pass='".$pass."'
        WHERE idusuario='".$idusuario."';";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' Actualizado">';

        }else{
       ?>

         <div class="alert alert-danger" role="alert">
            Error al actualizar usuario <?php echo mysqli_error($conn); ?>
         </div>
         <?php
        }
      }
    
       //consulta a la tabla usuarios
       $idusuario = mysqli_real_escape_string($conn,$_REQUEST['idusuario']??'');
       $sql ="SELECT idusuario,nombre,email,pass FROM usuarios WHERE idusuario='".$idusuario."';";
       $result =mysqli_query($conn,$sql);
       $row=mysqli_fetch_assoc($result);


    ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuarios</h1>
          </div><!-- /.col -->          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <section class="content">      
            <div class="row">
            <div class="col-12">
                <div class="card">
               <!--editar usuario-->
                        <div class="card-body">
                            <form action="panel.php?modulo=editarUsuario" method="post" id="editarUsuario">
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Clave">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="idusuario" value="<?php echo $row['idusuario'] ?>">
                                <button type="submit" name="guardar" class="btn btn-primary">Editar Usuario</button>
                                <button type="reset"  class="btn btn-warning">Cancelar Usuario</button>
                                
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