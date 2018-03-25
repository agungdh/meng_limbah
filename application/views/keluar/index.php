
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
                      UNIT&nbsp; &nbsp; : &nbsp; <?php echo $this->session->unit; ?></h3></font></strong><br/><br>
                    </center>
                  </div>
                </div>
                <br/>
      
      <a href='<?php echo base_url("keluar/tambah"); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> Limbah Keluar</button></a><br><br>
      <a href='<?php echo base_url("keluar/export?triwulan=" . $data['triwulan'] . '&tahun=' . $data['tahun']); ?>'><button class="btn btn-primary"><i class="fa fa-upload"></i> Export Limbah</button></a>
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
          <th>Foto</th>
          <th>Jumlah (KG)</th>
          <th>Tujuan Penyerahan</th>
          <th>NO Dokumen</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['keluar'] as $item) {
          ?>
          <tr>
            <td><?php echo $this->pustaka->tanggal_indo_string($item->tanggal); ?></td>
            <td><?php echo $item->limbah; ?></td>
            <td><img src="<?php echo base_url('uploads/keluar/' . $item->id_keluar); ?>" height="100px" width="100px"></td>
            <td><?php echo $item->jumlah; ?></td>
            <td><?php echo 'Pengangkut ' . $item->pengangkut; ?></td>
            <td><?php echo $item->no_dokumen; ?></td>
              <td>
                <a class="btn btn-info" href="<?php echo base_url('keluar/ubah/'.$item->id_keluar); ?>"><i class="fa fa-pencil"></i> </a>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id_keluar; ?>')"><i class="fa fa-trash"></i> </a>
              </td>
          </tr>
          <?php
        }
        ?>
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
