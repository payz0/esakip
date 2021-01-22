<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function __construct() {
        // parent:: __construct();
		// $this->load->model('db_model');
		// $this->db_model->ulahan();
		
	// }


	public function index()
	{

		// $arr = $this->db->get('users')->result();
		// echo 'sdsd';//json_encode($arr);
		// $this->load->view('welcome_message');
		// $this->db->get_where('tabel_laporan_skpd',array(''))
		// $data = $this->mcrud->pilihUrl('buatLap');
		// echo json_encode($data);
		// $data['password'] = md5($this->input->post('md5'));
		
		// $this->db->where('id_skpd',2);
		// $this->db->update('tabel_skpd', $data);
		// echo base64_encode($this->input->post('md5').'user');
		echo $this->db->get_where('tabel_pegawai',array('id_skpd'=>$this->session->userdata('id_skpd')))->num_rows();
		
		
	}

	public function test($id = null,$del = null)
	{
		$this->db->where('id', $id);
		$arr = $this->db->get('users')->row();
		
		$allData  = $this->mcrud->baca('users');
		$data['editUser'] = $arr;
		$data['arr'] = $allData; // sama $data = array('arr'=> $arr);
		$data['segment'] = $id;
		// if($del != null){
		// 	$this->mcrud->hapus('id',$id,'users');
		// 	$data['arr'] = $this->mcrud->baca('users');
		// 	redirect(base_url('Welcome/test'));
		// }
			$this->load->view('ujicoba/inputan',$data);
		
		
	}

	public function delete($id)
	{
		$this->mcrud->hapus('id',$id,'users');
		redirect(base_url('Welcome/test'));
	}

	public function input(){
		$data = $this->input->post();
		$data['password'] = md5(base64_encode($this->input->post('password')));
		$this->mcrud->isi('users',$data);
		redirect(base_url('Welcome/test'));
	} 

	public function edit($id){	
		$data = $this->input->post();
		$data['password'] = md5(base64_encode($this->input->post('password')));	
		$this->mcrud->rubah('id',$id,'users',$data);
		redirect(base_url('Welcome/test'));
	}

	public function map()
	{
		$this->load->view('ujicoba/peta');
		
		# code...
	}

	public function angular(){
		
		$this->load->view('ujicoba/angular');
		
	}

	public function import(){
		$data = $this->input->post('nama');
		echo var_dump($data);
	}

	public function coba($tabel1,$tabel2,$field1,$field2,$id){
		// $data = $this->input->get('id_peg');
		$query = $this->mcrud->joinTabel($tabel1,$tabel2,$field1,$field2,$id);
		//$this->db->get_where('tabel_kabag',array('id_peg'=>'1'))->result();
		$data = "'".$tabel1.".".$field2." = ".$tabel2.".".$field2."'";
		// echo $data
		echo json_encode($query);
		// $this->load->view('assets/'.$file);
	}


}
