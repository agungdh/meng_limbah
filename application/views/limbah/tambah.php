<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH LIMBAH</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('limbah/aksi_tambah'); ?>"> <div class="box-body">

    <div class="form-group">
      <label for="kode">Kode</label>
          <input required type="text" class="form-control" id="kode" placeholder="Isi Kode" name="data[kode]">          
    </div>

    <div class="form-group">
      <label for="limbah">Limbah</label>
          <input required type="text" class="form-control" id="limbah" placeholder="Isi Limbah" name="data[limbah]">          
    </div>

    <div class="form-group">
      <label for="sifat">Sifat</label>
          <select id="sifat" class="form-control select2" name="data[id_sifat]">
            <?php
            foreach ($data['sifat'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->sifat; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="kategori">Kategori (Masa Penyimpanan Maksimal)</label>
          <select id="kategori" class="form-control select2" name="data[id_kategori]">
            <?php
            foreach ($data['kategori'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->kategori . ' (' . $item->masa_berlaku_hari . ' Hari)'; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('limbah'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>