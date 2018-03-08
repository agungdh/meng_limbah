<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH SUB LIMBAH</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('sublimbah/aksi_ubah'); ?>"> <div class="box-body">

    <div class="form-group">
      <label for="kode">Kode : <?php echo $data['limbah']->kode; ?></label>
      <br>
      <label for="limbah">Limbah : <?php echo $data['limbah']->limbah; ?></label>
      <br>
      <label for="jenis">Jenis : <?php echo $data['limbah']->jenis; ?></label>
      <br>
      <label for="golongan">Golongan : <?php echo $data['limbah']->golongan; ?></label>
      <br>
      <label for="masa_berlaku_hari">Masa Berlaku : <?php echo $data['limbah']->masa_berlaku_hari; ?> Hari</label>
    </div>

    <input type="hidden" name="data[id]" value="<?php echo $data['sublimbah']->id; ?>">

     <div class="form-group">
      <label for="sublimbah">Sub Limbah</label>
          <input value="<?php echo $data['sublimbah']->sub_limbah; ?>" required type="text" class="form-control" id="sublimbah" placeholder="Isi Sub Limbah" name="data[sub_limbah]">          
    </div>


    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('sublimbah/index/' . $data['limbah']->id); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>