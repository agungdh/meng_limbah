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
    <h4><strong><font color=blue>DATA PRODI</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      
      <h5><strong>
        <a href='<?php echo base_url("fakultas"); ?>'>
          <font color=blue>
            <u>Fakultas:</u>
          </a><?php echo $data['fakultas']->nama . ' (' . $data['fakultas']->kode . ')'; ?></font>
      </strong></h5>

      <a href='<?php echo base_url("prodi/tambah/".$data['fakultas']->id); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> Prodi</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>KODE</th>
                    <th>NAMA</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['prodi'] as $item) {
          ?>
          <tr>
            <th><?php echo $item->kode; ?></th>
            <th><?php echo $item->nama; ?></th>
              <th>
                <a class="btn btn-info" href="<?php echo base_url('prodi/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i> </a>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i> </a>
              </th>
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
    window.location = "<?php echo base_url('prodi/aksi_hapus/'); ?>" + id;
  }
}
</script>
