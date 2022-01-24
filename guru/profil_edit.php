<?php 
session_start();
if($_SESSION['id_level']==2){
  if (empty($_SESSION['username'])){
    echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";	
  } else {
    include "../koneksi.php";
  }
}else{
  echo "<script>alert('Anda tidak memiliki hak akses.'); window.location=history.go(-1)</script>";	
}
?>
<!--HALAMAN PANEL DAN MENU-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--meta name="description" content="Aplikasi Penggajian Karyawan"-->
    <meta name="description" content="Sistem Informasi Manajemen Guru">
    <meta name="author" content="Hakko Bio Richard">

    <title>Sistem Informasi Manajemen Gaji Guru</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <script type="text/javascript">
    // 1 detik = 1000
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal
            .getSeconds();
    }
    </script>
    <script language="JavaScript">
    var tanggallengkap = new String();
    var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
    namahari = namahari.split(" ");
    var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
    namabulan = namabulan.split(" ");
    var tgl = new Date();
    var hari = tgl.getDay();
    var tanggal = tgl.getDate();
    var bulan = tgl.getMonth();
    var tahun = tgl.getFullYear();
    tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;

    var popupWindow = null;

    function centeredPopup(url, winName, w, h, scroll) {
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' +
            scroll + ',resizable'
        popupWindow = window.open(url, winName, settings)
    }
    </script>

</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sistem Informasi Manajemen Gaji Guru</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active"><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                    <li><a href="gaji.php"><i class="fa fa-money"></i> Gaji</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
                            <?php
                            $query = mysqli_query($koneksi, "SELECT USERNAME, NAMA_GURU FROM user natural join guru WHERE USERNAME='$_SESSION[username]'");
                            $data  = mysqli_fetch_array($query);
                            echo $data['NAMA_GURU'];
                            //echo $_SESSION['username'];
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');">
                                <i class="fa fa-power-off"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <?php
        $timeout = 10; // Set timeout minutes
        $logout_redirect_url = "../index.html"; // Set logout URL

        $timeout = $timeout * 60; // Converts minutes to seconds
        if (isset($_SESSION['start_time'])) {
            $elapsed_time = time() - $_SESSION['start_time'];
            if ($elapsed_time >= $timeout) {
                session_destroy();
                echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
            }
        }
        $_SESSION['start_time'] = time();
        ?>
        <!--PEMISAH HALAMAN PANEL DAN MENU-->
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <table align="center">
              <tr>
                <td>
                  <h1><img class="img-rounded" src="../image/ma.png" alt="MA An-Nur" width="57" height="65"></h1>
                </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                  <h2>Madrasah Aliyah An-Nur<br/>
                  <small>Kembang Jeruk Banyuates Sampang</small></h2>
                </td>
              </tr>
            </table>
            <ol class="breadcrumb">
                <li class="active">
                    <table>
                        <tr>
                            <td><i class="fa fa-edit"></i> Edit Data Guru</td>
                            <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                            <td>
                                <div class="Tanggal">
                                    <script language="JavaScript">document.write(tanggallengkap);</script>
                                </div>
                            </td>
                            <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                            <td>
                                <div id="output" class="jam"></div>
                            </td>
                        </tr>
                    </table>
                </li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Anda Berada di Halaman Edit Data Guru...!!!
              </div>
          </div><!-- /.row -->
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-edit"></i> Edit Data Guru </h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE ID_GURU='$_GET[kd]'");
                  $data  = mysqli_fetch_array($query);
                  ?>
                  <form action="profil_update.php" method="post">
                    <table class="table table-condensed">
                      <input name="ID_GURU" type="hidden" class="form-control" id="ID_GURU" value="<?php echo $data['ID_GURU'];?>" readonly="readonly"/>
                      <tr>
                        <td><label for="NAMA_GURU">Nama</label></td>
                        <td><input name="NAMA_GURU" type="text" class="form-control" id="NAMA_GURU" value="<?php echo $data['NAMA_GURU'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><label for="NUPTK">NUPTK</label></td>
                        <td><input name="NUPTK" type="text" class="form-control" id="NUPTK" value="<?php echo $data['NUPTK'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><label for="TEMPAT_LAHIR">Tempat Lahir</label></td>
                        <td><input name="TEMPAT_LAHIR" type="text" class="form-control" id="TEMPAT_LAHIR" value="<?php echo $data['TEMPAT_LAHIR'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><label for="TANGGAL_LAHIR">Tanggal Lahir</label></td>
                        <td><input name="TANGGAL_LAHIR" type="date" class="form-control" id="TANGGAL_LAHIR" value="<?php echo $data['TANGGAL_LAHIR'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><label for="JENIS_KELAMIN">Jenis Kelamin</label></td>
                        <td>
                        <input type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN"
                          <?php if (isset($data['JENIS_KELAMIN']) && $data['JENIS_KELAMIN']=="L") echo "checked";?>
                          value="L"> Laki-Laki &nbsp;
                        <input type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN"
                          <?php if (isset($data['JENIS_KELAMIN']) && $data['JENIS_KELAMIN']=="P") echo "checked";?>
                          value="P"> Perempuan
                      </td>  
                      </tr>
                      <tr>
                        <td><label for="JENJANG">Jenjang</label></td>
                        <td><input name="JENJANG" type="text" class="form-control" id="JENJANG" value="<?php echo $data['JENJANG'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><label for="PRODI">PRODI</label></td>
                        <td><input name="PRODI" type="text" class="form-control" id="PRODI" value="<?php echo $data['PRODI'];?>" required/></td>
                      </tr>
                    </table>
                    <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="profil.php" class="btn btn-sm btn-primary">Kembali</a></td>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row --> 
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
  </body>
</html>
