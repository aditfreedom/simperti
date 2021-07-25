<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Adminuser extends CI_Controller {

    function __construct(){
        parent::__construct();
		$datauser = $this->session->userdata('login'); 
		$role=$this->session->userdata('role');
		if (($datauser == "Berhasil") && ($role == "1") ) {
			redirect(base_url('admin'));
		}
		if (($datauser == "Berhasil") && ($role == "0") ) {
			redirect(base_url('home'));
		}
		if($role=="0"){
			redirect(base_url('home'));
		}
		if ($role=="1"){
			redirect(base_url('admin'));
		}
    }

    public function login()
	{
		$this->load->model('M_assesmen');
		$this->load->view('login_admin');	
	}


    public function login_aksi(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
 
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
 
        if($this->form_validation->run() != FALSE){
            
 
             $ceklogin = $this->M_assesmen->cek_login_admin($username,$password)->num_rows();
             $cekloginid = $this->M_assesmen->cek_login_admin($username,$password)->result();
             if ($ceklogin == 1) {
                 foreach ($cekloginid as $cek) {
                     $id = $cek->id_user;
                     $role = $cek->role;
					 $nama = $cek->nama;
                     $username = $cek->no_induk;
                     $password = $cek->tanggal_lahir;
                    }
 

                     $sess_data =  array(
                         'no_induk' => $username,
                         'tanggal_lahir' => $password,
						 'nama' => $nama,
                         'id_user' => $id,
                         'role' => $role,
                         'login' => 'Berhasil'              
                        );
 
                //  redirect(base_url('home'));


                 if ($sess_data["role"] == "0"){
                    $this->session->set_userdata($sess_data); 
                     redirect(base_url('home')); 
                 }

                 else if ($sess_data["role"] == "1"){
                    $this->session->set_userdata($sess_data); 
                    redirect(base_url('admin')); 
                 }
                 else{
                    $this->load->view('gagallogin');

                }
                 
			}else{
                 $this->load->view('error');
             }
 
        }else{

         $this->load->view('error');
		}
    
     }

     public function registrasi()
	{
		$this->load->view('registrasi');
	}

    public function tambahuser(){
		$id_pesertadidik       = $this->input->get('hsh');
		$username           = $this->input->get('nik');
		$password           = $this->input->get('nisn');
	
		
		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
			'username' => $username,
			'password' => $password,
			'role' => "2",
			'approve_formulir' 	=> "Antrian",
			'approve_lulus' 	=> "Antrian",
			'approve_daftarulang' => "Antrian",
            'status' => 0

		);

		$hitungusername= $this->M_ppdb->tampildatapengguna1($username,$password);

		if ($hitungusername >=1) {
			$this->load->view('username_gagal');   
		}else{
            $hitungusernamedata= $this->M_ppdb->tampildatasiswa($username,$password);
           
                $this->M_ppdb->tambahuser($data,'pengguna');
                $this->load->view('status');  
  
		}
		

	}

    public function tambahnonisn(){
		$id_pesertadidik        = $this->input->post('id_pesertadidik');
		$id_sekolah             = $this->input->post('id_sekolah');
		$nama_siswa             = $this->input->post('nama_siswa');
        $tempat_lahir           = $this->input->post('tempat_lahir');
		$tanggal_lahir          = $this->input->post('tanggal_lahir');
		$jk                     = $this->input->post('jk');
		$nik                    = $this->input->post('nik');
		$nisn                   = $this->input->post('nisn');
		$alamat_jalan           = $this->input->post('alamat_jalan');
		$desa_kelurahan         = $this->input->post('desa_kelurahan');
		$rt                     = $this->input->post('rt');
		$rw                     = $this->input->post('rw');
		$nama_dusun             = $this->input->post('nama_dusun');
		$nama_ibu_kandung       = $this->input->post('nama_ibu_kandung');
		$pekerjaan_ibu_kandung  = $this->input->post('pekerjaan_ibu_kandung');
		$penghasilan_ibu_kandung= $this->input->post('penghasilan_ibu_kandung');
		$nama_ayah              = $this->input->post('nama_ayah');
		$pekerjaan_ayah         = $this->input->post('pekerjaan_ayah');
		$penghasilan_ayah       = $this->input->post('penghasilan_ayah');
		$nama_wali              = $this->input->post('nama_wali');
		$pekerjaan_wali         = $this->input->post('pekerjaan_wali');
		$penghasilan_wali       = $this->input->post('penghasilan_wali');
		$no_kip                 = $this->input->post('no_kip');
		$no_pkh                 = $this->input->post('no_pkh');
		
        $data = array(
			'id_pesertadidik' => $id_pesertadidik,
            'id_sekolah' => $id_sekolah,
			'kode_wilayah' => "0",
			'nama_siswa' => $nama_siswa,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jk' => $jk,
			'nik' => $nik,
			'nisn' => $nisn,
			'alamat_jalan' => $alamat_jalan,
			'desa_kelurahan' => $desa_kelurahan,
			'rt' => $rt,
			'rw' => $rw,
			'nama_dusun' => $nama_dusun,
			'nama_ibu_kandung' => $nama_ibu_kandung,
			'pekerjaan_ibu_kandung' => $pekerjaan_ibu_kandung,
			'penghasilan_ibu_kandung' => $penghasilan_ibu_kandung,
			'nama_ayah' => $nama_ayah,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'penghasilan_ayah' => $penghasilan_ayah,
			'nama_wali' => $nama_wali,
			'pekerjaan_wali' => $pekerjaan_wali,
			'penghasilan_wali' => $penghasilan_wali,
			'kebutuhan_khusus' => "Tidak Ada",
			'no_kip' => $no_kip,
			'no_pkh' => $no_pkh,
			'lintang' => "0",
			'bujur' => "0",
		);

		$data2 = array(
			'id_pesertadidik' => $id_pesertadidik,
			'username' => $nik,
			'password' => $nisn,
			'role' => "2",
			'approve_formulir' 	=> "Antrian",
			'approve_lulus' 	=> "Antrian",
			'approve_daftarulang' => "Antrian",
            'status' => 0
		);

		$hitungusername= $this->M_ppdb->tampildatapengguna1($nik,$nisn);

		if ($hitungusername >=1) {
			$this->load->view('username_gagal');   
		}else{
            $hitungusernamedata= $this->M_ppdb->tampildatasiswa($nik,$nisn);
            if ($hitungusernamedata>=1) {
                $this->load->view('username_gagal');   
            }else {
                $this->M_ppdb->tambahuser($data2,'pengguna');
                $this->M_ppdb->tambahdatasiswa($data,'datasiswa');
                $this->load->view('status');    
            }   
		}
		

	}


    public function cariuser(){
		$nisn       = $this->input->get('nisn');
        $data['cariuser'] = $this->M_ppdb->tampilsiswa($nisn,'datasiswa')->result();
        if ($data['cariuser']==null) {
            $this->load->view('data_tidak_ditemukan');    
        }else {
            $this->load->view('cariuser',$data);
        }

	}

    public function tanpanisn(){
        $data['joinsekolah'] = $this->M_ppdb->joinsekolah()->result();
        $this->load->view('tanpanisn',$data);

	}


}
