<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Trigger extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('pustaka');
	}

	
	function index() {
		$configEmail = $this->db->get('email')->row();

        $i = 0;
        foreach ($this->db->get('unit')->result() as $item) {
            $rekap['unit'] = $this->db->get_where('unit', ['id' => $item->id])->row();
            $rekap['data'] = json_decode(file_get_contents(base_url('rekap/unit_menu/' . $item->id)));

            if ($rekap['data']->warning != 0 || $rekap['data']->danger != 0) {
            	foreach ($this->db->get_where('user', ['id_unit' => $rekap['unit']->id])->result() as $item2) {
            		if ($item2->email != null) {
            			$data[$i]['id_unit'] = $rekap['unit']->id;
            			$data[$i]['unit'] = $rekap['unit']->unit;
            			$data[$i]['email'] = $item2->email;
            			$data[$i]['danger'] = $rekap['data']->danger;
            			$data[$i]['warning'] = $rekap['data']->warning;
            			$data[$i]['rekap'] = $this->unit($rekap['unit']->id);

            			$i++;
            		}
            	}
            }
        }

        // var_dump($data); die;
        $i = 0;
        foreach ($data as $item) {
        	$send[$i]['email'] = $item['email'];
        	$send[$i]['html'] = $this->load->view('email', ['data' => $item], TRUE);

        	$i++;
        }

        foreach ($send as $item) {
        	// echo $item['email'];
        	// echo $item['html'];

        	$this->sendMail($configEmail->host, $configEmail->encryption, $configEmail->username, $configEmail->password, $configEmail->port, $item['email'], 'Notifikasi E-Mail', $item['html']);
        }
	}

	private function sendMail($server, $encryption, $email, $password, $port, $toEmail, $subject, $body) {
		$data = new \stdClass();

		$mail = new PHPMailer(true);                              
		try {
		    $mail->isSMTP();                                      
		    $mail->Host = $server;  
		    $mail->SMTPOptions = [ 'ssl' => [
								     'verify_peer' => false,
								     'verify_peer_name' => false,
								     'allow_self_signed' => true
								 	]
		    					];
		    $mail->SMTPAuth = true;                               
		    $mail->Username = $email;                 
		    $mail->Password = $password;                           
		    $mail->SMTPSecure = $encryption;                            
		    $mail->Port = $port;                                    

		    $mail->setFrom($email);
		    $mail->addAddress($toEmail);               
		    
		    $mail->isHTML(true);                                  
		    $mail->Subject = $subject;
		    $mail->Body    = $body;

		    $mail->send();
		    
		    $data->success = true;
		} catch (Exception $e) {
		    $data->message = $mail->ErrorInfo;

		    $data->success = false;
		}

		return $data;
	}

	function unit($id_unit){
		foreach ($this->db->get('limbah')->result() as $item) {
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
				$data = $this->index2($id_unit, $item->id);
				// var_dump($data->tanggal_deadline_dibuang); exit();
				$tanggal_deadline_dibuang = $data->tanggal_deadline_dibuang;
				$sisa_hari = $data->sisa_hari;
			} else {
				$tanggal_deadline_dibuang = $sisa_hari = null;
			}
			// var_dump($sisa_hari);
			if ($sisa_hari !== null) {
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

			$objek = new stdClass();
			$objek->limbah = $item->limbah;
			$objek->color = $color;
			$objek->jumlah_masuk = $jumlah_masuk;
			$objek->jumlah_keluar = $jumlah_keluar;
			$objek->jumlah = $jumlah;
			$objek->sisa_hari = $sisa_hari;
			$objek->tanggal_deadline_dibuang = $tanggal_deadline_dibuang;

			$array[] = $objek;
		}
		$return['id_unit'] = $id_unit;
		$return['data'] = $array;
		// var_dump($return);
		// echo json_encode($return);
		return $return;
	}

	function index2($id_unit, $id_limbah) {
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
		$tanggal_deadline_dibuang = date('Y-m-d', strtotime($tanggal_dibuang . " +" . $this->db->get_where('kategori', array('id' => $this->db->get_where('limbah', array('id' => $id_limbah))->row()->id_kategori))->row()->masa_berlaku_hari . " days"));
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


}
