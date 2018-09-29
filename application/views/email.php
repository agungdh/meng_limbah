<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
</head>
<body>
	<center>
		<h3>Notifikasi Limbah Expired dan Hampir Expired</h3>
	</center>

	<table>
		<thead>
			<tr>
				<td>Unit</td>
				<td> = <?php echo $data['unit']; ?></td>
			</tr>
			<tr>
				<td>Hampir Expired</td>
				<td> = <?php echo $data['warning']; ?></td>
			</tr>
			<tr>
				<td>Expired</td>
				<td> = <?php echo $data['danger']; ?></td>
			</tr>
		</thead>
	</table>
		<table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" border="1">
	      <thead>
	        <tr>
	          <th rowspan="2"><center>Limbah</center></th>
	          <th rowspan="2"><center>Sisa (KG)</center></th>
	          <th colspan="2"><center>Harus Dikeluarkan</center></th>
	        </tr>
	        <tr>
	          <th><center>Sisa Hari</center></th>
	          <th><center>Tanggal</center></th>
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
	              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->sisa_hari !== null ? $item->sisa_hari : '-'; ?></td>
	              <td bgcolor="<?php echo $item->color; ?>"><?php echo $item->tanggal_deadline_dibuang != null ? $this->pustaka->tanggal_indo_string($item->tanggal_deadline_dibuang) : '-'; ?></td>
	          </tr>
	          <?php
	        }
	        ?>
	      </tbody>
	      
	    </table>
</body>
</html>