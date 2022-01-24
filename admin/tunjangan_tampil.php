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
                            <td><i class="fa fa-bar-chart-o"></i> Tunjangan Jabatan Guru</td>
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
            Anda Berada di Halaman Tunjangan Jabatan Guru...!!!
          </div>
        </div><!-- /.row -->
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Tunjangan Jabatan Guru</h3> 
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <?php
                $no = 1;
                $tampil=mysqli_query($koneksi,"SELECT ID_TUNJANGAN, ID_GURU, NAMA_GURU, ID_JABATAN, NAMA_JABATAN, TUNJANGAN FROM 
                (SELECT ID_TUNJANGAN, ID_GURU, NAMA_GURU, ID_JABATAN FROM guru NATURAL JOIN tbl_tunjangan) AS a NATURAL JOIN jabatan ORDER BY NAMA_GURU");
                $total=mysqli_num_rows($tampil); 
                ?>
                <table class="table table-bordered table-hover table-striped tablesorter">
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JABATAN</th>
                    <th>TUNJANGAN</th>
                    <th>AKSI</th>
                  </tr>
                  <?php while($data=mysqli_fetch_array($tampil))
                  { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['NAMA_GURU'];?></td>
                    <td><?php echo $data['NAMA_JABATAN'];?></td>
                    <td><?php echo number_format($data['TUNJANGAN'],2,",",".");?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="tunjangan_edit.php?hal=edit&kd=<?php echo $data['ID_TUNJANGAN'];?>"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href="tunjangan_hapus.php?hal=hapus&kd=<?php echo $data['ID_TUNJANGAN'];?>"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
                </table>
              </div>
              <div class="text-right">
                <a href="tunjangan_tambah.php" class="btn btn-sm btn-primary">Tambah Tunjangan Jabatan Guru <i
                class="fa fa-arrow-circle-right"></i></a>
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