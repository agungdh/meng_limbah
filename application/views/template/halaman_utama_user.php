<form method="get" action="<?php echo base_url(); ?>">
  <!-- BAR CHART -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
          <p>Jumlah (KG) Limbah Masuk</p>
          <p>Tahun <input type="number" name="tahun_masuk" min="1900" max="2900" value="<?php echo $tahun_masuk; ?>"></p>
          <input type="submit" name="">
      </h3>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="myChart"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- BAR CHART -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
          <p>Jumlah (KG) Limbah Keluar</p>
          <p>Tahun <input type="number" name="tahun_keluar" min="1900" max="2900" value="<?php echo $tahun_keluar; ?>"></p>
          <input type="submit" name="">
      </h3>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="myCharts"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->  

  <!-- BAR CHART -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
          <p>Jumlah (KG) Limbah di TPS</p>
      </h3>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="myChartss"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</form>

<?php
if ($tahun_masuk != null) {
  $where_masuk['year(tanggal)'] = $tahun_masuk;
}

if ($tahun_keluar != null) {
  $where_keluar['year(tanggal)'] = $tahun_keluar;
}

$where_masuk['id_unit'] = $this->session->id_unit;

$where_keluar['id_unit'] = $this->session->id_unit;

$triwulan[1] = "BETWEEN 1 AND 3";
$triwulan[2] = "BETWEEN 4 AND 6";
$triwulan[3] = "BETWEEN 7 AND 9";
$triwulan[4] = "BETWEEN 10 AND 2";
// var_dump($triwulan);

// foreach ($triwulan as $item) {
  // $where_masuk_unprotect['month(tanggal)'] = $item['antara'];
  // $this->db->select_sum('jumlah');
  // $this->db->where($where_masuk);
  // $this->db->where("month(tanggal) " . $item['antara'], null, false);
  // $data['masuk'][] = $this->db->get('masuk')->row();
  // // echo "<p>" . $this->db->last_query() . "</p>";

  // $this->db->select_sum('jumlah');
  // $this->db->where($where_keluar);
  // $this->db->where("month(tanggal) " . $item['antara'], null, false);
  // $data['keluar'][] = $this->db->get('keluar')->row();
// }

// $this->db->select_sum('jumlah');
// $this->db->where($where_keluar);   
// $data['keluar'] = $this->db->get('keluar')->row();

// var_dump($data);
// exit();

?>
<script type="text/javascript">
  $(function() {
    //masuk
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $limbah; ?>,
            datasets: [{
                label: 'Triwulan-I',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_masuk);
                  $this->db->where("month(tanggal) " . $triwulan[1], null, false);
                  $masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: '0';
                  echo "'" . $masuk . "'" . ",";
                }
                ?>
                // '1', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-II',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_masuk);
                  $this->db->where("month(tanggal) " . $triwulan[2], null, false);
                  $masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: '0';
                  echo "'" . $masuk . "'" . ",";
                }
                ?>
                // '2', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(255, 255, 0, 0.2)',
                borderColor: 'rgba(255, 255, 0, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-III',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_masuk);
                  $this->db->where("month(tanggal) " . $triwulan[3], null, false);
                  $masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: '0';
                  echo "'" . $masuk . "'" . ",";
                }
                ?>
                // '3', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(0, 102, 255, 0.2)',
                borderColor: 'rgba(0, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-IV',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_masuk);
                  $this->db->where("month(tanggal) " . $triwulan[4], null, false);
                  $masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: '0';
                  echo "'" . $masuk . "'" . ",";
                }
                ?>
                // '12', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                borderColor: 'rgba(0, 255, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    //keluar
    var ctx = document.getElementById("myCharts").getContext('2d');
    var myCharts = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $limbah; ?>,
            datasets: [{
                label: 'Triwulan-I',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_keluar);
                  $this->db->where("month(tanggal) " . $triwulan[1], null, false);
                  $keluar = $this->db->get('keluar')->row()->jumlah ?: '0';
                  echo "'" . $keluar . "'" . ",";
                }
                ?>
                // '1', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-II',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_keluar);
                  $this->db->where("month(tanggal) " . $triwulan[2], null, false);
                  $keluar = $this->db->get('keluar')->row()->jumlah ?: '0';
                  echo "'" . $keluar . "'" . ",";
                }
                ?>
                // '2', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(255, 255, 0, 0.2)',
                borderColor: 'rgba(255, 255, 0, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-III',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_keluar);
                  $this->db->where("month(tanggal) " . $triwulan[3], null, false);
                  $keluar = $this->db->get('keluar')->row()->jumlah ?: '0';
                  echo "'" . $keluar . "'" . ",";
                }
                ?>
                // '3', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(0, 102, 255, 0.2)',
                borderColor: 'rgba(0, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-IV',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $this->db->where($where_keluar);
                  $this->db->where("month(tanggal) " . $triwulan[4], null, false);
                  $keluar = $this->db->get('keluar')->row()->jumlah ?: '0';
                  echo "'" . $keluar . "'" . ",";
                }
                ?>
                // '12', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                borderColor: 'rgba(0, 255, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
  
    //sisa
    var ctx = document.getElementById("myChartss").getContext('2d');
    var myChartss = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $limbah; ?>,
            datasets: [{
                label: 'Limbah',
                data: [
                <?php
                foreach ($this->db->get('limbah')->result() as $item) {
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $where_sisa['id_unit'] = $this->session->id_unit;
                  $this->db->where($where_sisa);
                  $masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: '0';
                  
                  $this->db->select_sum('jumlah');
                  $this->db->where('id_limbah', $item->id);
                  $where_sisa['id_unit'] = $this->session->id_unit;
                  $this->db->where($where_sisa);
                  $keluar = $this->db->get('keluar')->row()->jumlah ?: '0';
                  
                  // echo $this->db->last_query(); exit();
                  $sisa = $masuk - $keluar;

                  echo "'" . $sisa . "'" . ",";
                }
                ?>
                // '1', '19', '3', '5', '2', '3', '3', '3', '3', '3'
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

  })
</script>