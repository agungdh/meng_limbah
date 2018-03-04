<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH PENGAJUAN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('pengajuan/aksi_tambah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input required value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

    <div class="form-group">
      <label for="versi">Versi</label>
          <select id="versi" class="form-control select2" name="versi">
            <?php
            foreach ($data['versi'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->nama . ' (' . $item->tahun . ')'; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="tahun">Tahun</label>
          <input required type="number" min="1900" max="2900" class="form-control" id="tahun" placeholder="Isi Tahun" name="tahun">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('pengajuan'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>