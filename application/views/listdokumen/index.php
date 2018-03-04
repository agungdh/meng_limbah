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
    <h4><strong><font color=blue>DATA LIST DOKUMEN</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <h5><strong>
        <a href='<?php echo base_url("versi"); ?>'>
          <font color=blue>
            <u>Versi:</u>
          </a><?php echo $data['versi']->nama; ?></font>
        
        <br>
        <a href='<?php echo base_url("standar/index/".$data['standar']->versi_id); ?>'>
          <font color=black>
            <u>Standar:</u>
          </a><?php echo $data['standar']->nomor . ' ' . $data['standar']->nama; ?></font>
        
        <br>
        <a href='<?php echo base_url("substandar/index/".$data['substandar']->standar_id); ?>'>
          <font color=blue>
            <u>Substandar:</u>
          </a><?php echo $data['substandar']->nomor . ' ' . $data['substandar']->nama; ?></font>
        
        <br>
        <a href='<?php echo base_url("butir/index/".$data['butir']->substandar_id); ?>'>
          <font color=black>
            <u>Butir:</u>
          </a><?php echo $data['butir']->nomor . ' ' . $data['butir']->nama; ?></font>
        
      </strong></h5>

      <a href='<?php echo base_url("listdokumen/tambah/".$data['butir']->id); ?>'><button class="btn btn-success "><i class="fa fa-plus"></i> List Dokumen</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>KETERANGAN</th>
                    <th>TIPE</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['listdokumen'] as $item) {
          switch ($item->tipe) {
            case 1:
              $tipe = "Dokumen Wajib";
              break;
            
            case 2:
              $tipe = "Dokumen Visitasi";
              break;
            
            case 3:
              $tipe = "Dokumen Pendukung";
              break;
            
            default:
              $tipe = null;
              break;
          }
          ?>
          <tr>
            <th><?php echo $item->keterangan; ?></th>
            <th><?php echo $tipe; ?></th>
              <th>
                <a class="btn btn-info" href="<?php echo base_url('listdokumen/ubah/'.$item->id) ?>"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i></a>
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
    window.location = "<?php echo base_url('listdokumen/aksi_hapus/'); ?>" + id;
  }
}
</script>
