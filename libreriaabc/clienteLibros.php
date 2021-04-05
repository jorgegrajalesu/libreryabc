<?php
 ob_start();
?>
<?php
 include_once 'admin/conexion.php';
 $conn = mysqli_connect($host, $user, $pwd, $db);

 if(isset($_SESSION['idcliente'])==false){
  header('location: index.php');
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Libros</h1>
          </div><!-- /.col -->          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">      
        <div class="row">
          <div class="col-12">
            <div class="card">
          <!--tabla para mostrar datos de usuario-->
            <table id="" class="table table-bordered table-hover">
              <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Autor</th>
                  <th>ISBN</th>
                  <th>Precio</th>
                  <th>Existencias</th>
                  <th>Descripcion</th>
                  
               </tr>
              </thead>
              <tbody>
               <?php
                 include_once "admin/conexion.php";
                 $conn=mysqli_connect($host, $user, $pwd, $db);
                 $sql="SELECT * FROM libro;";
                 $result=mysqli_query($conn,$sql);

                 //estructura bucle while
                 while ($row = mysqli_fetch_assoc($result)){

                 
               ?>
                <tr>
                  <td><?php echo $row['nombre'] ?> </td>
                  <td><?php echo $row['autor'] ?> </td>
                  <td><?php echo $row['isbn'] ?></td>
                  <td><?php echo $row['precio'] ?></td>
                  <td><?php echo $row['existencia'] ?></td>
                  <td><?php echo $row['descripcion'] ?></td>
                 
                </tr>
                <?php
                 }
                ?>
              </tbody>

            </table>
            </div>
          </div>
        </div>            
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
 ob_end_flush();
?>
