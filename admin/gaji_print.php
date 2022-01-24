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
            <br/>
        </div><!-- /.row -->
        <?php
        if(isset($_GET['kd'])){
          $tampil=mysqli_query($koneksi,"SELECT ID_GAJI, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL FROM guru natural join gaji WHERE ID_GAJI ='$_GET[kd]'");
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
              
            </div>
          </div>
          <?php } ?>
        </div><!-- /.row --> 
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <script>
		  window.print();
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
	
