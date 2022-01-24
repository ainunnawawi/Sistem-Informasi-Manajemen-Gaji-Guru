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
                            <td><i class="fa fa-print"></i> Data Gaji Guru</td>
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
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
            <?php
              $no = 1;
              if(isset($_GET['bulan'])and($_GET['tahun'])){
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $tgl="$tahun-$bulan"?>
                    <h3 class="panel-title"><i class="fa fa-print"></i> Data Gaji Guru, <?php echo date('F Y', strtotime($tgl))?></h3> 
                  <?php }else{?>
                    <h3 class="panel-title"><i class="fa fa-print"></i> Data Gaji Guru, <?php echo date('F Y')?></h3>
                    <?php ;
                  }?>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <?php
                
                ?>
                <table class="table table-bordered table-hover table-striped tablesorter">
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>RP/JAM</th>
                    <th>JAM</th>
                    <th>TUNJANGAN</th>
                    <th>CICILAN</th>
                    <th>BAKSOS</th>
                    <th>ARISAN</th>
                    <th>GAJI</th>
                    <th>TANGGAL</th>
                    <th>AKSI</th>
                  </tr>
                  <?php 
                  if(isset($_GET['bulan'])and($_GET['tahun'])){
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $tampil = mysqli_query($koneksi,"SELECT ID_GAJI, ID_GURU, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL FROM guru natural join gaji WHERE month(TANGGAL)='$bulan' and year(TANGGAL)='$tahun' ORDER BY NAMA_GURU");
                    $total = mysqli_num_rows($tampil); 
                  }else{
                    $bulan = date('m');
                    $tahun = date('Y');
                    $tampil = mysqli_query($koneksi,"SELECT ID_GAJI, ID_GURU, NAMA_GURU, GAJI_PERJAM, TOTAL_JAM, TOTAL_TUNJANGAN, CICILAN, BAKSOS, ARISAN, TOTAL_GAJI, TANGGAL FROM guru natural join gaji WHERE month(TANGGAL)='$bulan' and year(TANGGAL)='$tahun' ORDER BY NAMA_GURU");
                    $total=mysqli_num_rows($tampil);
                  }
                  while($data=mysqli_fetch_array($tampil))
                  { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['NAMA_GURU'];?></td>
                    <td><?php echo number_format($data['GAJI_PERJAM'],2,",",".");?></td>
                    <td><?php echo number_format($data['TOTAL_JAM']);?></td>
                    <td><?php echo number_format($data['TOTAL_TUNJANGAN'],2,",",".");?></td>
                    <td><?php echo number_format($data['CICILAN'],2,",",".");?></td>
                    <td><?php echo number_format($data['BAKSOS'],2,",",".");?></td>
                    <td><?php echo number_format($data['ARISAN'],2,",",".");?></td>
                    <td><?php echo number_format($data['TOTAL_GAJI'],2,",",".");?></td>
                    <td><?php echo date('d/m/Y', strtotime($data['TANGGAL']));?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="gaji_edit.php?hal=edit&kd=<?php echo $data['ID_GAJI'];?>"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-warning" href="gaji_print.php?hal=printgaji&kd=<?php echo $data['ID_GAJI'];?>"><i class="fa fa-print"></i></a>
                      <a class="btn btn-sm btn-danger" href="gaji_hapus.php?hal=hapus&kd=<?php echo $data['ID_GAJI'];?>"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                </table>
              </div>
              <div class="text-right">
                <a href="#" class="btn btn-sm btn-warning" onclick="window.print();return false"><i class="fa fa-print"></i> Cetak Data</a>
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
