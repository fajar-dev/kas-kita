<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    die();
}
require '../koneksi.php';
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>KAS KITA |  Dana Masuk</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="../adminlte/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../adminlte/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>KAs</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>KAS KITA</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../foto/pass.png" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo ucwords($_SESSION['username']); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../foto/pass.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo ucwords($_SESSION['username']); ?>
                      <small>Bendahara</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="home.php"><i class='fa fa-home'></i> <span> Dashboard</span></a></li>
			<li><a href="#"><i class='fa fa-institution'></i> <span> Pemasukan</span><i class="fa fa-angle-left pull-right"></i></a> 
                <ul class="treeview-menu">
                <li class="active"><a href="dana_masuk.php"><i class="fa fa-mail-forward"></i> Dana Masuk</a></li>
                <li><a href="tambah_masuk.php"><i class="fa fa-plus-square-o"></i> Tambah Pemasukan</a></li>
                </ul>
             </li>       
            <li> <a href="#"><i class='fa fa-cart-arrow-down'></i> <span> Pengeluaran</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li class="active"><a href="dana_keluar.php"><i class="fa fa-mail-reply"></i> Dana Keluar</a></li>
                <li><a href="tambah_keluar.php"><i class="fa fa-plus-square-o"></i> Tambah Pengeluaran</a></li>
                </ul>
              </li>    
			 <li><a href="rekap.php"><i class='fa fa-pie-chart'></i> <span> Rekapitulasi Dana</span></a></li>
			<li> <a href="logout.php"><i class='fa fa-sign-out'></i> <span> Log Out</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dana Masuk
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li><a href="#"> Pemasukan</a></li>
            <li class="active"> Dana Masuk</li>
          </ol>
        </section>
        <!-- Main content -->
      

        <section class="content">
            <div class="box">
                <div class="box-header">
                  <div class="col-md-6">
                  <h3 class="box-title">Data Pemasukan</h3>
                </div>
                  <div class="col-md-6" style="text-align: right;">
                  <a href="tambah_masuk.php"><button class="btn btn.bg-olive btn-primary"><li class="fa fa-plus"></li> Tambah Data</button></a>
                </div>
                
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         <th>No.</th>
                         <th>Penanggung Jawab</th>
                         <th>Keterangan</th>
                         <th>Tanggal</th>
                         <th>Jumlah</th>
                         <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                          $no = 1;
                           $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'masuk' ");
                           while ($data = mysqli_fetch_assoc($sql)) {

                        ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['penanggung']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                        <td style="text-align: right;">
                             <?php echo number_format($data['masuk']).",-"; ?>
                         </td>
                          <td>
                             <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="hapus_masuk.php?id=<?php echo $data['id'];?>" class="btn btn-danger btn-md" title="Hapus Data"><i class="fa fa-trash"> </i></a>
                                            </td>
                      </tr>
                       <?php 
                         ini_set("display_errors","Off");
                         $total = $total+$data['masuk'];
                         } 
                        ?>
                    </tbody>
                    <tr>
                      <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Kas Masuk :</td>
                       <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                     </tr>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box --> 
        </section>

         

      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
       <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          <a href="http://chanofficial.my.id" target="blank">Chan Official</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 Kas Kita.</strong> All rights reserved.
      </footer>
      
        
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap. 3.3.2 JS -->
    <script src="../adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../adminlte/dist/js/app.min.js" type="text/javascript"></script>

    <!-- DATA TABES SCRIPT -->
    <script src="../adminlte/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../adminlte/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../adminlte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../adminlte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../adminlte/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    
  </body>
</html>