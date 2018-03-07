<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_test');
		$this->load->library('pustaka');
		$this->load->model('m_universal');
	}

	function test1() {
		// var_dump($this->m_universal->get('golongan'));
		
		// var_dump($this->m_universal->get_id('golongan', 4));
		
		// $data['golongan'] = 12;
		// $data['masa_berlaku_hari'] = 120;
		// var_dump($this->m_universal->insert('golongan', $data));
		
		// $data['golongan'] = 13;
		// $data['masa_berlaku_hari'] = 123;
		// $this->m_universal->update('golongan', $data, 5);
		
		// $this->m_universal->delete('golongan', 5);
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
			    <th>No</th>
			    <th>Limbah</th>
			    <th>Tanggal Masuk</th>
			    <th>Sumber</th>
			    <th>Jumlah (KG)</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			$jumlah = 0;
			foreach ($this->m_test->ambil_parent_limbah() as $item) {
				?>
				<tr>
			    	<td colspan="6"><?php echo $item->limbah; ?></td>
			    </tr>
			    <?php
			    foreach ($this->m_test->ambil_child_limbah($item->id_limbah) as $item2) {
			    	$jumlah += $item2->jumlah;
			    	$item_jumlah = explode('.', $item2->jumlah);
			    	if ($item_jumlah[1] == 0) {
			    		$item_jumlah = $item_jumlah[0];
			    	} else {
			    		$item_jumlah = $item2->jumlah;
			    	}
			    	?>
			    	<tr>
				    	<td><?php echo '1'; ?></td>
				    	<td><?php echo $item2->sub_limbah; ?></td>
				    	<td><?php echo $this->pustaka->tanggal_indo_string($item2->tanggal); ?></td>
				    	<td><?php echo $item2->sumber; ?></td>
				    	<td><?php echo $item_jumlah; ?></td>
			    	</tr>
			    	<?php
			    }
			    ?>
			    <tr>
				    <td colspan="4">Total</td>
				    <td><?php echo $jumlah; ?></td>
			    </tr>
				<?php
				$jumlah = 0;
			}
			?>
			</tbody>
		</table>
		<?php
	}

}