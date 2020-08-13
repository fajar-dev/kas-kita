<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    die();
}
require '../koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>KAS KITA | Dashboard</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../adminlte/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../adminlte/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    <style>
      table {
  border : none;
  border-collapse: collapse;
}
td{
  padding: 5px;
  border: none;
}
input[type=text]{
  padding: 10px;
  width: 350px;
  border-style: solid;
  text-align: right;
  font-size: 16px;
}
input[type=text]:disabled{
  background-color: white;
}
.btnn {
  width: 80px;
  height: 60px;
  background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px;
    font-size: 25px;
    cursor: pointer;
}
.opr{
    background-color: #555555;
}
.clr{
  background-color: #f44336;;
}
.hsl{
  background-color: #008CBA;
}
</style>
  </head>
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
          <span class="logo-mini"><b>KAS</b></span>
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
			<li><a href="?page=masuk"><i class='fa fa-institution'></i> <span> Pemasukan</span><i class="fa fa-angle-left pull-right"></i></a> 
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
            Dashboard
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> HOME</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Main content -->
       
       <?php 
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$sql = mysqli_query($koneksi, "SELECT * FROM kas");
while($data=mysqli_fetch_assoc($sql)) {

    $jml = $data['masuk'];
    $total_masuk = $total_masuk+$jml;

    $jml_keluar = $data['keluar'];
    $total_keluar = $total_keluar+$jml_keluar;

    $total = $total_masuk-$total_keluar;
}
?>
 <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-stats-bars"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pemasukan</span>
                  <span class="info-box-number"><?php echo "Rp. " . number_format($total_masuk); ?>,-</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pengeluaran</span>
                  <span class="info-box-number"><?php echo "Rp. " . number_format($total_keluar); ?>,-</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-pie-graph"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Saldo</span>
                  <span class="info-box-number"><?php echo "Rp. " . number_format($total); ?>,-</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
            
      <div class="row">
        <div class="col-md-12">
          <div class="callout callout-info">
            <h4>Announcement!!</h4>
            <p><b>Aplikasi Kas Kita bersifat open source dan gratis. tidak dibenarkan untuk diperjual belikan !! </b><br>Developer: <a href="https://chanofficial.github.io/fajar" target="blank"> Fajar Rivaldi Chan</a> | Powered By: <a href="http://chanofficial.my.id" target="blank">chan official</a></p>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
              <table style="">
    <tr>
      <td colspan="5">
        <input type="text" disabled id="output" value="0">
      </td>
    </tr>
    <tr>
      <td><button class="btnn" onclick="btn('1')">1</button></td>
      <td><button class="btnn" onclick="btn('2')">2</button></td>
      <td><button class="btnn" onclick="btn('3')">3</button></td>
      <td><button class="btnn opr" onclick="btn_opr(1)">*</button></td>
    </tr>
    <tr>
      <td><button class="btnn" onclick="btn('4')">4</button></td>
      <td><button class="btnn" onclick="btn('5')">5</button></td>
      <td><button class="btnn" onclick="btn('6')">6</button></td>
      <td><button class="btnn opr" onclick="btn_opr(2)">/</button></td>
    </tr>
    <tr>
      <td><button class="btnn" onclick="btn('7')">7</button></td>
      <td><button class="btnn" onclick="btn('8')">8</button></td>
      <td><button class="btnn" onclick="btn('9')">9</button></td>
      <td><button class="btnn opr" onclick="btn_opr(3)">-</button></td>
    </tr>
    <tr>
      <td><button class="btnn" onclick="btn('0')">0</button></td>
      <td><button class="btnn" onclick="koma()">.</button></td>
      <td><button class="btnn clr" onclick="clr()">C</button></td>
      <td><button class="btnn opr" onclick="btn_opr(4)">+</button></td>
    </tr>
    <tr>
      <td colspan="5"><button class="btnn hsl" style="width: 100%" onclick="hitung()">=</button></td>
    </tr>
  </table>
        
        </div>
        <!-- /.col -->
         <div class="col-md-6">
         <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       <div class="row">
        <div class="col-md-12">
 <div class="box box-primary box-solid">
    <div class="box-header with-border">
          <h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <dl>
            <!--<dt>Aturan Penggunaan</dt>
                <dd>
                  <ol>
                    <li>aplikasi ini tidak untuk diperjual belikan, Tetapi anda diperbolehkan untuk mengambil keuntungan dari jasa proses instalasi, konsultasi dan lain sebagainya yang berkaitan dengan Aplikasi  <b>kas kita</b></li>
                    <li>tidak menghapus petunjuk penggunaan ini dan Tidak mengubah footer yang menunjukkan alamat website Aplikasi ini</li>
                    
                  </ol>
                </dd>-->
            <dt>FUNGSI</dt>
                <dd>
                  Aplikasi ini memiliki beberpa fungsi, antara lain:
                  <ol>
                    <li>input data pemasukan dan pengeluaran dana</li>
                    <li>list data pemasukan dan pengeluaran dana</li>
                    <li>rekapitulasi dana</li>
                  </ol>
                   <dt>Fitur Tambahan</dt>
                <dd>
                  <ol>
                    <li>kalkulator</li>
                    <li>kalender</li> 
                  </ol>
                </dd>
                <dt>catatan Penggunaan</dt>
                <dd>
                  Untuk menginput data jumlah dana yang dimasukan atau di keluarkan, tidak menggunakan tanda "." (titik) dan tidak menggunakan Rp. (contoh: "100000")
                <dt>Info</dt>
                <dd>
                  <ol>
                    <li>PHP V.7.x</li>
                    <li>Theme By: AdminLte v.2.1</li> 
                    <li>Update: 24 april 2020</li>
                  </ol>
                   Info lebih lanjut mengenai aplikasi:
                    <ul>
                        <li><a href="https://api.whatsapp.com/send?phone=62895611025559" target="blank"><i class="fa fa-whatsapp"></i> : 0895611024559</a></li>
                        <li><a href="mailto:fajarrivaldi2015@gmail.com"><i class="fa fa-envelope-o"></i> : fajarrivaldi2015@gmail.com</a></li>
                    </ul>
                    <p style="text-align: center">~<i> Fajar Rivaldi Chan </i><i class="fa fa-smile-o"></i>  ~</p>
                </dd>
            </dl>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
          <!-- /.box -->
        
    </div>
  </div>
    </section>
    <!-- /.content -->
