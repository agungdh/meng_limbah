<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>E-Mail</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('email/aksi_ubah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="username">E-mail</label>
          <input value="<?php echo $data['email']->username; ?>" required type="text" class="form-control" id="username" placeholder="Isi E-mail" name="data[username]">          
    </div>

    <div class="form-group">
      <label for="password">Password</label>
          <input value="<?php echo $data['email']->password; ?>" required type="text" class="form-control" id="password" placeholder="Isi Password" name="data[password]">          
    </div>

    <div class="form-group">
      <label for="host">Host</label>
          <input value="<?php echo $data['email']->host; ?>" required type="text" class="form-control" id="host" placeholder="Isi Host" name="data[host]">          
    </div>

    <div class="form-group">
      <label for="encryption">Encryption</label>
          <input value="<?php echo $data['email']->encryption; ?>" required type="text" class="form-control" id="encryption" placeholder="Isi Encryption" name="data[encryption]">          
    </div>

    <div class="form-group">
      <label for="port">Port</label>
          <input value="<?php echo $data['email']->port; ?>" required type="text" class="form-control" id="port" placeholder="Isi Port" name="data[port]">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url(); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->