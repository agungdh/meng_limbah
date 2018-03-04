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
    <h4><strong><font color=blue>DATA USER</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      
      <a href='<?php echo base_url("user/tambah"); ?>'><button class="btn btn-success"><i class="fa fa-plus"></i> User</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>USERNAME</th>
                    <th>LEVEL</th>
                    <th>PRODI</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['user'] as $item) {
          $prodi = $this->m_user->ambil_prodi_dari_id_user($item->id) == null ? null : $this->m_user->ambil_prodi_dari_id_user($item->id)->nama;
          switch ($item->level) {
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
          ?>
          <tr>
            <th><?php echo $item->username; ?></th>
            <th><?php echo $level; ?></th>
            <th><?php echo $prodi; ?></th>
              <th>
                <a class="btn btn-info" href="<?php echo base_url('user/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i> </a>
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
    window.location = "<?php echo base_url('user/aksi_hapus/'); ?>" + id;
  }
}
</script>
