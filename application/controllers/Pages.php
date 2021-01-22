<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function laporan($url=null)
    {
        if($this->input->post('tahun')){
            $tahun = $this->input->post('tahun');
        }else{
            $tahun = Date("Y");
        }
        
        $this->db->order_by("tgl","desc");
        $da['history'] = $this->db->get('tabel_history',10)->result();
        $da['laporan'] = $this->db->get('tabel_laporan_skpd')->result();
        $da['skpd'] = $this->db->get('tabel_skpd')->result();
        $da['posisi'] = $url;
        $da['tahun'] = $tahun;
        if($tahun == null || $url == null){
            redirect('../');
        }
        $this->load->view('public/laporan',$da);
        
    }

}

/* End of file Pages.php */
