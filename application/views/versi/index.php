<?php 
// var_dump($data['versi_borang']);
// exit();
?>
<script type="text/javascript" language="javascript" >
  var dTable;
  $(document).ready(function() {
    dTable = $('#lookup').DataTable({
      responsive: true
    });
  });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA VERSI</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("versi/tambah"); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> Versi</button></a><br><br>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>NAMA</th>
                    <th>VERSI</th>
                    <th>TAHUN</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['versi'] as $item) {
          ?>
          <tr>
            <th><?php echo $item->nama; ?></th>
            <th><?php echo $item->versi; ?></th>
            <th><?php echo $item->tahun; ?></th>
              <th><center>
                <a class="btn btn-primary" href="<?php echo base_url('standar/index/'.$item->id) ?>"><i class="fa fa-share"></i> Standar</a>
                <a class="btn btn-info" href="<?php echo base_url('versi/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i></a>
              </center></th>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('versi/aksi_hapus/'); ?>" + id;
  }
}
</script>
