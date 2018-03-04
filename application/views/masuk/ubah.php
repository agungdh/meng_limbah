<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('user/aksi_ubah'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['user']->id; ?>">

    <div class="form-group">
      <label for="username">Username</label>
          <input readonly value="<?php echo $data['user']->username; ?>" required type="text" class="form-control" id="username" placeholder="Isi Username" name="username">          
    </div>

    <?php
    switch ($data['user']->level) {
      case 1:
        $level = "Administrator";
        break;

      case 2:
        $level = "Universitas";
        break;

      case 3:
        $level = "Program Studi";
        break;
      
      default:
        $level = "ERROR !!!";
        break;
    }
    
    $prodi = $this->m_user->ambil_prodi_dari_id_user($data['user']->id) == null ? null : $this->m_user->ambil_prodi_dari_id_user($data['user']->id)->nama;
    ?>

    <div class="form-group">
      <label for="level">Level</label>
          <input readonly value="<?php echo $level; ?>" required type="text" class="form-control" id="level" placeholder="Isi Level" name="level">          
    </div>

    <div class="form-group">
      <label for="prodi">Prodi</label>
          <input readonly value="<?php echo $prodi; ?>" required type="text" class="form-control" id="prodi" name="prodi">          
    </div>

    <div class="form-group">
      <label for="password">Password</label>
          <input required type="password" class="form-control" id="password" placeholder="Isi Password" name="password">          
    </div>

    <div class="form-group">
      <label for="password2">Ulangi Password</label>
          <input required type="password" class="form-control" id="password2" placeholder="Isi Ulangi Password" name="password2">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$('#form').submit(function() 
{
    if ($("#password").val() != $("#password2").val()) {
        alert('Password Tidak Sama !!');
    return false;
    }
});

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