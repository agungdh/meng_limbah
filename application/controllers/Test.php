<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pustaka');
	}

	function test1($id_unit){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>

		<table border="1">
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
					// $this->db->where('id', 12);
					foreach ($this->db->get('limbah')->result() as $item) {
						?>
						<?php
						//masuk
						$this->db->select_sum('jumlah');
						$where['id_unit'] = $id_unit;
						$where['id_limbah'] = $item->id;
						$this->db->where($where);
						$jumlah_masuk = $this->db->get('v_masuk_id_limbah')->row()->jumlah ?: 0;
						unset($where);

						//keluar
						$this->db->select_sum('jumlah');
						$where['id_unit'] = $id_unit;
						$where['id_limbah'] = $item->id;
						$this->db->where($where);
						$jumlah_keluar = $this->db->get('keluar')->row()->jumlah ?: 0;
						unset($where);							

						//jumlah
						$jumlah = $jumlah_masuk - $jumlah_keluar;
						$sisa_hari = null;
						if ($jumlah != 0) {
							$data = $this->index($id_unit, $item->id);
							// var_dump($data->tanggal_deadline_dibuang); exit();
							$tanggal_deadline_dibuang = $data->tanggal_deadline_dibuang;
							$sisa_hari = $data->sisa_hari;
						} else {
							$tanggal_deadline_dibuang = $sisa_hari = null;
						}
						// var_dump($sisa_hari);
						if ($sisa_hari != null) {
							if ($sisa_hari < 1) {
								$color = "#ff0000";
							} elseif ($sisa_hari <= 90) {
								$color = "#ff8e38";
							} else {
								$color = null;
							}							
						} else {
							$color = null;
						}
						?>
						<tr bgcolor="<?php echo $color; ?>">
							<td><?php echo $item->limbah; ?></td>
							<td><?php echo $jumlah_masuk . " - " . $jumlah_keluar . " = " . $jumlah; ?></td>
							<td><?php echo $sisa_hari ?: '-'; ?></td>
							<td><?php echo $tanggal_deadline_dibuang ?: '-'; ?></td>
						</tr>
						<?php
					}
					?>
			</tbody>
		</table>
		</body>
		</html>
		<?php
	}

	function index($id_unit, $id_limbah) {
		$stop = 0;
		$where['id_unit'] = $id_unit;
		$where['id_limbah'] = $id_limbah;
		$this->db->where($where);
		$this->db->order_by('tanggal', 'asc');
		unset($where);
		$db = $this->db->get('keluar')->result();
		$i = 0;
		$total_atas = 0;
		foreach ($db as $item) {
			// $this->paragraf_awal();

			// echo "Keluar";
			// $this->ganti_baris();
			// echo $item->id;
			// $this->ganti_baris();
			// echo $item->tanggal;
			// $this->ganti_baris();
			// echo $item->jumlah;
			// $this->ganti_baris();

			// $this->paragraf_akhir();

			// $this->paragraf_awal();
			$where['tanggal <='] = $item->tanggal;
			if ($i > 0) {
				$where['tanggal >'] = $tanggal;
			}
			$where['id_unit'] = $id_unit;
			$where['id_limbah'] = $id_limbah;
			$this->db->where($where);
			unset($where);
			$this->db->order_by('tanggal', 'desc');
			$jumlah_masuk = 0;
			foreach ($this->db->get('v_masuk_id_limbah')->result() as $item2) {
				// echo "Masuk";
				// $this->ganti_baris();
				// echo $item2->id;
				// $this->ganti_baris();
				// echo $item2->tanggal;
				// $this->ganti_baris();
				// echo $item2->jumlah;
				// $this->ganti_baris();				
				$jumlah_masuk += $item2->jumlah;
				$tanggal_dibuang = $item2->tanggal;
			}
			// $this->paragraf_akhir();
			
			$total = $total_atas + $jumlah_masuk - $item->jumlah;
			$jumlah_dibuang = $total;
			// echo $total_atas . ' + ' . $jumlah_masuk . ' - ' . $item->jumlah . ' = ' . $total;
			$total_atas = $total;

			if ($total != 0) {
				$stop = 1;
				break;
			} 

			// $this->buat_garis();

			$tanggal = $item->tanggal;
			$i++;
		}
		if ($stop != 1) {
			$where['id_unit'] = $id_unit;
			$where['id_limbah'] = $id_limbah;
			if (isset($tanggal)) {
				$where['tanggal >'] = $tanggal;
			}
			$this->db->where($where);
			unset($where);
			$this->db->order_by('tanggal', 'desc');
			$jumlah_masuk = 0;
			foreach ($this->db->get('v_masuk_id_limbah')->result() as $item2) {
				// echo "Masuk";
				// $this->ganti_baris();
				// echo $item2->id;
				// $this->ganti_baris();
				// echo $item2->tanggal;
				// $this->ganti_baris();
				// echo $item2->jumlah;
				// $this->ganti_baris();				
				$jumlah_masuk += $item2->jumlah;
				$tanggal_dibuang = $item2->tanggal;
			}
			// $this->paragraf_akhir();
			
			$total = $total_atas + $jumlah_masuk;
			$jumlah_dibuang = $total;
			// echo $total_atas  . ' + ' . $jumlah_masuk . ' = ' . $total;

			// $this->buat_garis();			
		}

		$tanggal_dibuang = date('Y-m-d', strtotime($tanggal_dibuang));
		$tanggal_deadline_dibuang = date('Y-m-d', strtotime($tanggal_dibuang . " +" . $this->db->get_where('golongan', array('id' => $this->db->get_where('limbah', array('id' => $id_limbah))->row()->id_golongan))->row()->masa_berlaku_hari . " days"));
		$sisa_hari = $this->pustaka->IntervalDays(date('Y-m-d'), $tanggal_deadline_dibuang);
		// $this->paragraf_awal();
		// echo 'Tanggal Dibuang = ' . $tanggal_dibuang;
		// $this->ganti_baris();
		// echo 'Tanggal Deadline Dibuang = ' . $tanggal_deadline_dibuang;
		// $this->ganti_baris();
		// echo 'Sisa Hari = ' . $sisa_hari;
		// $this->paragraf_akhir();
		$data = new stdClass();
		$data->tanggal_dibuang = $tanggal_dibuang;
		$data->tanggal_deadline_dibuang = $tanggal_deadline_dibuang;
		$data->sisa_hari = $sisa_hari;
		// var_dump($data);
		// foreach ($data as $key => $value) {
		// 	echo '<p>' . $key . ' = ' . $value . '</p>';
		// }
		return $data;
	}

	function paragraf_awal() {
		echo "<p>";
	}

	function paragraf_akhir() {
		echo "</p>";
	}

	function ganti_baris() {
		echo "<br>";
	}

	function buat_garis() {
		echo "<hr>";
	}
}