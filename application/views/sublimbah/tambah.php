<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH SUB LIMBAH</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('sublimbah/aksi_tambah'); ?>"> <div class="box-body">

    <div class="form-group">
      <label for="kode">Kode : <?php echo $data['limbah']->kode; ?></label>
      <br>
      <label for="limbah">Limbah : <?php echo $data['limbah']->limbah; ?></label>
      <br>
      <label for="sifat">Sifat : <?php echo $data['limbah']->sifat; ?></label>
      <br>
      <label for="kategori">Kategori : <?php echo $data['limbah']->kategori; ?></label>
      <br>
      <label for="masa_berlaku_hari">Masa Berlaku : <?php echo $data['limbah']->masa_berlaku_hari; ?> Hari</label>
    </div>

    <input type="hidden" name="data[id_limbah]" value="<?php echo $data['limbah']->id; ?>">

     <div class="form-group">
      <label for="sublimbah">Sub Limbah</label>
          <input required type="text" class="form-control" id="sublimbah" placeholder="Isi Sub Limbah" name="data[sub_limbah]">          
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