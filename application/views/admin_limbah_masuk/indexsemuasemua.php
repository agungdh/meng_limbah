
<script type="text/javascript" language="javascript" >
  // var dTable;
  // $(document).ready(function() {
  //   dTable = $('#lookup').DataTable({
  //     responsive: true
  //   });
  // });
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
                      <h3><strong><font color=blue>DATA LIMBAH B3 YANG MASUK DI TPS
                      </h3></font></strong><br/><br>
                    </center>
                  </div>
                </div>
                <br/>
      
      <a href='<?php echo base_url("admin_limbah_masuk/export_semuasemua?triwulan=" . $data['triwulan'] . '&tahun=' . $data['tahun']); ?>'><button class="btn btn-primary"><i class="fa fa-upload"></i> Export Limbah</button></a>
    </div>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
       <div class="pull-right">
          <form method="get" action="<?php base_url('masuk'); ?>">
          Triwulan <input value="<?php echo $data['triwulan']; ?>" type="number" min="1" max="4" required name="triwulan">
          Tahun <input value="<?php echo $data['tahun']; ?>" type="number" min="1900" max="2900" required name="tahun">
          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Unit</th>
          <th>Limbah</th>
          <th>Foto</th>
          <th>Tanggal Masuk</th>
          <th>Sumber</th>
          <th>Jumlah (KG)</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $jumlah = 0;
      $grandtotal = 0;
      $i = 1;
      foreach ($data['masuk'] as $item) {
        ?>
        <tr>
            <td colspan="6"><center><b><?php echo $item->limbah; ?></b></center></td>
          </tr>
          <?php
          // $i = 0;
          // $last_i = 0;
          $id = 0;
          $sub_limbah = null;
          foreach ($this->m_masuk->ambil_child_limbah_semuasemua($item->id_limbah, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun']) as $item2) {
            // $i = $last_i++;
            if ($id != $item2->id_sub_limbah) {
              // $i++;
              $sub_limbah = $item2->sub_limbah;
            } else {
              // $last_i = $i;
              // $i = null;
              $sub_limbah = null;
            }
            $id = $item2->id_sub_limbah;
            $jumlah += $item2->jumlah;
            $item_jumlah = explode('.', $item2->jumlah);
            if ($item_jumlah[1] == 0) {
              $item_jumlah = $item_jumlah[0];
            } else {
              $item_jumlah = $item2->jumlah;
            }
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $this->db->get_where('unit', array('id' => $item2->id_unit))->row()->unit; ?></td>
              <td><?php echo $sub_limbah; ?></td>
              <td><img src="<?php echo file_exists('uploads/masuk/' . $item2->id_masuk) ? base_url('uploads/masuk/' . $item2->id_masuk) : base_url('assets/no-images.jpg'); ?>" style="height: 100px; width: 100px;"></td>
              <td><?php echo $this->pustaka->tanggal_indo_string($item2->tanggal); ?></td>
              <td><?php echo $item2->sumber; ?></td>
              <td><?php echo $item_jumlah; ?></td>
            </tr>
            <?php
            $i++;
          }
          ?>
          <tr>
            <td colspan="6" style="text-align: right;"><b>Total</b></td>
            <td><b><?php echo $jumlah; ?></b></td>
          </tr>
        <?php
        $grandtotal += $jumlah;
        $jumlah = 0;
      }
      ?>
      <tr>
        <td colspan="6" style="text-align: right;"><b>Grand Total</b></td>
        <td><b><?php echo $grandtotal; ?></b></td>
      </tr>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('masuk/aksi_hapus/'); ?>" + id;
  }
}
</script>
