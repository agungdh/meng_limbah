<form method="get" action="<?php echo base_url(); ?>">
<div class="col-md-6">
  <!-- BAR CHART -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
          <p>Limbah Masuk Pertahun <input type="number" name="tahun_masuk" min="1900" max="2900" value="<?php echo $tahun; ?>"></p>
          <p>Unit <select name="unit_masuk">
            <option <?php echo $this->input->get('unit_masuk') == null ? "Selected" : null; ?> value="">Semua Unit</option>
            <?php
            foreach ($this->db->get('unit')->result() as $item) {
              ?>
              <option <?php echo $this->input->get('unit_masuk') == $item->id ? "Selected" : null; ?> value="<?php echo $item->id; ?>"><?php echo $item->unit; ?></option>
              <?php
            }
            ?>
          </select></p>
          <input type="submit" name="">
      </h3>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="myChart" style="height:230px"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-md-6">
  <!-- BAR CHART -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
          <p>Limbah Masuk Pertahun <input type="number" name="tahun_keluar" min="1900" max="2900" value="<?php echo $tahun; ?>"></p>
          <p>Unit <select name="unit_keluar">
            <option <?php echo $this->input->get('unit_keluar') == null ? "Selected" : null; ?> value="">Semua Unit</option>
            <?php
            foreach ($this->db->get('unit')->result() as $item) {
              ?>
              <option <?php echo $this->input->get('unit_keluar') == $item->id ? "Selected" : null; ?> value="<?php echo $item->id; ?>"><?php echo $item->unit; ?></option>
              <?php
            }
            ?>
          </select></p>
          <input type="submit" name="">
      </h3>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="myCharts" style="height:230px"></canvas>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</form>

.
<script type="text/javascript">
  $(function() {
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Triwulan-I',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-II',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-III',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-IV',
                data: [12, 19, 3, 5, 2, 3],
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
    });var ctx = document.getElementById("myCharts").getContext('2d');
    var myCharts = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: 'Triwulan-I',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-II',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-III',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Triwulan-IV',
                data: [12, 19, 3, 5, 2, 3],
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