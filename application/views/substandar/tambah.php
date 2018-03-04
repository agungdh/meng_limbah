<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH SUBSTANDAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('substandar/aksi_tambah/'.$data['standar']->id); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="standar">Standar</label>
          <input readonly value="<?php echo $data['standar']->nomor . ' | ' . $data['standar']->nama; ?>" required type="text" class="form-control" id="standar" placeholder="Isi Standar" name="standar">          
    </div>

    <div class="form-group">
      <label for="nomor">Nomor</label>
          <input required type="text" class="form-control" id="nomor" placeholder="Isi Nomor" name="nomor">          
    </div>

    <div class="form-group">
      <label for="nama">Nama</label>
          <input required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('substandar/index/'.$data['standar']->id); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>