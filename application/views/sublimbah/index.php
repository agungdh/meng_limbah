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
    <h4><strong><font color=blue>DATA SUB LIMBAH</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <h4><a href="<?php echo base_url('limbah'); ?>"><font color="black"><u>Limbah</u></font></a></h4>
      <h5><strong>
          <font color=blue>
            Kode:
          <?php echo $data['limbah']->kode; ?></font>        
        <br>
        
          <font color=black>
            Limbah:
          <?php echo $data['limbah']->limbah; ?></font>        
        <br>

          <font color=blue>
            Jenis:
          <?php echo $data['limbah']->jenis; ?></font>        
        <br>
        
          <font color=black>
            Golongan:
          <?php echo $data['limbah']->golongan; ?></font>        
        <br>

          <font color=blue>
            Masa Berlaku:
          <?php echo $data['limbah']->masa_berlaku_hari . ' Hari'; ?></font>        
        <br>
        
      </strong></h5>

      <a href='<?php echo base_url("sublimbah/tambah/" . $data['limbah']->id); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> Sub Limbah</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>SUBLIMBAH</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['sublimbah'] as $item) {
          ?>
          <tr>
            <td><?php echo $item->sub_limbah; ?></td>
              <td>
                <a class="btn btn-info" href="<?php echo base_url('sublimbah/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i> </a>
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
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    window.location = "<?php echo base_url('sublimbah/aksi_hapus/'); ?>" + id;
  });
}
</script>