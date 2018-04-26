<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH LIMBAH KELUAR</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('keluar/aksi_ubah'); ?>" enctype="multipart/form-data"> <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['keluar']->id; ?>">

    <div class="form-group">
      <label for="limbah">Limbah</label>
          <select id="limbah" class="form-control select2" name="limbah">
            <?php
            foreach ($data['limbah'] as $item) {
              if ($item->id == $data['keluar']->id_limbah) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->limbah; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->limbah; ?></option>
                <?php                
              }
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="foto">Foto</label>
          <br>
          <img src="<?php echo file_exists('uploads/keluar/' . $data['keluar']->id) ? base_url('uploads/keluar/' . $data['keluar']->id) : base_url('assets/no-images.jpg'); ?>" height="150" width="150">
          <input type="file" name="foto">          
    </div>

    <div class="form-group">
      <label for="manifest">Manifest</label>
          <input type="file" id="manifest" name="manifest">          
    </div>


    <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input value="<?php echo $data['keluar']->tanggal; ?>" required type="date" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

      <div class="form-group">
      <label for="pengangkut">Pengangkut</label>
          <select id="pengangkut" class="form-control select2" name="pengangkut">
            <?php
            foreach ($data['pengangkut'] as $item) {
              if ($item->id == $data['keluar']->id_pengangkut) {
                ?>
                <option selected value="<?php echo $item->id; ?>"><?php echo $item->pengangkut; ?></option>
                <?php
              } else {
                ?>
                <option value="<?php echo $item->id; ?>"><?php echo $item->pengangkut; ?></option>
                <?php                
              }
            }
            ?>
          </select>          
    </div>

    <div class="form-group">
      <label for="jumlah">Jumlah (KG)</label>
          <input value="<?php echo $data['keluar']->jumlah; ?>" required type="number" step="0.01" class="form-control" id="jumlah" placeholder="Isi Jumlah" name="jumlah">          
    </div>

    <div class="form-group">
      <label for="no_dokumen">NO Dokumen</label>
          <input value="<?php echo $data['keluar']->no_dokumen; ?>" required type="text" class="form-control" id="no_dokumen" placeholder="Isi NO Dokumen" name="no_dokumen">          
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