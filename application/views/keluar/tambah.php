<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH LIMBAH KELUAR</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('keluar/aksi_tambah'); ?>"> <div class="box-body">

    <div class="form-group">
      <label for="limbah">Limbah</label>
          <select id="limbah" class="form-control select2" name="limbah">
            <?php
            foreach ($data['limbah'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->limbah; ?> (<?php echo $item->kode; ?>)</option>
              <?php
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="foto">Foto Manifest</label>
          <input type="file" id="foto" name="foto">          
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input required value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

      <div class="form-group">
      <label for="pengangkut">Pengangkut</label>
          <select id="pengangkut" class="form-control select2" name="pengangkut">
            <?php
            foreach ($data['pengangkut'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->pengangkut; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="jumlah">Jumlah (KG)</label>
          <input required type="number" step="0.01" class="form-control" id="jumlah" placeholder="Isi Jumlah" name="jumlah">          
    </div>

    <div class="form-group">
      <label for="no_dokumen">NO Dokumen</label>
          <input required type="text" class="form-control" id="no_dokumen" placeholder="Isi NO Dokumen" name="no_dokumen">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('keluar'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>