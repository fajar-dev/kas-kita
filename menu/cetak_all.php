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
    <title>KAS KITA |  Rekapitulasi</title>
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
  <body>
    
       <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Rekapitulasi Dana</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         <th>No.</th>
                         <th>Penanggung Jawab</th>
                         <th>Keterangan</th>
                         <th>Tanggal</th>
                         <th>jenis</th>
                         <th>masuk</th>
                         <th>keluar</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                       <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                         ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['penanggung']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                        <td><?php echo $data['jenis']; ?></td>
                        <td style="text-align: right;">
                             <?php echo number_format($data['masuk']).",-"; ?>
                         </td>
                         <td style="text-align: right;">
                             <?php echo number_format($data['keluar']).",-"; ?>
                         </td>
                         
                      </tr>
                    </tbody>
                    <tr>
                      <?php 
                                     ini_set("display_errors","Off");
                                    $total = $total+$data['masuk'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                         ?>
                      <td colspan="5" style="text-align: left; font-size: 17px; color: maroon;">Total Kas Masuk :</td>
                       <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                     </tr>
                      <tr>

                      <td colspan="6" style="text-align: left; font-size: 17px; color: maroon;">Total Kas keluar :</td>
                       <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total_keluar).",-"; ?></font></td>
                     </tr>

                      <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Saldo Akhir :</td>
                       <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></td>
                     </tr>
                  </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section>

         

     
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
    
    <script>window.print()</script>
    <script>window.location.href = "rekap.php";</script>
    
  </body>
</html>