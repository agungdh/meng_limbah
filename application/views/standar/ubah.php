<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('standar/aksi_ubah'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['data_standar']->id; ?>">

    <div class="form-group">
      <label for="versi">Versi</label>
          <input readonly value="<?php echo $data['versi']->versi . ' | ' . $data['versi']->nama . ' | ' . $data['versi']->tahun; ?>" required type="text" class="form-control" id="versi" placeholder="Isi Versi" name="versi">          
    </div>

    <div class="form-group">
      <label for="nomor">Nomor</label>
          <input value="<?php echo $data['data_standar']->nomor; ?>" required type="text" class="form-control" id="nomor" placeholder="Isi Nomor" name="nomor">          
    </div>

    <div class="form-group">
      <label for="nama">Nama</label>
          <input value="<?php echo $data['data_standar']->nama; ?>" required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('standar/index/'.$data['versi']->id); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>