<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
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
					<th>Hari</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($this->db->get('limbah')->result() as $item) {
						?>
						<tr>
							<td><?php echo $item->limbah; ?></td>
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
							?>
							<td><?php echo $jumlah_masuk . " - " . $jumlah_keluar . " = " . $jumlah; ?></td>
							<?php
							if ($jumlah != 0) {
								$hari_dibuang = "a";
								$jumlah_dibuang = "b";
							} else {
								$hari_dibuang = $jumlah_dibuang = '-';
							}
							?>
							<td><?php echo $hari_dibuang; ?></td>
							<td><?php echo $jumlah_dibuang; ?></td>
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
			$this->paragraf_awal();

			echo "Keluar";
			$this->ganti_baris();
			echo $item->id;
			$this->ganti_baris();
			echo $item->tanggal;
			$this->ganti_baris();
			echo $item->jumlah;
			$this->ganti_baris();

			$this->paragraf_akhir();

			$this->paragraf_awal();
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
				echo "Masuk";
				$this->ganti_baris();
				echo $item2->id;
				$this->ganti_baris();
				echo $item2->tanggal;
				$this->ganti_baris();
				echo $item2->jumlah;
				$this->ganti_baris();				
				$jumlah_masuk += $item2->jumlah;
				$tanggal_dibuang = $item2->tanggal;
			}
			$this->paragraf_akhir();
			
			$total = $total_atas + $jumlah_masuk - $item->jumlah;
			$jumlah_dibuang = $total;
			echo $total_atas . ' + ' . $jumlah_masuk . ' - ' . $item->jumlah . ' = ' . $total;
			$total_atas = $total;

			if ($total != 0) {
				$stop = 1;
				break;
			} 

			$this->buat_garis();

			$tanggal = $item->tanggal;
			$i++;
		}
		if ($stop != 1) {
			$where['id_unit'] = $id_unit;
			$where['id_limbah'] = $id_limbah;
			$where['tanggal >'] = $tanggal;
			$this->db->where($where);
			unset($where);
			$this->db->order_by('tanggal', 'desc');
			$jumlah_masuk = 0;
			foreach ($this->db->get('v_masuk_id_limbah')->result() as $item2) {
				echo "Masuk";
				$this->ganti_baris();
				echo $item2->id;
				$this->ganti_baris();
				echo $item2->tanggal;
				$this->ganti_baris();
				echo $item2->jumlah;
				$this->ganti_baris();				
				$jumlah_masuk += $item2->jumlah;
				$tanggal_dibuang = $item2->tanggal;
			}
			$this->paragraf_akhir();
			
			$total = $total_atas + $jumlah_masuk;
			$jumlah_dibuang = $total;
			echo $total_atas  . ' + ' . $jumlah_masuk . ' = ' . $total;

			$this->buat_garis();			
		}

		$this->paragraf_awal();
		echo 'Tanggal Dibuang = ' . $tanggal_dibuang;
		$this->ganti_baris();
		echo 'Jumlah Dibuang = ' . $jumlah_dibuang;
		$this->paragraf_akhir();
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