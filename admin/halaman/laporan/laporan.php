
<?php
$semuaData = array();
$tanggal_mulai = "-";
$tanggal_selesai = "-";
if (isset($_POST['kirim'])) {
  $tanggal_mulai = $_POST['tanggal_mulai'];
  $tanggal_selesai = $_POST['tanggal_selesai'];

  $ambil = $con->query("SELECT * FROM tb_checkout WHERE tgl_beli BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY tgl_beli");

  while ($data = $ambil->fetch_assoc()) {
   $semuaData[] = $data;
 }
}
?>
<main>

  <div class="recent" >
    <div class="projects">
     <div class="card">
      <div class="card-header">
       <h3><i class="fa fa-bar-chart-o"></i> Data Laporan</h3>
     </div>

     <div class="card-body">
       <div class="table-responsive">
        <form method="POST">
          <input type="date" name="tanggal_mulai" style="border-radius: 5px; outline: none; border: 1 solid black; padding: 5px;">
          <input type="date" name="tanggal_selesai" style="border-radius: 5px; outline: none; border: 1 solid black; padding: 5px;">
          <button type="submit" class="btn-primary" name="kirim">
            Lihat
          </button>
        </form>
        <br>
        <table width="100%" id="data">
         <thead>
          <tr>
           <td width="10%">No.</td>
           <td width="30%">Nama Pemesan</td>
           <td width="40%">Tanggal</td>
           <td width="30%">Jumlah</td>
         </tr>
       </thead>
       <tbody>

        <?php 
        $no = 0;
        $total = 0;
        ?>
        <?php foreach ($semuaData as $key => $value) : ?>
          <?php $total+=$value['total_belanja']; ?>
          <tr>
            <td class="text-center"><?php echo ++$no ?>.</td>
            <td><?php echo $value['nama_pemesan']; ?></td>
            <td class="text-center"><?php echo $value['tgl_beli']; ?></td>
            <td class="text-center">Rp. <?php echo number_format($value['total_belanja']); ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="text-center"><b>Total :</b></td>
          <td class="text-center">Rp. <?php echo number_format($total); ?></td>
          <td></td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</div>
</div>				
</div>

</main>