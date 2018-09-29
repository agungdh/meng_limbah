<?php 
// var_dump($data['versi_borang']);
// exit();
$modul_custom = 'sifat';
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH <?php echo strtoupper($modul_custom); ?></font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('universal/' . "aksi_ubah/" . $modul); ?>">
    <div class="box-body">

    <input type="hidden" name="data['id']" value="<?php echo $data[$modul]->id; ?>">

    <div class="form-group">
      <label for="sifat">Sifat</label>
          <input value="<?php echo $data[$modul]->sifat; ?>" required type="text" class="form-control" id="sifat" placeholder="Isi Sifat" name="data[sifat]">          
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