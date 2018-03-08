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
    <h4><strong><font color=blue>DATA LIMBAH</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("limbah/tambah"); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> Limbah</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Limbah</th>
          <th>Jenis</th>
          <th>Golongan</th>
          <th>Masa Berlaku (Hari)</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['limbah'] as $item) {
          ?>
          <tr>
            <td><?php echo $item->kode; ?></td>
            <td><?php echo $item->limbah; ?></td>
            <td><?php echo $item->jenis; ?></td>
            <td><?php echo $item->golongan; ?></td>
            <td><?php echo $item->masa_berlaku_hari; ?></td>
              <td>
                <a class="btn btn-primary" href="<?php echo base_url('sublimbah/index/'.$item->id) ?>"><i class="fa fa-share"></i> Sub Limbah</a>
                <a class="btn btn-info" href="<?php echo base_url('limbah/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i> </a>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i> </a>
              </td>
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
    window.location = "<?php echo base_url('limbah/aksi_hapus/'); ?>" + id;
  }
}
</script>
