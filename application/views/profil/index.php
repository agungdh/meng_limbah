<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>PROFIL</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('profil/aksi_ubah'); ?>">
    <div class="box-body">

      <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">

    <div class="form-group">
      <label for="username">Username</label>
          <input readonly value="<?php echo $data['user']->username; ?>" required type="text" class="form-control" id="username" placeholder="Isi Username" name="data[username]">          
    </div>

    <div class="form-group">
      <label for="nama">Nama</label>
          <input value="<?php echo $data['user']->nama; ?>" required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="data[nama]">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url(); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH PASSWORD</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form_ubah_password" role="form" method="post" action="<?php echo base_url('profil/aksi_ubah_password'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">

    <div class="form-group">
      <label for="password">Password</label>
          <input required type="password" class="form-control" id="password" placeholder="Isi Password" name="data[password]">          
    </div>

    <div class="form-group">
      <label for="password_lagi">Password Lagi</label>
          <input required type="password" class="form-control" id="password_lagi" placeholder="Isi Password Lagi" name="password_lagi">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <font class="btn btn-success" onclick="ubah_password()" type="submit">Ubah Password</font>
      <a href="<?php echo base_url(); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
// ganti password
function ubah_password() {
  if ($("#password").val() == "" || $("#password_lagi").val() == "") {
    swal("ERROR!!!", "Password masih kosong !!!", "error");
    return false;
  }

  if ($("#password").val() != $("#password_lagi").val()) {
    swal("ERROR!!!", "Password tidak sama !!!", "error");
    return false;
  }

  $("#form_ubah_password").submit();
}
</script>