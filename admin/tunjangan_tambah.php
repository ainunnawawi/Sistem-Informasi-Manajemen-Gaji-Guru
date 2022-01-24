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
                            <td><i class="fa fa-edit"></i> Tambah Tunjangan Jabatan Guru</td>
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
            Anda Berada di Halaman Tambah Tunjangan Jabatan Guru...!!!
          </div>
        </div><!-- /.row -->
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-edit"></i> Tambah Tunjangan Jabatan Guru</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <form action="tunjangan_insert.php" method="post">
                  <table class="table table-condensed">
                    <tr>
                      <td><label for="ID_GURU">Nama</label></td>
                      <td>
                          <select name="ID_GURU" id="ID_GURU" class="form-control" required>
                            <option disabled selected label="-- Pilih Guru --"></option>
                            <?php 
                            $sql=mysqli_query($koneksi,"SELECT ID_GURU, NAMA_GURU FROM guru ORDER BY NAMA_GURU");
                            while ($data_t=mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?=$data_t['ID_GURU']?>"><?=$data_t['NAMA_GURU']?></option> 
                            <?php
                            }
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="ID_JABATAN">Jabatan</label></td>
                        <td>
                          <select name="ID_JABATAN" id="ID_JABATAN" class="form-control" required>
                            <option disabled selected label="-- Pilih Jabatan --"></option>
                            <?php 
                            $sql=mysqli_query($koneksi,"SELECT ID_JABATAN, NAMA_JABATAN FROM jabatan ORDER BY NAMA_JABATAN");
                            while ($data_t=mysqli_fetch_array($sql)) {
                            ?>
                            <option value="<?=$data_t['ID_JABATAN']?>"><?=$data_t['NAMA_JABATAN']?></option> 
                            <?php
                            }
                            ?>
                          </select>
                        </td>
                      </tr>
                        <tr>
                            <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="tunjangan_tampil.php" class="btn btn-sm btn-primary">Kembali</a></td>
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