</div>

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
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../adminlte/dist/js/app.min.js" type="text/javascript"></script>

    
    <!-- jQuery UI 1.11.1 -->
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="../adminlte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <!-- FastClick -->
    <script src='../adminlte/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../adminlte/dist/js/demo.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="../adminlte/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- Page specific script -->
    <script type="text/javascript">
      $(function () {

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
         
          
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#000"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
           <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
           <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
      <!-- kalkulator -->
        <script>
          var bil1;
var bil2;
var hasil;
var opr;
var opr_seleksi = false;
function btn(angka) {
  var display = document.getElementById("output").value;
  if (display == "0") {
    display = angka; 
  } else {
    display += angka;
  }
  document.getElementById("output").value = display;
}
 
function clr() {
  document.getElementById("output").value = "0";
  bil1 = 0;
  bil2 = 0;
  opr_seleksi = false;
}
 
function koma() {
  var display = document.getElementById("output").value;
  if (display.includes(".") == false) {
    display += ".";
  }
  document.getElementById("output").value = display;  
}
 
function btn_opr(o) {
  opr_seleksi = true;
  bil1 = parseFloat(document.getElementById("output").value);
  opr = o;
  document.getElementById("output").value = "0";
}
 
function hitung() {
  if (opr_seleksi == true) {
    bil2 = parseFloat(document.getElementById("output").value);
    switch(opr){
      case 1 :
        hasil = bil1 * bil2;
        document.getElementById("output").value = hasil;      
        break;
      case 2 :
        hasil = bil1 / bil2;
        document.getElementById("output").value = hasil;
        break;
      case 3 :
        hasil = bil1 - bil2;
        document.getElementById("output").value = hasil;
        break;
      case 4 :
        hasil = bil1 + bil2;
        document.getElementById("output").value = hasil;
        break;
    }
    opr_seleksi = false
    hasil = 0;
    bil1 = 0;
    bil2 = 0;
  }
}
        </script>
  </body>
</html>