<?php 
// var_dump($data['versi_borang']);
// exit();
?>
<script type="text/javascript" language="javascript" >
  var dTable;
  var var_last_tab = <?php echo $this->input->get('tab') != null ? $this->input->get('tab') : 'null'; ?>;



  $(document).ready(function() {

    if (var_last_tab != null) {
      $("ul.nav-tabs li").eq(0).attr('class','');
      $("ul.nav-tabs li").eq(var_last_tab-1).attr('class','active');
      $("#tab_1").attr('class','tab-pane');
      $("#tab_"+var_last_tab).attr('class','tab-pane active');
    }

    dTable = $('#lookup').DataTable({
      responsive: true
    });
  });

  function pilih_tab(id) {
    $('#last_tab').val(id);
  }
</script>

<!-- Custom Tabs -->
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('dokumen/upload'); ?>">
    <input type="hidden" name="id_pengajuan" value="<?php echo $data['pengajuan']->id; ?>">
    <input type="hidden" name="last_tab" id="last_tab" value="1">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <?php
        foreach ($data['standar'] as $item) {
          if ($item->nomor == 1) {
            $status = "active";
          } else {
            $status = null;
          }
          ?>
          <li class="<?php echo $status; ?>"><a href="#tab_<?php echo $item->nomor; ?>" onclick="pilih_tab(<?php echo $item->nomor; ?>)" data-toggle="tab">Standar <?php echo $item->nomor; ?></a></li>
          <?php
        }
        ?>
      </ul>
      <div class="tab-content">
      <input class="btn btn-success" type="submit" name="submit" value="Submit">
      <input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">
        <?php
        foreach ($data['standar'] as $item) {
          if ($item->nomor == 1) {
            $status = "active";
          } else {
            $status = null;
          }
          ?>
          <div class="tab-pane <?php echo $status; ?>" id="tab_<?php echo $item->nomor; ?>">

          <table class="table">
            <thead>
              <tr>
                <th>Standar</th>
                <th>Substandar</th>
                <th>Butir</th>
                <th>List Dokumen</th>
                <th>Tipe Dokumen</th>
                <th>Dokumen</th>
                <th>Upload</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id_standar = 0; $id_substandar = 0; $id_butir = 0; $id_listdokumen = 0; 
              foreach ($this->m_dokumen->ambil_detail($item->id) as $item2) {
                  if ($id_standar == $item2->id_standar) {
                    $standar = null;
                  } else {
                    $standar = $item2->nomor_standar . ' ' . $item2->nama_standar;
                  }
                  
                  if ($id_substandar == $item2->id_substandar) {
                    $substandar = null;
                  } else {
                    $substandar = $item2->nomor_substandar . ' ' . $item2->nama_substandar;
                  }
                  
                  if ($id_butir == $item2->id_butir) {
                    $butir = null;
                  } else {
                    $butir = $item2->nomor_butir . ' ' . $item2->nama_butir;
                  }
                  
                  if ($id_listdokumen == $item2->id_listdokumen) {
                    $listdokumen = null;
                  } else {
                    $listdokumen = $item2->keterangan_listdokumen;
                  }
                  ?>
                  <tr>
                    <td><?php echo $standar; ?></td>
                    <td><?php echo $substandar; ?></td>
                    <td><?php echo $butir; ?></td>
                    <td><?php echo $listdokumen; ?></td>
                    <td>
                    <?php
                    switch ($item2->tipe_listdokumen) {
                      case 1:
                        $tipe = "Dokumen Wajib";
                        break;
                      
                      case 2:
                        $tipe = "Dokumen Visitasi";
                        break;
                      
                      case 3:
                        $tipe = "Dokumen Pendukung";
                        break;
                      
                      default:
                        $tipe = null;
                        break;
                    }
                    echo $tipe;
                    ?>  
                    </td>
                    <td>
                      <?php
                      $dokumen = $this->m_dokumen->ambil_dokumen($data['pengajuan']->id, $item2->id_listdokumen);
                      if ($dokumen != null) {
                        ?>
                        <a href="<?php echo base_url($dokumen->url); ?>"><?php echo $dokumen->nama_file; ?></a>
                        <?php
                      } else {
                        echo "-";
                      }
                      ?>
                    </td>
                    <td>
                      <input type="file" name="dokumen[<?php echo $item2->id_listdokumen; ?>]">
                    </td>
                  </tr>
                  <?php
                  $id_standar = $item2->id_standar; $id_substandar = $item2->id_substandar; $id_butir = $item2->id_butir; $id_listdokumen = $item2->id_listdokumen; 
              }
              ?>
            </tbody>
          </table>
          
          </div>
          <?php
        }
        ?>
        <input class="btn btn-success" type="submit" name="submit" value="Submit">
        <input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
    </form>

