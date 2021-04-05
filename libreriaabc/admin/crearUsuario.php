<?php
 if(isset($_REQUEST['guardar'])){
     require_once('conexion.php');
     $conn =mysqli_connect($host, $user, $pwd, $db);
     $nombre=mysqli_real_escape_string($conn,$_REQUEST['nombre'] ?? '');
     $email=mysqli_real_escape_string($conn,$_REQUEST['email'] ?? '');
     $pass=md5(mysqli_real_escape_string($conn,$_REQUEST['pass'] ?? ''));
     $veriuser="SELECT * FROM usuarios WHERE email='" .$email."';";
     $verResult=$conn->query($veriuser);
     $verRow=$verResult->num_rows;

     //para evitar injection sql 
       if ($nombre !='' && $email !='' && $verRow==null) {     
       
        $sql="INSERT INTO usuarios (nombre,email,pass) VALUES
        ('".$nombre."','".$email."','".$pass."');";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario Creado">';

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
            <h1>Crear Usuarios</h1>
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
                            <form action="panel.php?modulo=crearUsuario" method="post" id="crearUsuario">
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="Clave">Clave</label>
                                <input type="password" name="pass" id="pass" class="form-control" placeholder="Clave">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="guardar" class="btn btn-primary">Crear Usuario</button>
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