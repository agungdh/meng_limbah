<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH PRODI</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('prodi/aksi_ubah'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['prodi']->id; ?>">

    <div class="form-group">
      <label for="fakultas">Fakultas</label>
          <input readonly value="<?php echo $data['fakultas']->kode_fakultas . ' | ' . $data['fakultas']->nama_fakultas; ?>" required type="text" class="form-control" id="fakultas" placeholder="Isi Fakultas" name="fakultas">          
    </div>

    <div class="form-group">
      <label for="kode">Kode</label>
          <input value="<?php echo $data['prodi']->kode; ?>" required type="text" class="form-control" id="kode" placeholder="Isi Kode" name="kode">          
    </div>

    <div class="form-group">
      <label for="nama">Nama</label>
          <input value="<?php echo $data['prodi']->nama; ?>" required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('prodi/index/'.$data['fakultas']->id_fakultas); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>