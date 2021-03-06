<ul class="sidebar-menu" data-widget="tree">
<li class="header">MENU UTAMA</li>

<li>
    <a href="<?php echo base_url(); ?>">
        <i class="fa fa-dashboard text-aqua"></i>
        <span>Dashboard</span>
    </a>
</li>

<li>
	<a href="#">
		<i class="fa fa-database text-aqua"></i>
		<span>Data Master</span>
        	<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
	</a>
	<ul class="treeview-menu">
        <li>
        	<a href="<?php echo base_url("limbah"); ?>"><i class="fa fa-table text-aqua">
        	</i> Data Limbah</a>
        </li>
        <li>
        	<a href="<?php echo base_url("universal/index/kategori"); ?>"><i class="fa fa-table text-aqua">       		
        	</i> Data Kategori</a>
        <li>
        	<a href="<?php echo base_url("universal/index/sifat"); ?>"><i class="fa fa-table text-aqua">       		
        	</i> Data Sifat</a>
        </li>
        <li>
        	<a href="<?php echo base_url("universal/index/sumber"); ?>"><i class="fa fa-table text-aqua">       		
        	</i> Data Sumber</a>
        </li>
        <li>
        	<a href="<?php echo base_url("universal/index/pengangkut"); ?>"><i class="fa fa-truck text-aqua">        		
        	</i> Data Pengangkut</a>
        </li>
        <li>
        	<a href="<?php echo base_url("universal/index/unit"); ?>"><i class="fa fa-building text-aqua">        		
        	</i> Data Unit</a>
        </li>
        <li>
            <a href="<?php echo base_url("user"); ?>"><i class="fa fa-users text-aqua">
            </i> Data User</a>
        </li>
        <li>
        	<a href="<?php echo base_url("email"); ?>"><i class="fa fa-envelope text-aqua">
        	</i> Data E-Mail</a>
        </li>
    </ul>
</li>

<li class="treeview">
	<a href="#">
		<i class="fa fa-sign-in text-aqua"></i> 
		<span>Data Limbah Masuk</span>
		<span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
	</a>
	<ul class="treeview-menu">
        <li><a href="<?php echo base_url("admin_limbah_masuk/semuasemua"); ?>"><i class="fa fa-building text-aqua"></i> Semua Unit</a></li>
        <?php
        foreach ($this->db->get('unit')->result() as $item) {
            ?>
            <li><a href="<?php echo base_url("admin_limbah_masuk/index/" . $item->id); ?>"><i class="fa fa-building text-aqua"></i> <?php echo $item->unit; ?></a></li>
            <?php
        }
        ?>
    </ul>
</li>

<li>
	<a href="#">
		<i class="fa fa-sign-out text-aqua"></i>
        <span>Data Limbah Keluar</span>
		<span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
	</a>
	<ul class="treeview-menu">
        <li><a href="<?php echo base_url("admin_limbah_keluar/semuasemua"); ?>"><i class="fa fa-building text-aqua"></i> Semua Unit</a></li>
        <?php
        foreach ($this->db->get('unit')->result() as $item) {
            ?>
            <li><a href="<?php echo base_url("admin_limbah_keluar/index/" . $item->id); ?>"><i class="fa fa-building text-aqua"></i> <?php echo $item->unit; ?></a></li>
            <?php
        }
        ?>
    </ul>
</li>

<li>
    <a href="#">
        <i class="fa fa-balance-scale text-aqua"></i>
        <span>Data Neraca Limbah</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="<?php echo base_url("admin_neraca/semuasemua"); ?>"><i class="fa fa-building text-aqua"></i> Semua Unit</a></li>
        <?php
        foreach ($this->db->get('unit')->result() as $item) {
            ?>
            <li><a href="<?php echo base_url("admin_neraca/index/" . $item->id); ?>"><i class="fa fa-building text-aqua"></i> <?php echo $item->unit; ?></a></li>
            <?php
        }
        ?>
    </ul>
</li>

<li>
	<a href="#">
		<i class="fa fa-list text-aqua"></i>
		<span>Data Rekap Limbah</span>
		<span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
	</a>
	<ul class="treeview-menu">
        <?php
        foreach ($this->db->get('unit')->result() as $item) {
            ?>
            <li>
                <a href="<?php echo base_url("rekap/data/" . $item->id); ?>">
                    <i class="fa fa-building text-aqua"></i>
                    <span><?php echo $item->unit; ?></span>
                    <span class="pull-right-container">
                      <small data-toggle="tooltip" title="Melebihi Masa Penyimpanan Maksimal !" class="label pull-right bg-red"><div id="reminder_danger_<?php echo $item->id; ?>"></div></small>
                      <small data-toggle="tooltip" title="Hampir Melebihi Masa Penyimpanan Maksimal !" class="label pull-right bg-orange"><div id="reminder_warning_<?php echo $item->id; ?>"></div></small>
                    </span>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</li>

</ul>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>