<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('user/aksi_ubah'); ?>">
    <div class="box-body">

      <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">

    <div class="form-group">
      <label for="nama">Nama</label>
          <input value="<?php echo $data['user']->nama; ?>" required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="data[nama]">          
    </div>

    <div class="form-group">
      <label for="username">Username</label>
          <input value="<?php echo $data['user']->username; ?>" required type="text" class="form-control" id="username" placeholder="Isi Username" name="data[username]">          
    </div>

    <div class="form-group">
      <label for="level">Level</label>
          <select id="level" class="form-control select2" name="data[level]">
            <option <?php echo $data['user']->level == 1 ? "selected" : null ?> value="1">Administrator</option>
            <option <?php echo $data['user']->level == 2 ? "selected" : null ?> value="2">Operator</option>
            <!-- <option value="3">Supervisor</option> -->
          </select>          
    </div>

    <div class="form-group">
      <label for="unit">Unit</label>
          <select id="unit" class="form-control select2" name="data[id_unit]">
            <?php
            foreach ($data['unit'] as $item) {
              if ($item->id == $data['user']->id_unit) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->unit; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->unit; ?></option>
                <?php
              }
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

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH PASSWORD</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form_ubah_password" role="form" method="post" action="<?php echo base_url('user/aksi_ubah_password'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">

    <div class="form-group">
      <label for="password">Password</label>
          <input required type="password" class="form-control" id="password" placeholder="Isi Password" name="password">          
    </div>

    <div class="form-group">
      <label for="password_lagi">Password Lagi</label>
          <input required type="password" class="form-control" id="password_lagi" placeholder="Isi Password Lagi" name="password_lagi">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <font class="btn btn-success" onclick="ubah_password()" type="submit">Ubah Password</font>
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
// ubah user
$(function () {
  cek_level_ubah();
  $('.select2').select2()
});

$("#level").change(function(){
    cek_level();
});

function cek_level() {
  if ($("#level").val() == 2) {
    status_unit(true);
  } else {
    status_unit(false);
  }
}

function cek_level_ubah() {
  if ($("#level").val() == 2) {
    // status_unit(true);
  } else {
    status_unit(false);
  }
}

function status_unit(status) {
  if (status == true) {
    $("#unit").prop('disabled', false);
    $("#unit").val($("#unit option:first").val()).change();
  } else {
    $("#unit").prop('disabled', true);
    $("#unit").val(null).change();
  }
}

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