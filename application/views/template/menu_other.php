<li class="header">MENU UTAMA</li>

<li>
	<a href="<?php echo base_url("masuk"); ?>">
		<i class="fa fa-sign-in text-aqua"></i>
		<span>Data Limbah Masuk</span>
	</a>
</li>

<li>
	<a href="<?php echo base_url("keluar"); ?>">
		<i class="fa fa-sign-out text-aqua"></i>
		<span>Data Limbah Keluar</span>
	</a>
</li>

<li>
	<a href="<?php echo base_url("neraca"); ?>">
		<i class="fa fa-balance-scale text-aqua"></i>
		<span>Data Neraca Limbah</span>
	</a>
</li>

<li>
	<a href="<?php echo base_url("rekap/data"); ?>">
		<i class="fa fa-balance-scale text-aqua"></i>
		<span>Data Rekap Limbah</span>
		<span class="pull-right-container">
          <small class="label pull-right bg-red"><div id="reminder_danger_<?php echo $this->session->id_unit; ?>"></div></small>
          <small class="label pull-right bg-orange"><div id="reminder_warning_<?php echo $this->session->id_unit; ?>"></div></small>
		</span>
	</a>
</li>