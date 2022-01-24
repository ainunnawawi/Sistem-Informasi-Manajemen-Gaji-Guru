<?php 
session_start();
if($_SESSION['id_level']==1){
  if (empty($_SESSION['username'])){
    echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";	
  } else {
    include "../koneksi.php";
    include "../admin/template.php";
  }
}else{
  echo "<script>alert('Anda tidak memiliki hak akses.'); window.location=history.go(-1)</script>";	
}
?>
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
                            <td><i class="fa fa-edit"></i> Tambah Data Guru</td>
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
            Anda Berada di Halaman Tambah Data Guru...!!!
          </div>
        </div><!-- /.row -->
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-edit"></i> Tambah Data Guru </h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <form action="guru_insert.php" method="post">
                  <table class="table table-condensed">
                    <tr>
                      <td><label for="NAMA_GURU">Nama</label></td>
                      <td><input name="NAMA_GURU" type="text" class="form-control" id="NAMA_GURU" placeholder="Nama Guru" required/></td>
                    </tr>
                    <tr>
                      <td><label for="NUPTK">NUPTK</label></td>
                      <td><input name="NUPTK" type="text" class="form-control" id="NUPTK" placeholder="NUPTK" required/></td>
                    </tr>
                    <tr>
                      <td><label for="TEMPAT_LAHIR">Tempat Lahir</label></td>
                      <td><input name="TEMPAT_LAHIR" type="text" class="form-control" id="TEMPAT_LAHIR" placeholder="Tempat Lahir" required/></td>
                    </tr>
                    <tr>
                      <td><label for="TANGGAL_LAHIR">Tanggal Lahir</label></td>
                      <td><input name="TANGGAL_LAHIR" type="date" class="form-control" id="TANGGAL_LAHIR" placeholder="Tanggal Lahir" required/></td>
                    </tr>
                    <tr>
                      <td><label for="JENIS_KELAMIN">Jenis Kelamin</label></td>
                      <td>
                        <input type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" value="L" required> Laki-Laki &nbsp;
                        <input type="radio" name="JENIS_KELAMIN" id="JENIS_KELAMIN" value="P" required> Perempuan
                      </td>
                    </tr>
                    <tr>
                      <td><label for="JENJANG">Jenjang</label></td>
                      <td><input name="JENJANG" type="text" class="form-control" id="JENJANG" placeholder="Jenjang" required/></td>
                    </tr>
                    <tr>
                      <td><label for="PRODI">PRODI</label></td>
                      <td><input name="PRODI" type="text" class="form-control" id="PRODI" placeholder="PRODI" required/></td>
                    </tr>
                    <tr>
                        <td><label for="GAJI_P">Gaji Perjam</label></td>
                        <td><input name="GAJI_P" type="number" class="form-control" id="GAJI_P" placeholder="Gaji perjam" required/></td>
                      </tr>
                    <tr>
                      <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
                      <td></td>
                    </tr>
                  </table>
                </form>
              </div>
              <!--<div class="text-right">
                <a href="#"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
              </div>-->
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
