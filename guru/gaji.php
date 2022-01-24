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
                    <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                    <li class="active"><a href="gaji.php"><i class="fa fa-money"></i> Gaji</a></li>
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
                            <td><i class="fa fa-print"></i> Cetak Struk</td>
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
          <form method="get">
          <label>Pilih Bulan dan Tahun</label>
            <table width="900">
              <tr>
                <td width="150">
                  <?php
                  if(isset($_GET['bulan'])){
                    $bulan = $_GET['bulan'] ?>
                    <select name="bulan" id="bulan" class="form-control" required>
                    <option disabled selected label="-- Pilih Bulan --"></option>
                    <option <?php if ($bulan == 1 ) echo 'selected'?> value="01">Januari</option>
                    <option <?php if ($bulan == 2 ) echo 'selected'?> value="02">Februari</option>
                    <option <?php if ($bulan == 3 ) echo 'selected'?> value="03">Maret</option>
                    <option <?php if ($bulan == 4 ) echo 'selected'?> value="04">April</option>
                    <option <?php if ($bulan == 5 ) echo 'selected'?> value="05">Mei</option>
                    <option <?php if ($bulan == 6 ) echo 'selected'?> value="06">Juni</option>
                    <option <?php if ($bulan == 7 ) echo 'selected'?> value="07">Juli</option>
                    <option <?php if ($bulan == 8 ) echo 'selected'?> value="08">Agustus</option>
                    <option <?php if ($bulan == 9 ) echo 'selected'?> value="09">September</option>
                    <option <?php if ($bulan == 10) echo 'selected'?> value="10">Oktober</option>
                    <option <?php if ($bulan == 11) echo 'selected'?> value="11">November</option>
                    <option <?php if ($bulan == 12) echo 'selected'?> value="12">Desember</option>
                  </select>
                  <?php }else{ ?>
                    <select name="bulan" id="bulan" class="form-control" required>
                    <option disabled selected label="-- Pilih Bulan --"></option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                  <?php } ?>
                </td> 
                <td width="10"></td>
                <td width="100">
                <?php
                if(isset($_GET['tahun'])){
                    $tahun = $_GET['tahun'] ?>
                  <input type="number" name="tahun" id="tahun" class="form-control" value="<?php  echo $tahun ?>" placeholder="Tahun" required/>
                  <?php }else{ ?>
                    <input type="number" name="tahun" id="tahun" class="form-control" value="<?php  echo date('Y') ?>" placeholder="Tahun" required/>
                  <?php } ?>
                </td>
                <td width="10"></td>
                <td>
                  <input type="submit" value="Filter" class="btn btn-sm btn-primary"/>
                </td>
              </tr>
            </table>
          </form>
          </div>
        </div><!-- /.row -->
        <?php
          if(isset($_GET['bulan'])and($_GET['tahun'])){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $tampil=mysqli_query($koneksi,"select ID_GAJI, ID_GURU, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL from guru  NATURAL JOIN gaji  WHERE ID_GURU='$_SESSION[id_guru]'and month(TANGGAL)='$bulan' and year(TANGGAL)='$tahun'");
            $total=mysqli_num_rows($tampil);
          }else{
            $bulan = date('m');
            $tahun = date('Y');
            $tampil=mysqli_query($koneksi,"select ID_GAJI, ID_GURU, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL from guru  NATURAL JOIN gaji  WHERE ID_GURU='$_SESSION[id_guru]'and month(TANGGAL)='$bulan' and year(TANGGAL)='$tahun'");
            $total=mysqli_num_rows($tampil);
          }
        ?>
        <?php while($data=mysqli_fetch_array($tampil))
        { ?>
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title" ><i class="fa fa-print"></i> Struk Gaji Guru</h3> 
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-condensed table-hover table-striped tablesorter">
                  <tr>
                    <td><label>Nama</label></td>
                    <td>:</td>
                    <td><?php echo $data['NAMA_GURU']; ?></td>
                  </tr>
                  <tr>
                    <td><label>Gaji Perjam</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['GAJI_PERJAM'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Total Jam</label></td>
                    <td>:</td>
                    <td><?php echo $data['TOTAL_JAM']?>.Jam</td>
                  </tr>
                  <tr>
                    <td><label>Total Tunjangan</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['TOTAL_TUNJANGAN'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Cicilan</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['CICILAN'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Baksos</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['BAKSOS'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Arisan</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['ARISAN'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Total Gaji</label></td>
                    <td>:</td>
                    <td><?php echo number_format($data['TOTAL_GAJI'],2,",",".");?></td>
                  </tr>
                  <tr>
                    <td><label>Tanggal</label></td>
                    <td>:</td>
                    <td><?php echo date('d/m/Y', strtotime($data['TANGGAL']));?></td>
                  </tr>
                  <tr>
                      <td>
                      </td>
                    <td></td>
                      <td>
                        <div class="text-Left">
                        <label>Diterima Oleh,</label>
                        <br />
                        <br />
                        <br />
                        <br />
                        <label><?php echo $data['NAMA_GURU'];?></label>
                      </td>
                    </tr>
                  </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="gaji_pdf.php?hal=printgaji&kd=<?php echo $data['ID_GAJI'];?>" class="btn btn-xs btn-warning">Cetak  <i class="fa fa-print"></i></a>
                </div>
              </div> 
            </div>
          </div>
          <?php } ?>
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