<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH LIMBAH KELUAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('masuk/aksi_ubah'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['masuk']->id; ?>">

    <div class="form-group">
      <label for="sub_limbah">Limbah</label>
          <select id="sub_limbah" class="form-control select2" name="sub_limbah">
            <?php
            foreach ($data['sub_limbah'] as $item) {
              if ($item->id == $data['masuk']->id_sub_limbah) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->sub_limbah; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->sub_limbah; ?></option>
                <?php
              }
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input value="<?php echo $data['masuk']->tanggal; ?>" required type="date" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

      <div class="form-group">
      <label for="sumber">Sumber</label>
          <select id="sumber" class="form-control select2" name="sumber">
            <?php
            foreach ($data['sumber'] as $item) {
              if ($item->id == $data['masuk']->id_sumber) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->sumber; ?></option>
                <?php 
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->sumber; ?></option>
                <?php 
              }
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="jumlah">Jumlah (KG)</label>
          <input step="0.01" value="<?php echo $data['masuk']->jumlah; ?>" required type="number" class="form-control" id="jumlah" placeholder="Isi Jumlah" name="jumlah">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('masuk'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>