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
    <div class="form-group">
      <a class="logo" href="<?php echo base_url('assets/logo-pln.png') ?>"></a>
                
        <div class="body">
          <div class="col-md-2">
            <center>
              <img src="<?php echo base_url('assets/logo-pln.png') ?>" style="height: 150px; width: 100px;">  
            </center>
          </div>
          <div class="col-md-8" >
            <center>
             <h3><strong><font color=blue>DATA LIMBAH B3</font></strong><br/><br>
           </center>
         </div>
       </div><br/>
    </div>
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
          <th>Sifat</th>
          <th>Kategori</th>
          <th>Masa Penyimpanan Maksimal (Hari)</th>
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
            <td><?php echo $item->sifat; ?></td>
            <td><?php echo $item->kategori; ?></td>
            <td><?php echo $item->masa_berlaku_hari; ?></td>
              <td>
                <a class="btn btn-primary" href="<?php echo base_url('sublimbah/index/'.$item->id) ?>"><i class="fa fa-share"></i> Sub Limbah</a>
                <a data-toggle="tooltip" title="Edit" class="btn btn-info" href="<?php echo base_url('limbah/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i> </a>
                <a data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i> </a>
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
  swal({
    title: "Apakah Anda Yakin?",
    text: "Data akan dihapus!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Hapus!",
    closeOnConfirm: false
  },
  function(){
    window.location = "<?php echo base_url('limbah/aksi_hapus/'); ?>" + id;
  });
}
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>