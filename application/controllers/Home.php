<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
     $arr = $this->db->get('tabel_skpd')->num_rows(); //cek jumlah
    //  echo $arr;

     if($arr > 0){
        $this->load->view('home/template');
     }else{
        $this->load->view('home/perdana');
     }
        
    }

}

/* End of file Home.php */
