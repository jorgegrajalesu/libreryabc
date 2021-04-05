<?php
 ob_start();
?>

<?php
 session_start();
 //cerrar sesion
 session_regenerate_id(true);

 //recarga el id de la sesion, como un random para evitar el sucuestro de la sesion del usuario final
 if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="salir"){
   session_destroy();
   header("Location: index.php");
 }


 if(isset($_SESSION['idcliente'])==false){
   header('location: index.php');
 }

 $modulo = $_REQUEST['modulo'] ?? '';

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Libreria ABC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        
      
        <a class="nav-link text-danger"  title="Salir" href="panelCliente.php?modulo=&sesion=salir">
        <i class="fas fa-sign-out-alt"></i> 
        </a>
      
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="panelCliente.php" class="brand-link">
      <img src="admin/dist/img/logo.png" alt="Libreria ABC Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ABC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
            <i class="fas fa-book-open nav-icon"></i>
              <p>
                Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
          </li>
          
          <li class="nav-item has-treeview">
            <a href="panelCliente.php?modulo=clienteLibros" class="nav-link <?php echo ($modulo=="clienteLibros")? " active":" ";?>">
             <i class="fas fa-book nav-icon"></i>
              <p>
                Libros
                
              </p>
            </a>           
          </li><!--fin libros-->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <!--incluir archivos php-->
    <?php
     if(isset($_REQUEST['mensaje'])){
       ?>

       <div class="alert alert-primary alert-dimissible fade show float-right" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           <span class="sr-only">Close</span>
           </button>
           <?php echo $_REQUEST['mensaje'] ?>
       </div>
       <?php
     }
     
    //libros
    if($modulo=="clienteLibros"){
      include_once "clienteLibros.php";
    } 

      


    ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Jorge Grajales</a>.</strong>
   Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>

<!--validar campos vacios del form crear usuario-->
<script>
  $('#crearUsuario').submit(function()
     {
       if($('#nombre').val()=='' ||
          $('#email').val()=='' ||
          $('#pass').val()=='')
          {
            alert('Digitar los campos de Nombre, email y la clave')
            return false
          }
     })

</script>

<script>
$('#crearLibro').submit(function(){
  if($('#nombre').val()=='' || 
    $('#autor').val()=='' || 
    $('#isbn').val()=='' || 
    $('#precio').val()=='' ||
     $('#existencia').val()=='' ){ 
    alert('Digitar los campos de Nombre, Autor, ISBN, Precio y Existencias') 
    return false 
  } 
  })
  </script>

<!--confirmacion de eliminacion de usuarios-->
<script>
  $(document).ready(function(){
    $(".borrar").click(function (e){
      e.preventDefault();
      var eliminar=confirm("Desea eliminar el usuario?");
      if(eliminar==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    });
  });

</script>


<!--confirmacion de eliminacion de libro-->
<script>
  $(document).ready(function(){
    $(".borrarLibro").click(function (e){
      e.preventDefault();
      var eliminar=confirm("Desea eliminar el libro?");
      if(eliminar==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    });
  });

</script>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){setTimeout(function(){
  $(".contents").fadeOut(1500);},1000);});
</script>

</body>
</html>
<?php
 ob_end_flush();
?>
