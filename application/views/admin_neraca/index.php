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
             <h3><strong><font color=blue>DATA NERACA LIMBAH B3 YANG ADA DI TPS<br>
             UNIT&nbsp; &nbsp; : &nbsp; <?php echo $this->db->get_where('unit', array('id' => $data['unit_id']))->row()->unit; ?></h3></font></strong><br/><br>
           </center>
         </div>
       </div><br/>
      <a href='<?php echo base_url("export/neraca"); ?>'><button class="btn btn-primary"><i class="fa fa-upload"></i> Export Neraca</button></a>
    </div>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
       <div class="pull-right">
          <form method="get" action="<?php base_url('keluar'); ?>">
          Bulan <input value="<?php echo $data['bulan']; ?>" type="number" min="1" max="12" required name="bulan">
          Tahun <input value="<?php echo $data['tahun']; ?>" type="number" min="1900" max="2900" required name="tahun">
          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Limbah</th>
          <th>Sumber</th>
          <th>Jumlah (KG) Sisa Limbah Bulan Sebelumnya</th>
          <th>Jumlah (KG) Limbah Masuk Bulan Ini</th>
          <th>Jumlah (KG) Limbah Keluar Bulan Ini</th>
          <th>Jumlah (KG) Sisa Limbah di TPS</th>
          <th>Tujuan Penyerahan Limbah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['limbah'] as $item) {
          $limbah = $item->limbah;
          $tanggal = $data['tahun'] . '-' . str_pad($data['bulan'],2,"0",STR_PAD_LEFT) . '-' . '01';
          $lalu1 = $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu($this->session->id, $item->id, $tanggal)->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu($this->session->id, $item->id, $tanggal)->total : 0;
          $lalu2 = $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu($this->session->id, $item->id, $tanggal)->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu($this->session->id, $item->id, $tanggal)->total : 0;
          $lalu = $lalu1 - $lalu2;
          $masuk = $this->m_neraca->ambil_jumlah_masuk_dari_limbah($this->session->id, $item->id, $data['bulan'], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah($this->session->id, $item->id, $data['bulan'], $data['tahun'])->total : 0;
          $keluar = $this->m_neraca->ambil_jumlah_keluar_dari_limbah($this->session->id, $item->id, $data['bulan'], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah($this->session->id, $item->id, $data['bulan'], $data['tahun'])->total : 0;
          $sisa = $lalu + $masuk - $keluar;
          $sumber = $masuk == 0 ? '-' : $this->m_neraca->ambil_masuk_dari_limbah($this->session->id, $item->id)->sumber;
          $pengangkut = $keluar == 0 ? '-' : $this->m_neraca->ambil_keluar_dari_limbah($this->session->id, $item->id)->pengangkut;
          ?>
          <tr>
            <td><?php echo $limbah; ?></td>
            <td><?php echo $sumber; ?></td>
            <td><?php echo $lalu; ?></td>
            <td><?php echo $masuk; ?></td>
            <td><?php echo $keluar; ?></td>
            <td><?php echo $sisa; ?></td>
            <td><?php echo $pengangkut; ?></td>
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
    window.location = "<?php echo base_url('keluar/aksi_hapus/'); ?>" + id;
  }
}
</script>
