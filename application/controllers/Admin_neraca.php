<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_neraca extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_neraca'); 
    $this->load->library('pustaka');
  }

  function index($unit_id) {
    $data['isi'] = "admin_neraca/index";
    $data['data']['unit_id'] = $unit_id;
    if ($this->input->get('tahun') == null) {
      $data['data']['tahun'] = date('Y');
    } else {
      $data['data']['tahun'] = $this->input->get('tahun');
    }
    if ($this->input->get('triwulan') == null) {
      $triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
      $data['data']['triwulan'] = $triwulan;
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);
    } else {
      $data['data']['triwulan'] = $this->input->get('triwulan');
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    }
    $data['data']['limbah'] = $this->m_neraca->ambil_limbah();
    
    $this->load->view("template/template", $data);
  }

  function semuasemua() {
    $data['isi'] = "admin_neraca/indexsemuasemua";
    if ($this->input->get('tahun') == null) {
      $data['data']['tahun'] = date('Y');
    } else {
      $data['data']['tahun'] = $this->input->get('tahun');
    }
    if ($this->input->get('triwulan') == null) {
      $triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
      $data['data']['triwulan'] = $triwulan;
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);
    } else {
      $data['data']['triwulan'] = $this->input->get('triwulan');
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    }
    $data['data']['limbah'] = $this->m_neraca->ambil_limbah();
    
    $this->load->view("template/template", $data);
  }

  function export($id_unit) { 
    $unit = $this->db->get_where('unit', array('id' => $id_unit))->row()->unit;

    $data['triwulan'] = $this->input->get('triwulan');
    $data['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    $data['tahun'] = $this->input->get('tahun');

    $data['limbah'] = $this->m_neraca->ambil_limbah();

    switch ($data['triwulan']) {
      case 1:
        $triwulan = 'I';
        break;
      
      case 2:
        $triwulan = 'II';
        break;
      
      case 3:
        $triwulan = 'III';
        break;
      
      case 4:
        $triwulan = 'IV';
        break;
      
      default:
        $triwulan = 'ERROR !!!';
        break;
    }

    $this->load->library('excel');
    
    $this->excel->setActiveSheetIndex(0);
    
    $this->excel->getActiveSheet()->setTitle('Sheet 1');
    
    $this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG KELUAR DARI TPS');
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->mergeCells('A1:H1');
    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $this->excel->getActiveSheet()->setCellValue('A2', 'UNIT ' . strtoupper($unit));
    $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
    $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->mergeCells('A2:H2');
    $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
     
    $this->excel->getActiveSheet()->setCellValue('A3', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['tahun']);
    $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(15);
    $this->excel->getActiveSheet()->mergeCells('A3:H3');
    $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
     
    $this->excel->getActiveSheet()->setCellValue('A5', 'NO');
    $this->excel->getActiveSheet()->setCellValue('B5', 'LIMBAH');
    $this->excel->getActiveSheet()->setCellValue('C5', 'SUMBER');
    $this->excel->getActiveSheet()->setCellValue('D5', 'JUMLAH (KG) SISA LIMBAH TRIWULAN SEBELUMNYA');
    $this->excel->getActiveSheet()->setCellValue('E5', 'JUMLAH (KG) LIMBAH MASUK TRIWULAN INI');
    $this->excel->getActiveSheet()->setCellValue('F5', 'JUMLAH (KG) LIMBAH KELUAR TRIWULAN INI');
    $this->excel->getActiveSheet()->setCellValue('G5', 'JUMLAH (KG) SISA LIMBAH DI TPS');
    $this->excel->getActiveSheet()->setCellValue('H5', 'TUJUAN PENYERAHAN LIMBAH');

    $i = 1;
    $a = 6;
        
        $jumlah_sisa_limbah_bulan_sebelumnya = 0;
        $jumlah_limbah_masuk_bulan_ini = 0;
        $jumlah_limbah_lalu_bulan_ini = 0;
        $jumlah_sisa_limbah_di_tps = 0;

    foreach ($data['limbah'] as $item) {
      $limbah = $item->limbah;
      // $tanggal = $data['tahun'] . '-' . str_pad($data['bulan'],2,"0",STR_PAD_LEFT) . '-' . '01';
      $lalu1 = $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $lalu2 = $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $lalu = $lalu1 - $lalu2;
      $masuk = $this->m_neraca->ambil_jumlah_masuk_dari_limbah($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $keluar = $this->m_neraca->ambil_jumlah_keluar_dari_limbah($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah($id_unit, $item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $sisa = $lalu + $masuk - $keluar;
      $sumber = $masuk == 0 ? '-' : $this->m_neraca->ambil_masuk_dari_limbah($id_unit, $item->id)->sumber;
      $pengangkut = $keluar == 0 ? '-' : $this->m_neraca->ambil_keluar_dari_limbah($id_unit, $item->id)->pengangkut;

      $jumlah_sisa_limbah_bulan_sebelumnya += $lalu;
      $jumlah_limbah_masuk_bulan_ini += $masuk;
      $jumlah_limbah_lalu_bulan_ini += $keluar;
      $jumlah_sisa_limbah_di_tps += $sisa;

      $this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
      $this->excel->getActiveSheet()->setCellValue('B' . $a, $limbah);
      $this->excel->getActiveSheet()->setCellValue('C' . $a, $sumber);
      $this->excel->getActiveSheet()->setCellValue('D' . $a, $lalu);
      $this->excel->getActiveSheet()->setCellValue('E' . $a, $masuk);
      $this->excel->getActiveSheet()->setCellValue('F' . $a, $keluar);
      $this->excel->getActiveSheet()->setCellValue('G' . $a, $sisa);
      $this->excel->getActiveSheet()->setCellValue('H' . $a, $pengangkut);

      $i++;
      $a++;
    }

    $this->excel->getActiveSheet()->setCellValue('B' . $a, "TOTAL");
    $this->excel->getActiveSheet()->mergeCells('B' . $a . ':C' . $a);
    $this->excel->getActiveSheet()->setCellValue('D' . $a, $jumlah_sisa_limbah_bulan_sebelumnya);
    $this->excel->getActiveSheet()->setCellValue('E' . $a, $jumlah_limbah_masuk_bulan_ini); 
    $this->excel->getActiveSheet()->setCellValue('F' . $a, $jumlah_limbah_lalu_bulan_ini);  
    $this->excel->getActiveSheet()->setCellValue('G' . $a, $jumlah_sisa_limbah_di_tps); 

    $filename='DATA NERACA LIMBAH.xlsx'; 
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"'); 
    header('Cache-Control: max-age=0'); 
    
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
    
    $objWriter->save('php://output');
  }

  function export_semuasemua() { 
    $data['triwulan'] = $this->input->get('triwulan');
    $data['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    $data['tahun'] = $this->input->get('tahun');

    $data['limbah'] = $this->m_neraca->ambil_limbah();

    switch ($data['triwulan']) {
      case 1:
        $triwulan = 'I';
        break;
      
      case 2:
        $triwulan = 'II';
        break;
      
      case 3:
        $triwulan = 'III';
        break;
      
      case 4:
        $triwulan = 'IV';
        break;
      
      default:
        $triwulan = 'ERROR !!!';
        break;
    }

    $this->load->library('excel');
    
    $this->excel->setActiveSheetIndex(0);
    
    $this->excel->getActiveSheet()->setTitle('Sheet 1');
    
    $this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG KELUAR DARI TPS');
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
    $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $this->excel->getActiveSheet()->mergeCells('A1:H1');
    $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
     
    $this->excel->getActiveSheet()->setCellValue('A2', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['tahun']);
    $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
    $this->excel->getActiveSheet()->mergeCells('A2:H2');
    $this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
     
    $this->excel->getActiveSheet()->setCellValue('A4', 'NO');
    $this->excel->getActiveSheet()->setCellValue('B4', 'LIMBAH');
    $this->excel->getActiveSheet()->setCellValue('C4', 'SUMBER');
    $this->excel->getActiveSheet()->setCellValue('D4', 'JUMLAH (KG) SISA LIMBAH TRIWULAN SEBELUMNYA');
    $this->excel->getActiveSheet()->setCellValue('E4', 'JUMLAH (KG) LIMBAH MASUK TRIWULAN INI');
    $this->excel->getActiveSheet()->setCellValue('F4', 'JUMLAH (KG) LIMBAH KELUAR TRIWULAN INI');
    $this->excel->getActiveSheet()->setCellValue('G4', 'JUMLAH (KG) SISA LIMBAH DI TPS');
    $this->excel->getActiveSheet()->setCellValue('H4', 'TUJUAN PENYERAHAN LIMBAH');

    $i = 1;
    $a = 5;
        
        $jumlah_sisa_limbah_bulan_sebelumnya = 0;
        $jumlah_limbah_masuk_bulan_ini = 0;
        $jumlah_limbah_lalu_bulan_ini = 0;
        $jumlah_sisa_limbah_di_tps = 0;

    foreach ($data['limbah'] as $item) {
      $limbah = $item->limbah;
      // $tanggal = $data['tahun'] . '-' . str_pad($data['bulan'],2,"0",STR_PAD_LEFT) . '-' . '01';
      $lalu1 = $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah_lalu_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $lalu2 = $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah_lalu_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $lalu = $lalu1 - $lalu2;
      $masuk = $this->m_neraca->ambil_jumlah_masuk_dari_limbah_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_masuk_dari_limbah_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $keluar = $this->m_neraca->ambil_jumlah_keluar_dari_limbah_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total != null ? $this->m_neraca->ambil_jumlah_keluar_dari_limbah_semuasemua($item->id, $data['awal_akhir_triwulan'][0], $data['awal_akhir_triwulan'][1], $data['tahun'])->total : 0;
      $sisa = $lalu + $masuk - $keluar;
      $sumber = $masuk == 0 ? '-' : $this->m_neraca->ambil_masuk_dari_limbah_semuasemua($item->id)->sumber;
      $pengangkut = $keluar == 0 ? '-' : $this->m_neraca->ambil_keluar_dari_limbah_semuasemua($item->id)->pengangkut;

      $jumlah_sisa_limbah_bulan_sebelumnya += $lalu;
      $jumlah_limbah_masuk_bulan_ini += $masuk;
      $jumlah_limbah_lalu_bulan_ini += $keluar;
      $jumlah_sisa_limbah_di_tps += $sisa;

      $this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
      $this->excel->getActiveSheet()->setCellValue('B' . $a, $limbah);
      $this->excel->getActiveSheet()->setCellValue('C' . $a, $sumber);
      $this->excel->getActiveSheet()->setCellValue('D' . $a, $lalu);
      $this->excel->getActiveSheet()->setCellValue('E' . $a, $masuk);
      $this->excel->getActiveSheet()->setCellValue('F' . $a, $keluar);
      $this->excel->getActiveSheet()->setCellValue('G' . $a, $sisa);
      $this->excel->getActiveSheet()->setCellValue('H' . $a, $pengangkut);

      $i++;
      $a++;
    }

    $this->excel->getActiveSheet()->setCellValue('B' . $a, "TOTAL");
    $this->excel->getActiveSheet()->mergeCells('B' . $a . ':C' . $a);
    $this->excel->getActiveSheet()->setCellValue('D' . $a, $jumlah_sisa_limbah_bulan_sebelumnya);
    $this->excel->getActiveSheet()->setCellValue('E' . $a, $jumlah_limbah_masuk_bulan_ini); 
    $this->excel->getActiveSheet()->setCellValue('F' . $a, $jumlah_limbah_lalu_bulan_ini);  
    $this->excel->getActiveSheet()->setCellValue('G' . $a, $jumlah_sisa_limbah_di_tps); 

    $filename='DATA NERACA LIMBAH.xlsx'; 
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="'.$filename.'"'); 
    header('Cache-Control: max-age=0'); 
    
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
    
    $objWriter->save('php://output');
  }


}
