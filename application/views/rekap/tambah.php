<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH USER</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('user/aksi_tambah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="nama">Nama</label>
          <input required type="text" class="form-control" id="nama" placeholder="Isi Nama" name="nama">          
    </div>

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
            <option value="2">Operator</option>
            <!-- <option value="3">Supervisor</option> -->
          </select>          
    </div>

    <div class="form-group">
      <label for="unit">Unit</label>
          <select id="unit" class="form-control select2" name="unit">
            <?php
            foreach ($data['unit'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->unit; ?></option>
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
  cek_level();
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

function status_unit(status) {
  if (status == true) {
    $("#unit").prop('disabled', false);
    $("#unit").val($("#unit option:first").val()).change();
  } else {
    $("#unit").prop('disabled', true);
    $("#unit").val(null).change();
  }
}
</script>