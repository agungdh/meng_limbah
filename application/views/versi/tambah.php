<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH VERSI</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('versi/aksi_tambah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="nama">Nama</label>
          <input required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">          
    </div>

    <div class="form-group">
      <label for="versi">Versi</label>
          <input required type="text" class="form-control" id="versi" placeholder="Isi Versi" name="versi">          
    </div>

    <div class="form-group">
      <label for="tahun">Tahun</label>
          <input required type="text" maxlength="4" class="form-control" id="tahun" placeholder="Isi Tahun" name="tahun">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('versi'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>