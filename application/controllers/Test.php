<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_test');
		$this->load->library('pustaka');
	}

	function dump() {
		var_dump($this->m_test->read('jenis'));
	}

	function masuk() {
		?>
		<h1>Limbah masuk</h1>
		<table border="1">
			<thead>
				<tr>
			    <th rowspan="2">No</th>
			    <th rowspan="2">Limbah</th>
			    <th rowspan="2">Tanggal Masuk</th>
			    <th rowspan="2">Sumber</th>
			    <th colspan="2">Jumlah</th>
			  </tr>
			  <tr>
			    <th>Buah / Drum</th>
			    <th>KG</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			foreach ($this->m_test->ambil_parent_limbah() as $item) {
				?>
				<tr>
			    	<td colspan="6"><?php echo $item->limbah; ?></td>
			    </tr>
			    <?php
			    foreach ($this->m_test->ambil_child_limbah($item->id_limbah) as $item2) {
			    	?>
			    	<tr>
				    	<td><?php echo '1'; ?></td>
				    	<td><?php echo $item2->limbah; ?></td>
				    	<td><?php echo $this->pustaka->tanggal_indo($item2->tanggal); ?></td>
				    	<td><?php echo $item2->sumber; ?></td>
				    	<td><?php echo $item2->buah; ?></td>
				    	<td><?php echo $item2->jumlah; ?></td>
			    	</tr>
			    	<?php
			    }
			    ?>
			    <tr>
				    <td colspan="4">Total</td>
				    <td>300</td>
				    <td>6000</td>
			    </tr>
				<?php
			}
			?>
			</tbody>
		</table>
		<?php
	}

}