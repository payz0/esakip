<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index()
    {
        if($this->session->userdata('login')){
            redirect('../login/dashboard');
        }else{
            $this->load->view('login/homeLogin');
            
        }
        
    }

    public function formLogin(){
        // $da = $this->input->post();
        // $da['password'] = md5($this->input->post('password'));
        $da = array(
            'username'=>$this->input->post('username'),
            'password'=> base64_encode($this->input->post('password').'user')
        );
        // echo md5($this->input->post('password'));
        $data =  $this->db->get_where('tabel_skpd',$da);
        $jumData = $data->num_rows();
        $datas = $data->result();
        if($jumData == 1){
            $dataDB['login'] = true;
            $dataDB['nama'] = $datas[0]->username;
            $dataDB['level_lap'] = $datas[0]->level_lap;
            $dataDB['level'] = $datas[0]->level;
            $dataDB['id_skpd'] = $datas[0]->id_skpd;
            $dataDB['skpd'] = $datas[0]->skpd;
            $dataDB['sebagai'] = 'admin';
            $this->session->set_userdata($dataDB);
            redirect('../login/dashboard');
            // echo json_encode($datas[0]);
        }else{
            $arr = array(
                'nip' => $this->input->post('username'),
                'password' => base64_encode($this->input->post('password').'user'),
            );
            $staf = $this->db->get_where('tabel_pegawai',$arr);
            $jumPeg = $staf->num_rows();
            $pegawai = $staf->result();
            if($jumPeg == 1){
                $skpd = $this->db->get_where('tabel_skpd',array('id_skpd'=>$pegawai[0]->id_skpd))->row();
                $login = array(
                    'login' => true,
                    'id_skpd'=>$pegawai[0]->id_skpd,
                    'skpd'=>$skpd->skpd,
                    'esselon'=> $pegawai[0]->esselon,
                    'id_peg'=> $pegawai[0]->id_peg,
                    'nama'=> $pegawai[0]->nama,
                    'sebagai' => 'pegawai'
                );
                if($pegawai[0]->esselon == 'esselon IV'){
                    $login['id_jabatan'] = $pegawai[0]->id_kasi;
                }elseif($pegawai[0]->esselon == 'esselon III'){
                    $login['id_jabatan'] = $pegawai[0]->id_kabag;
                }
                $this->session->set_userdata($login);
                redirect('../login/dashboard');
            }else{
                $pesan['pesan'] = "Username dan password salah !";
                $pesan['sukses'] = TRUE;
                $this->session->set_flashdata($pesan);
                redirect('../login');
            }
        }
    }

    public function dashboard($url=null,$box=null){
        
        if($this->session->userdata('login')){
            if($this->session->userdata('sebagai') == "pegawai"){
                $foto = $this->db->get_where('tabel_pegawai',array('id_peg'=>$this->session->userdata('id_peg')))->row();
                $data['user'] = $foto;
            }
            
            if($url == null){
                $url = "sideHome";
            }
            if($box != null){
                $data['box'] = $box;
            }else{
                $data['box'] = null;
            }
            $data['url'] = $url;
            $data['dataAll'] = $this->mcrud->pilihUrl($url);
            //uji coba
            
            // echo json_encode($data);
            $this->load->view('login/dashboard',$data);
        }else{
            redirect('../login');
        }
    }

    public function logout(){
        
        $this->session->sess_destroy();
        redirect('../../'); 
    }

    public function upload($name,$folder,$file,$redirect,$ringkasan = null)
    {
        if($folder != 'berkas'){
            $folder = "img"."/".$folder;
        }

       
        $namaFile = $file.'('.time().')'; 
        $config['upload_path']          = './assets/'.$folder.'/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name']            = $namaFile;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
               
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
                
                $this->session->set_flashdata('upload', true);    
                $this->session->set_flashdata('pesan', 'Gagal upload'); 
                // redirect('../login/dashboard/'.$redirect);
        }
        else
        {   

                if($redirect != 'buatLap'){ // untuk berkas skpd dan kabupaten
                    if($redirect == 'profil'){ //untuk propile
                        $tabel = 'tabel_pegawai';
                        $id_tabel = 'id_peg';
                        $arr = array(
                            'id_peg'=>$this->session->userdata('id_peg')
                        );
                        $num = $this->db->get_where('tabel_pegawai',$arr);
                       
                    }else{
                        $arr = array(
                            // 'id_skpd'=>$this->session->userdata('id_skpd'),
                            'tahun'=>$this->session->userdata('tahunLap'),
                            'jenis_lap'=>$this->session->userdata('jenisLap')
                        );
                        if($this->session->userdata('level_lap') != 'admin_kab'){
                            $arr['id_skpd']= $this->session->userdata('id_skpd');
                        }
                        //     $arr['id_skpd']=$this->session->userdata('id_skpd');
                        // }
                        $tabel = 'tabel_laporan_skpd';
                        $id_tabel = 'id_lap_skpd';
                        // revisi baru
                        $arr[$ringkasan] = $this->input->post($ringkasan);
                        $num = $this->db->get_where('tabel_laporan_skpd',$arr);
                    }
                }else{ //untuk laporan
                    $arr = array(
                        'id_skpd'=>$this->session->userdata('id_skpd'),
                       'id_peg'=>$this->session->userdata('id_peg'),// sementara nant aktifkan jika ada id peg
                        'tahun'=>$this->input->post('tahun'),
                        'triwulan'=>$this->input->post('triwulan'),
                    );
                    $tabel = 'tabel_laporan';
                    $id_tabel = 'id_lap';
                    $num = $this->db->get_where('tabel_laporan',$arr);
                    
                    $arr['laporan'] = $this->input->post('laporan');
                    $arr['aksi'] = $this->input->post('aksi');
                    $arr['capaian'] = $this->input->post('capaian');
                    $arr['evaluasi'] = $this->input->post('evaluasi');
                    $arr['hambatan'] = $this->input->post('hambatan');
                    $arr['strategi'] = $this->input->post('strategi');
                }

                $dname = explode(".", $_FILES['file']['name']);
                $ext = end($dname);
                // .'('.time().')'
                $arr[$name] = $namaFile.'.'.$ext;

                // echo $num->num_rows();
                if($num->num_rows() == 0){
                    if($redirect == 'buatLap'){
                        $arr['status'] = 'ajuan';
                    }
                    $this->db->insert($tabel,$arr);
                }else{
                    if($redirect == 'buatLap'){
                        $arr['status'] = 'revisi';
                        // revisi dinamis rencana aksi
                        $this->db->insert($tabel,$arr);
                    }
                    // revisi dinamis rencana aksi
                    else{
                        $this->mcrud->rubah($id_tabel,$num->row()->$id_tabel,$tabel,$arr);
                    }
                    
                }
            // }
                //isi data history
                if($redirect == 'buatLap'){
                    $peg = $this->db->get_where('tabel_pegawai',array('id_peg'=>$this->session->userdata('id_peg')))->row();
                    
                    if($peg->esselon == null){
                        $target['id_kasi'] = $peg->id_kasi;
                        $target['esselon'] = 'esselon IV';
                    }elseif($peg->esselon === 'esselon IV'){
                        $target['esselon'] = 'esselon III';
                        $target['id_kabag'] = $peg->id_kabag;
                    }elseif($peg->esselon === 'esselon III'){
                        $target['esselon'] = 'esselon II';
                        $target['id_kabag'] = null;
                    }
                    // $target['id_peg'] = $this->session->userdata('id_peg');
                    $target['id_skpd'] = $this->session->userdata('id_skpd');

                    $atasan = $this->db->get_where('tabel_pegawai', $target)->row();
                    
                    $history = array(
                        'id_skpd'=>$this->session->userdata('id_skpd'),
                        'id_peg'=>$atasan->id_peg ? $atasan->id_peg : $this->session->userdata('id_peg'),
                        'history'=>$arr['status'].' rencana aksi, triwulan ke '.$this->input->post('triwulan').', tahun '.$this->input->post('tahun'),
                        'oleh'=>$this->session->userdata('nama'),
                        'id_pengirim'=>$this->session->userdata('id_peg')
                    );
                    
                    // echo json_encode($atasan)."<br/><br/><br/>";
                    // echo json_encode($history);
                    $this->db->insert('tabel_history', $history);

                }

                $this->session->set_flashdata('upload', true);  
                $this->session->set_flashdata('pesan', 'Sukses upload');    
                // echo json_encode($arr);
                redirect('../login/dashboard/'.$redirect);
        }
    }


    public function newUpload($target,$file,$redirect){
        
        $namaFiles = $file.'('.time().')';

        $config['upload_path']          = './assets/berkas';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['file_name']            = $namaFiles;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
                
                $this->session->set_flashdata('upload', true);    
                $this->session->set_flashdata('pesan', 'Gagal upload berkas'); 
                redirect('../login/dashboard/'.$redirect);
        }
        else
        {  
                $dname = explode(".", $_FILES['file']['name']);
                $ext = end($dname);
                $arr = array(
                    'id_skpd'=>$this->session->userdata('id_skpd'),
                   'id_peg'=>$this->session->userdata('id_peg'),// sementara nant aktifkan jika ada id peg
                    'tahun'=>$this->input->post('tahun'),
                );
                if($target == 'pk'){
                    $lapo = "perjanjian kinerja";
                    $tabel = "tabel_laporan_pk";
                    $id_tabel = "id_pk";
                    $num = $this->db->get_where('tabel_laporan_pk',$arr);
                    $arr['sasaran'] = $this->input->post('sasaran');
                    $arr['indikator'] = $this->input->post('indikator');
                    $arr['target1'] = $this->input->post('target1');
                    $arr['target2'] = $this->input->post('target2');
                    $arr['target3'] = $this->input->post('target3');
                    $arr['target4'] = $this->input->post('target4');
                    $arr['berkas'] = $namaFiles.'.'.$ext;
                }else{
                    $lapo = "indikator kinierja individu";
                    $tabel = "tabel_laporan_iki";
                    $id_tabel = "id_iki";
                    $num = $this->db->get_where('tabel_laporan_iki',$arr);
                    $arr['kinerja'] = $this->input->post('kinerja');
                    $arr['indikator'] = $this->input->post('indikator');
                    $arr['formula'] = $this->input->post('formula');
                    $arr['sumber'] = $this->input->post('sumber');
                    $arr['berkas'] = $namaFiles.'.'.$ext;
                }
                    

                $peg = $this->db->get_where('tabel_pegawai',array('id_peg'=>$this->session->userdata('id_peg')))->row();
                    
                    if($peg->esselon == null){
                        $targ['id_kasi'] = $peg->id_kasi;
                        $targ['esselon'] = 'esselon IV';
                    }elseif($peg->esselon === 'esselon IV'){
                        $targ['esselon'] = 'esselon III';
                        $targ['id_kabag'] = $peg->id_kabag;
                    }elseif($peg->esselon === 'esselon III'){
                        $targ['esselon'] = 'esselon II';
                        $targ['id_kabag'] = null;
                    }
                    // $targ['id_peg'] = $this->session->userdata('id_peg');
                    $targ['id_skpd'] = $this->session->userdata('id_skpd');

                    $atasan = $this->db->get_where('tabel_pegawai', $targ)->row();
                    
                    $history = array(
                        'id_skpd'=>$this->session->userdata('id_skpd'),
                        'id_peg'=>$atasan->id_peg ? $atasan->id_peg : $this->session->userdata('id_peg'),
                        'history'=>'Mengajukan '.$lapo.', tahun '.$this->input->post('tahun'),
                        'oleh'=>$this->session->userdata('nama'),
                        'id_pengirim'=>$this->session->userdata('id_peg')
                    );
                    $this->db->insert('tabel_history', $history);
                    
                    $this->session->set_flashdata('upload', true);    

                if($num->num_rows() == 0){
                    $this->db->insert($tabel,$arr);
                    $this->session->set_flashdata('pesan', 'sukses tambah data'); 
                }else{
                    $this->mcrud->rubah($id_tabel,$num->row()->$id_tabel,$tabel,$arr);
                    $this->session->set_flashdata('pesan', 'sukses update data'); 
                }
            
                
                
                redirect('../login/dashboard/'.$redirect);

        }
    }


    public function add()
    {
        $data = $this->input->post();
        $data['password'] = base64_encode($this->input->post('password').'user');
        $this->db->insert('tabel_skpd', $data);
        $this->session->set_flashdata('upload', true);  
        $this->session->set_flashdata('pesan', 'SKPD telah ditambahkan');  
        redirect('../login/dashboard/ListAdmin');
        // echo var_dump($data);
        
    }

    public function edit($id)
    {
        $data = $this->input->post();
        $data['password'] = base64_encode($this->input->post('password').'user');
        $this->db->where('id_skpd', $id);
        // $this->db->set($data);
		$this->db->update('tabel_skpd',$data);
        $this->session->set_flashdata('upload', true);  
        $this->session->set_flashdata('pesan', 'SKPD telah dirubah');  
        redirect('../login/dashboard/ListAdmin');
        
    }

    public function editProfil(){
        $data = $this->input->post();
        $id = $this->session->userdata('id_skpd');

        $user =$this->db->get('tabel_skpd')->result();
        $cek = false;
        foreach($user as $val){
            if($val->id_skpd != $id){
                $user1 = strtolower(str_replace(' ', '', $val->username));
                $user2 = strtolower(str_replace(' ', '', $this->input->post('username')));
                if($user1 === $user2){
                    $cek = true;
                }
            }
        };

        if($cek){
            $this->session->set_flashdata('upload', true);  
            $this->session->set_flashdata('pesan', 'Mohon ganti username');  
            redirect('../login/dashboard/profil');
        }else{
            $arr = array(
                'skpd'=> $this->input->post('skpd'),
                'username'=>$this->input->post('username'),
                'password'=>base64_encode($this->input->post('password').'user')
            );
            $this->db->where('id_skpd', $id);
            $this->db->update('tabel_skpd',$arr);
            $this->session->set_flashdata('upload', true);  
            $this->session->set_flashdata('pesan', 'Berhasil di update');  
            redirect('../login/dashboard/profil');
        }
        
    }

    public function editStaf()
    {   
        $data = $this->input->post();
        $data['password'] = base64_encode($this->input->post('password').'user');
        $id = $this->session->userdata('id_peg');
        $this->db->where('id_peg', $id);
        $this->db->update('tabel_pegawai',$data);
        $this->session->set_flashdata('upload', true);  
        $this->session->set_flashdata('pesan', 'Berhasil di update');  
        redirect('../login/dashboard/profil');
        // echo json_encode($this->input->post());
    }

    public function tanggapan(){
        echo 'tanggapan';
    }

    public function tambahAdmin(){
        $jum = $this->db->get_where('tabel_skpd',array('username'=>$this->input->post('username')))->num_rows();
        if($jum == 0){
            $data['level_lap'] = 'admin_kab';
            $data['skpd'] = '';
            $data['level'] = 'admin';
            $data['username'] = $this->input->post('username');
            $data['password'] = base64_encode($this->input->post('password').'user');
            $this->db->insert('tabel_skpd', $data);
            $this->session->set_flashdata('upload', true); 
            $this->session->set_flashdata('pesan', 'Admin di tambah');  
        }else{
            $this->session->set_flashdata('upload', true); 
            $this->session->set_flashdata('pesan', 'username sudah ada ganti yang lain');  
        }
        redirect('../login/dashboard/profil');
    }

}

/* End of file Login.php */
