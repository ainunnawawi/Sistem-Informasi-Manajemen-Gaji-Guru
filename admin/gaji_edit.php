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
                            <td><i class="fa fa-edit"></i> Edit Data Gaji</td>
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
              Anda Berada di Halaman Edit Data Gaji...!!!
              </div>
          </div><!-- /.row -->
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-edit"></i> Edit Data Gaji </h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT ID_GAJI, ID_GURU, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL FROM guru NATURAL JOIN gaji WHERE ID_GAJI='$_GET[kd]'");
                  $data  = mysqli_fetch_array($query);
                  ?>
                  <form action="gaji_update.php" method="post">
                    <table class="table table-condensed">
                      <input name="ID_GAJI" type="hidden" class="form-control" id="ID_GAJI" value="<?php echo $data['ID_GAJI'];?>" readonly="readonly"/>
                      <tr>
                        <td><label for="NAMA_GURU">Nama</label></td>
                        <td><?php echo $data['NAMA_GURU']?></td>
                      </tr>
                      <tr>
                        <td><label for="GAJI_PERJAM">Gaji Perjam</label></td>
                        <td><input name="GAJI_PERJAM" type="text" class="form-control" id="GAJI_PERJAM" value="<?php echo $data['GAJI_PERJAM'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" readonly="readonly"/></td>
                      </tr>
                      <tr>
                        <td><label for="TOTAL_JAM">Total Jam</label></td>
                        <td><input name="TOTAL_JAM" type="text" class="form-control" id="TOTAL_JAM" value="<?php echo $data['TOTAL_JAM'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" required/></td>
                      </tr>
                      <tr>
                        <td><label for="TOTAL_TUNJANGAN">Total Tunjangan</label></td>
                        <td><input name="TOTAL_TUNJANGAN" type="text" class="form-control" id="TOTAL_TUNJANGAN" 
                        value="<?php 
                        $query_total_tunjangan= mysqli_query ($koneksi, "SELECT COALESCE(SUM(TUNJANGAN),0) as TOTAL_TUNJANGAN
                        FROM (SELECT ID_GURU, NAMA_GURU, ID_JABATAN FROM guru NATURAL JOIN tbl_tunjangan) as a 
                        NATURAL JOIN jabatan WHERE ID_GURU ='$data[ID_GURU]'");
                        $total_tunjangan = mysqli_fetch_array($query_total_tunjangan);
                        echo $total_tunjangan['TOTAL_TUNJANGAN'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" readonly="readonly"/>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="CICILAN">Cicilan</label></td>
                        <td><input name="CICILAN" type="number" class="form-control" id="CICILAN" value="<?php echo $data['CICILAN'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" required/></td>
                      </tr>
                      <tr>
                        <td><label for="BAKSOS">Baksos</label></td>
                        <td><input name="BAKSOS" type="number" class="form-control" id="BAKSOS" value="<?php echo $data['BAKSOS'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" required/></td>
                      </tr>
                      <tr>
                        <td><label for="ARISAN">Arisan</label></td>
                        <td><input name="ARISAN" type="number" class="form-control" id="ARISAN" value="<?php echo $data['ARISAN'];?>" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" onkeypress="hitung_gaji()" required/></td>
                      </tr>
                      <tr>
                        <td><label for="TOTAL_GAJI">Total Gaji</label></td>
                        <td><input name="TOTAL_GAJI" type="text" class="form-control" id="TOTAL_GAJI" value="<?php echo $data['TOTAL_GAJI'];?>" readonly="readonly"/></td>
                      </tr> 
                      <tr>
                        <td><label for="TANGGAL">Tanggal</label></td>
                        <td><input name="TANGGAL" type="date" class="form-control" id="TANGGAL" value="<?php echo $data['TANGGAL'];?>" required/></td>
                      </tr>
                      <tr>
                        <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="gaji_tampil.php" class="btn btn-sm btn-primary">Kembali</a></td>
                        <td></td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row --> 
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script>
      function hitung_gaji() {
      var a = document.getElementById('GAJI_PERJAM').value;
      var b = document.getElementById('TOTAL_JAM').value;
      var c = document.getElementById('TOTAL_TUNJANGAN').value;
      var d = document.getElementById('CICILAN').value;
      var e =document.getElementById('BAKSOS').value;
      var f =document.getElementById('ARISAN').value;
      var g = (parseInt(a) * parseInt(b)) +  parseInt(c) -  parseInt(d) -  parseInt(e) -  parseInt(f);
      if (!isNaN(g)) {
         document.getElementById('TOTAL_GAJI').value = g;
      }
      }
    </script>

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
