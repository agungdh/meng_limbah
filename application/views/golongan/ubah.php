<?php
// var_dump($data[$modul]); exit();
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH <?php echo strtoupper($modul); ?></font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('universal/' . "aksi_ubah/" . $modul); ?>">
    <div class="box-body">

    <input type="hidden" name="data['id']" value="<?php echo $data[$modul]->id; ?>">

    <div class="form-group">
      <label for="golongan">Golongan</label>
          <input value="<?php echo $data[$modul]->golongan; ?>" required type="number" class="form-control" id="golongan" placeholder="Isi Golongan" name="data[golongan]">          
    </div>

    <div class="form-group">
      <label for="masa_berlaku_hari">Masa Berlaku Hari</label>
          <input value="<?php echo $data[$modul]->masa_berlaku_hari; ?>" required type="number" class="form-control" id="masa_berlaku_hari" placeholder="Isi Masa Berlaku Hari" name="data[masa_berlaku_hari]">          
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