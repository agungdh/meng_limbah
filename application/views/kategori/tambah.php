<?php 
// var_dump($data['versi_borang']);
// exit();
$modul_custom = 'kategori';
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH <?php echo strtoupper($modul_custom); ?></font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('universal/' . "aksi_tambah/" . $modul); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="kategori">Kategori</label>
          <input required type="number" class="form-control" id="kategori" placeholder="Isi Kategori" name="data[kategori]">          
    </div>

    <div class="form-group">
      <label for="masa_berlaku_hari">Masa Penyimpanan Maksimal (Hari)</label>
          <input required type="number" class="form-control" id="masa_berlaku_hari" placeholder="Isi Masa Penyimpanan Maksimal (Hari)" name="data[masa_berlaku_hari]">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('universal/' . 'index/' . $modul); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>