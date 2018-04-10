<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH LIMBAH MASUK</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('masuk/aksi_tambah'); ?>"> <div class="box-body">

    <div class="form-group">
      <label for="sub_limbah">Limbah</label>
          <select id="sub_limbah" class="form-control select2" name="sub_limbah">
            <?php
            foreach ($data['sub_limbah'] as $item) {
            ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->sub_limbah ; ?> (<?php echo $this->m_universal->get_id('limbah', $item->id_limbah)->kode; ?>)</option>
            <?php
            }
            ?>
          </select>        
    </div>

    <div class="form-group">
      <label for="foto">Foto</label>
          <input type="file" name="foto">          
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input required value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

      <div class="form-group">
      <label for="sumber">Sumber</label>
          <select id="sumber" class="form-control select2" name="sumber">
            <?php
            foreach ($data['sumber'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->sumber; ?></option>
              <?php
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="jumlah">Jumlah (KG)</label>
          <input required type="number" step="0.01" class="form-control" id="jumlah" placeholder="Isi Jumlah" name="jumlah">          
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