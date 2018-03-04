<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('user/aksi_tambah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="username">Username</label>
          <input required type="text" class="form-control" id="username" placeholder="Isi Username" name="username">          
    </div>

    <div class="form-group">
      <label for="password">Password</label>
          <input required type="password" class="form-control" id="password" placeholder="Isi Password" name="password">          
    </div>

    <div class="form-group">
      <label for="level">Level</label>
          <select id="level" class="form-control select2" name="level">
            <option value="1">Administrator</option>
            <option value="2">Universitas</option>
            <option value="3" selected>Program Studi</option>
          </select>          
    </div>

    <div class="form-group">
      <label for="prodi">Prodi</label>
          <select id="prodi" class="form-control select2" name="prodi">
            <?php
            foreach ($data['prodi'] as $item) {
              ?>
              <option value="<?php echo $item->id_prodi; ?>"><?php echo '(' . $item->kode_fakultas . ') ' . $item->nama_fakultas . ' | (' . $item->kode_prodi . ') ' . $item->nama_prodi; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});

$("#level").change(function(){
    cek_level();
});

function cek_level() {
  if ($("#level").val() == 3) {
    status_prodi(true);
  } else {
    status_prodi(false);
  }
}

function status_prodi(status) {
  if (status == true) {
    $("#prodi").prop('disabled', false);
    $("#prodi").val($("#prodi option:first").val()).change();
  } else {
    $("#prodi").prop('disabled', true);
    $("#prodi").val(null).change();
  }
}
</script>