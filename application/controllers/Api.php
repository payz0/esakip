<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Api extends CI_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function get($tabel){
            echo json_encode($this->mcrud->baca($tabel));
    }
    
    public function getAlternatif($tabel,$id,$field,$field2 = null,$nilai = null,$field3=null,$nilai2=null)
    {
            // $nilai adalah tahun dari laporan skpd
            if($field2 != null){
                $this->session->set_userdata('tahunLap', $nilai);
                $this->session->set_userdata('jenisLap', $nilai2);
                $data = array($field=>$id,$field2=>$nilai,$field3=>$nilai2);
            }else{
                $data = array($field=>$id);
            }
            
            echo json_encode($this->mcrud->pilihData($tabel,$data));
        // }
    }

    public function getAlt2($tabel,$field,$id,$field2,$nilai)
    {
            // $nilai adalah tahun dari laporan skpd
            // if($field2 != null){
                $this->session->set_userdata('tahunLap', $id);
                $this->session->set_userdata('jenisLap', $nilai);
                $data = array($field=>$id,$field2=>$nilai);
            // }else{
            //     $data = array($field=>$id);
            // }
            
            echo json_encode($this->mcrud->pilihData($tabel,$data));
        // }
    }

    public function join($tabel1,$tabel2,$field1,$field2,$id)
    {
        echo json_encode($this->mcrud->joinTabel($tabel1,$tabel2,$field1,$field2,$id));
    }

	public function post($tabel){
		$data =  json_decode(file_get_contents("php://input"), true);//$this->input-post();
		$this->mcrud->isi($tabel,$data);
    }
    
    public function del($field,$value,$tabel){
        $this->mcrud->hapus($field,$value,$tabel);
        echo json_encode(array("status" => TRUE));
    }

    public function put($field,$value,$tabel){
        $data = json_decode(file_get_contents("php://input"), true);
        $this->mcrud->rubah($field,$value,$tabel,$data);
    }

}

/* End of file Api.php */

?>