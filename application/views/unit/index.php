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
             <h3><strong><font color=blue>DATA <?php echo strtoupper($modul); ?> LIMBAH B3</font></strong><br/><br>
           </center>
         </div>
       </div><br/>
    </div>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      
      <a href='<?php echo base_url('universal/' . "tambah/" . $modul); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> <?php echo ucwords($modul); ?></button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>UNIT</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data[$modul] as $item) {
          ?>
          <tr>
            <th><?php echo $item->unit; ?></th>
              <th>
                <a data-toggle="tooltip" title="Edit" class="btn btn-info" href="<?php echo base_url('universal/' . "ubah/" . $modul . '/' . $item->id); ?>"><i class="fa fa-pencil"></i> </a>
                <a data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i> </a>
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
    window.location = "<?php echo base_url('universal/' . "aksi_hapus/" . $modul . '/'); ?>" + id;
  });
}
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>