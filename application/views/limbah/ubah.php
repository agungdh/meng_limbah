<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH LIMBAH</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('limbah/aksi_ubah'); ?>"> <div class="box-body">

    <input type="hidden" name="data[id]" value="<?php echo $data['limbah']->id; ?>">

    <div class="form-group">
      <label for="kode">Kode</label>
          <input value="<?php echo $data['limbah']->kode; ?>" required type="text" class="form-control" id="kode" placeholder="Isi Kode" name="data[kode]">          
    </div>

    <div class="form-group">
      <label for="limbah">Limbah</label>
          <input value="<?php echo $data['limbah']->limbah; ?>" required type="text" class="form-control" id="limbah" placeholder="Isi Limbah" name="data[limbah]">          
    </div>

    <div class="form-group">
      <label for="jenis">Jenis</label>
          <select id="jenis" class="form-control select2" name="data[id_jenis]">
            <?php
            foreach ($data['jenis'] as $item) {
              if ($data['limbah']->id_jenis == $item->id) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->jenis; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->jenis; ?></option>
                <?php
              }
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="golongan">Golongan (Masa Berlaku)</label>
          <select id="golongan" class="form-control select2" name="data[id_golongan]">
            <?php
            foreach ($data['golongan'] as $item) {
              if ($data['limbah']->id_golongan == $item->id) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->golongan . ' (' . $item->masa_berlaku_hari . ' Hari)'; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->golongan . ' (' . $item->masa_berlaku_hari . ' Hari)'; ?></option>
                <?php
              }
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