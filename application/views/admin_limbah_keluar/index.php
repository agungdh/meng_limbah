
<script type="text/javascript" language="javascript" >
  // var dTable;
  // $(document).ready(function() {
  //   dTable = $('#lookup').DataTable({
  //     responsive: true
  //   });
  // });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <div class="form-group">
      <a class="logo" href="<?php echo base_url('assets/logo-pln.png') ?>"></a>
                
                <div class="body">
                  <div class="col-md-2">
                  <center>
                    <img src="<?php echo base_url('assets/logo-pln.png') ?>" style="height: 150px; width: 100px;">  
                  </center>
                  </div>

                  <div class="col-md-8" >
                    <center>
                      <h3><strong><font color=blue>DATA LIMBAH B3 YANG KELUAR DARI TPS<br>
                      UNIT&nbsp; &nbsp; : &nbsp; <?php echo $this->db->get_where('unit', array('id' => $data['unit_id']))->row()->unit; ?></h3></font></strong><br/><br>
                    </center>
                  </div>
                </div>
                <br/>
      
      <a href='<?php echo base_url("admin_limbah_keluar/export/" . $data["unit_id"] . "?triwulan=" . $data['triwulan'] . '&tahun=' . $data['tahun']); ?>'><button class="btn btn-primary"><i class="fa fa-upload"></i> Export Limbah</button></a>
    </div>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
       <div class="pull-right">
          <form method="get" action="<?php base_url('keluar'); ?>">
          Triwulan <input value="<?php echo $data['triwulan']; ?>" type="number" min="1" max="4" required name="triwulan">
          Tahun <input value="<?php echo $data['tahun']; ?>" type="number" min="1900" max="2900" required name="tahun">
          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Tanggal Keluar</th>
          <th>Limbah</th>
          <th>Foto Manifest</th>
          <th>Jumlah (KG)</th>
          <th>Tujuan Penyerahan</th>
          <th>NO Dokumen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $jumlah = 0;
        foreach ($data['keluar'] as $item) {
          $jumlah += $item->jumlah;
          ?>
          <tr>
            <td><?php echo $this->pustaka->tanggal_indo_string($item->tanggal); ?></td>
            <td><?php echo $item->limbah; ?></td>
              <td><img src="<?php echo file_exists('uploads/keluar/' . $item->id_keluar) ? base_url('uploads/keluar/' . $item->id_keluar) : base_url('assets/no-images.jpg'); ?>" style="height: 100px; width: 100px;"></td>
            <td><?php echo $item->jumlah; ?></td>
            <td><?php echo 'Pengangkut ' . $item->pengangkut; ?></td>
            <td><?php echo $item->no_dokumen; ?></td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td colspan="3" style="text-align: right;"><b>Total</b></td>
          <td><b><?php echo $jumlah; ?></b></td>
        </tr>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('keluar/aksi_hapus/'); ?>" + id;
  }
}
</script>
