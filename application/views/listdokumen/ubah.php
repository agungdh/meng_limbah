<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH LIST DOKUMEN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('listdokumen/aksi_ubah'); ?>">
    <div class="box-body">

    <input type="hidden" name="id" value="<?php echo $data['data_listdokumen']->id; ?>">

    <div class="form-group">
      <label for="butir">Butir</label>
          <input readonly value="<?php echo $data['butir']->nomor . ' | ' . $data['butir']->nama;?>" required type="text" class="form-control" id="butir" placeholder="Isi Butir" name="butir">          
    </div>

    <div class="form-group">
      <label for="keterangan">Keterangan</label>
          <input value="<?php echo $data['data_listdokumen']->keterangan; ?>" required type="text" class="form-control" id="keterangan" placeholder="Isi Keterangan" name="keterangan">          
    </div>

    <div class="form-group">
      <label for="tipe">Tipe</label>
          <select id="tipe" class="form-control select2" name="tipe">
            <?php
            switch ($data['data_listdokumen']->tipe) {
            case 1:
              $isi = "<option selected value='1'>Dokumen Wajib</option><option value='2'>Dokumen Visitasi</option><option value='3'>Dokumen Pendukung</option>";
              break;
            
            case 2:
              $isi = "<option value='1'>Dokumen Wajib</option><option selected value='2'>Dokumen Visitasi</option><option value='3'>Dokumen Pendukung</option>";
              break;
            
            case 3:
              $isi = "<option value='1'>Dokumen Wajib</option><option value='2'>Dokumen Visitasi</option><option selected value='3'>Dokumen Pendukung</option>";
              break;
            
            default:
              $isi = null;
              break;
            }
            echo $isi;
            ?>
          </select>          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('listdokumen/index/'.$data['butir']->id); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>