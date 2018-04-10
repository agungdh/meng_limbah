
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
                      <h3><strong><font color=blue>DATA REKAP LIMBAH B3<br>
                      UNIT&nbsp; &nbsp; : &nbsp; <?php echo $this->session->unit; ?></h3></font></strong><br/><br>
                    </center>
                  </div>
                </div>
                <br/>
    
    </div>
  </div><!-- /.box-header -->

    <div class="box-body">

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th rowspan="2">Limbah</th>
          <th rowspan="2">Sisa</th>
          <th colspan="2">Harus Dibuang</th>
        </tr>
        <tr>
          <th>Sisa Hari</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $jumlah = 0;
        foreach ($data['rekap']['data'] as $item) {
          ?>
          <tr>
              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->limbah; ?></td>
              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->jumlah; ?></td>
              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->sisa_hari; ?></td>
              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->tanggal_deadline_dibuang; ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
