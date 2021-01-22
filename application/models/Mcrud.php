<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {
    
    public function isi($tabel,$data)
    {
     $this->db->insert($tabel, $data);
    }

    public function baca($tabel)
    {
       return $this->db->get($tabel)->result();
    }

    public function pilihData($tabel,$arr){
        return $this->db->get_where($tabel,$arr)->result();
    }


    public function joinTabel($tabel1,$tabel2,$field1,$field2,$id){
        $data = $tabel1.".".$field2." = ".$tabel2.".".$field2;
        $this->db->select('*'); 
        $this->db->from($tabel1);
        $this->db->join($tabel2, $data);
        $this->db->where($tabel1.".".$field1, $id);
        return $this->db->get()->result();
    }


    public function hapus($field,$value,$tabel)
    {
        $this->db->where($field, $value);
		return $this->db->delete($tabel);
    }

    public function rubah($field,$value,$tabel,$data)
    {
        $this->db->where($field, $value);
		return $this->db->update($tabel,$data);
    }

    public function pilihUrl($url){
        switch($url){
            case 'ListGlobal':
                // $arr = array(
                //     'id_skpd'=> $this->session->userdata('id_skpd'),
                //     );
                $this->db->select('id_skpd, skpd');
                $this->db->where('level_lap !=' , 'admin_kab');
                $da['skpd'] = $this->db->get('tabel_skpd')->result();    
                $da['laporan'] = $this->db->get('tabel_laporan')->result();
                $da['pk'] = $this->db->get('tabel_laporan_pk')->result();
                $da['iki'] = $this->db->get('tabel_laporan_iki')->result();
                $this->db->select('id_peg, nama, id_skpd,esselon,jabatan');
                $da['pegawai'] = $this->db->get('tabel_pegawai')->result();
                return $da;
                break;
            case 'buatLap':
                $arr = array(
                    'id_skpd'=> $this->session->userdata('id_skpd'),
                    'id_peg'=> $this->session->userdata('id_peg')
                );
                $lap['tanggapan'] = $this->db->get_where('tabel_tanggapan',array('id_peg'=> $this->session->userdata('id_peg')))->result();
                $lap['laporan'] = $this->db->get_where('tabel_laporan',$arr )->result();
                return $lap;
                break;
            case 'buatLapIKI':
                $arr = array(
                    'id_skpd'=> $this->session->userdata('id_skpd'),
                    'id_peg'=> $this->session->userdata('id_peg')
                );

                return $this->db->get_where('tabel_laporan_iki',$arr )->result();
                // return  $lap;
                break;
            case 'buatLapPK':
                $arr = array(
                    'id_skpd'=> $this->session->userdata('id_skpd'),
                    'id_peg'=> $this->session->userdata('id_peg')
                );
                $this->db->order_by("tahun","desc");
                return $this->db->get_where('tabel_laporan_pk',$arr )->result();
                // return $lap;
                break;
            case 'kirimLap':
                $arr = array(
                    'id_skpd'=> $this->session->userdata('id_skpd'),
                    );
                $da['lapSKPD'] = $this->db->get_where('tabel_laporan_skpd',$arr)->result();
                $da['lapIKI'] = $this->db->get_where('tabel_laporan',$arr)->result();
                $this->db->select('id_peg, nama, nip');
                $da['pegawai'] = $this->db->get_where('tabel_pegawai',$arr)->result();
                return $da;
                break;
            case 'ListIKI':
                // $arr = array(
                //     'id_skpd'=> $this->session->userdata('id_skpd'),
                //     );
                $this->db->select('id_skpd, skpd');
                $this->db->where('level_lap !=' , 'admin_kab');
                $da['skpd'] = $this->db->get('tabel_skpd')->result();    
                $da['laporan'] = $this->db->get('tabel_laporan')->result();
                $this->db->select('id_peg, nama, id_skpd,esselon');
                $da['pegawai'] = $this->db->get('tabel_pegawai')->result();
                return $da;
                break;
            case 'ListAdmin':
                return $this->db->get('tabel_skpd')->result();
                break;
            case 'ListJabatan':
                $data['kabag'] = $this->db->get_where('tabel_kabag',array('id_skpd'=>$this->session->userdata('id_skpd')))->result();
                $data['kasi'] = $this->db->get_where('tabel_kasi',array('id_skpd'=>$this->session->userdata('id_skpd')))->result();
                return $data;
                break;
          
            case 'CekLaporan':
                $arr['id_skpd'] =  $this->session->userdata('id_skpd');
                $dat['laporan'] = $this->db->get_where('tabel_laporan',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();
                if($this->session->userdata('sebagai') == 'pegawai'){
                    if($this->session->userdata('esselon') == 'esselon IV'){
                        $arr['id_kasi'] = $this->session->userdata('id_jabatan');
                    }elseif($this->session->userdata('esselon') == 'esselon III'){
                        $arr['id_kabag'] = $this->session->userdata('id_jabatan');
                        $this->db->where('esselon' , 'esselon IV');
                    }else{
                        $this->db->where('esselon' , 'esselon III');
                    }
                    
                }else{
                    redirect('../login/dashboard');
                
                }
                
                $this->db->where('id_peg !=' , $this->session->userdata('id_peg'));
                $dat['pegawai'] = $this->db->get_where('tabel_pegawai',$arr )->result(); 
                 return $dat;
                break;
            case 'ListLapSemuaPegawai':
                $arr['id_skpd'] =  $this->session->userdata('id_skpd');
                //ini bisa di buka jika monitoring untuk perjabatan
                if($this->session->userdata('sebagai') == 'pegawai'){
                    if($this->session->userdata('esselon') == 'esselon IV'){
                        $arr['id_kasi'] = $this->session->userdata('id_jabatan');
                    }elseif($this->session->userdata('esselon') == 'esselon III'){
                        $arr['id_kabag'] = $this->session->userdata('id_jabatan');
                        // $this->db->where('esselon' , 'esselon IV');
                    }
                }
                    $this->db->where('id_peg !=' , $this->session->userdata('id_peg'));
                    $iki['pegawai'] = $this->db->get_where('tabel_pegawai',$arr )->result();
                    $iki['laporan'] = $this->db->get_where('tabel_laporan',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();
                    $iki['iki'] = $this->db->get_where('tabel_laporan_iki',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();
                    $iki['pk'] = $this->db->get_where('tabel_laporan_pk',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();

                    return $iki;
             
                break;
            case 'ListLapSKPD':
                return $this->db->get_where('tabel_laporan_skpd',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();
                break;
            case 'ListLapKab':
                return $this->db->get_where('tabel_laporan_skpd',array('jenis_lap'=>'kabupaten') )->result();
                break;
            case 'ListPegawai':
                $this->db->order_by("esselon","asc");
                return $this->db->get_where('tabel_pegawai',array('id_skpd'=>$this->session->userdata('id_skpd')) )->result();
                break;
            case 'profil':
                if($this->session->userdata('sebagai') == "pegawai"){
                    $id = $this->session->userdata('id_peg');
                    return $this->db->get_where('tabel_pegawai',array('id_peg'=>$id))->row();//$this->session->userdata('id_peg')))->row();
                }else{
                    $id = $this->session->userdata('id_skpd');
                    return $this->db->get_where('tabel_skpd',array('id_skpd'=>$id))->row();
                }
                break;
            case 'SakipKab':
                $thnLap = array(
                    // 'id_skpd'=>$this->session->userdata('id_skpd'),
                    'tahun'=> date("Y"),
                    'jenis_lap'=> 'kabupaten'
                );
                // revisi
                // return $this->db->get_where('tabel_laporan_skpd',$thnLap)->row();
                return $this->db->get_where('tabel_laporan_skpd',$thnLap)->result();
                break;
            case 'SakipSKPD':
                $thnLap = array(
                    'id_skpd'=>$this->session->userdata('id_skpd'),
                    'tahun'=> date("Y"),
                    'jenis_lap'=> 'skpd'
                );
                // revisi buntau
                // return $this->db->get_where('tabel_laporan_skpd',$thnLap)->row();
                return $this->db->get_where('tabel_laporan_skpd',$thnLap)->result();
                break;
            case 'sidePesan':
                if($this->session->userdata('sebagai') != "pegawai"){
                    redirect('../login/dashboard');
                }else{
                    // $id = $this->session->userdata('id_peg');
                    // $skpd
                    $histor = array(
                        // 'id_peg'=>$this->session->userdata('id_peg'),
                        'id_skpd'=>$this->session->userdata('id_skpd')
                    );
                    return $this->db->get_where('tabel_history',$histor)->result();
                }
                break;
            default:
                $this->db->order_by("tgl","desc");
                $da['history'] = $this->db->get('tabel_history',10)->result();
                $da['laporan'] = $this->db->get('tabel_laporan_skpd')->result();
                $this->db->where('level_lap !=','admin_kab');
                $da['skpd'] = $this->db->get('tabel_skpd')->result();
                $da['ra'] = $this->db->get_where('tabel_laporan',array('id_skpd'=>$this->session->userdata('id_skpd'),'tahun'=>Date("Y")))->result();
                $da['jumPeg'] = $this->db->get_where('tabel_pegawai',array('id_skpd'=>$this->session->userdata('id_skpd')))->num_rows();
                return $da;
                
                break;
        }
    }

    public function jam($waktu){
        $sekarang = date("Y-m-d H:i:s");
        $date1 = strtotime($sekarang);  
        $date2 = strtotime($waktu);  
        $diff = abs($date2 - $date1);  
        
        $years = floor($diff / (365*60*60*24));  
        
        $months = floor(($diff - $years * 365*60*60*24) 
                                    / (30*60*60*24));  
        
        $days = floor(($diff - $years * 365*60*60*24 -  
                    $months*30*60*60*24)/ (60*60*24)); 
        
        $hours = floor(($diff - $years * 365*60*60*24  
            - $months*30*60*60*24 - $days*60*60*24) 
                                        / (60*60));  
        
        $minutes = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24  
                                - $hours*60*60)/ 60);  
        
        $seconds = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24 
                        - $hours*60*60 - $minutes*60));

        return $hours.' jam, '.$minutes.' menit';

    }

   
    

}

/* End of file Crud.php */

?>