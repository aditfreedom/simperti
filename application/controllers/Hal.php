<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Hal extends CI_Controller {

    function __construct(){
        parent::__construct();
		$datauser = $this->session->userdata('login'); 
		$role=$this->session->userdata('role');
		if (($datauser == "Berhasil") && ($role == "1") ) {
			redirect(base_url('kep'));
		}
		if (($datauser == "Berhasil") && ($role == "0") ) {
			redirect(base_url('admin'));
		}
		if (($datauser == "Berhasil") && ($role == "2") ) {
			redirect(base_url('tu'));
		}
		if (($datauser == "Berhasil") && ($role == "3") ) {
			redirect(base_url('user'));
		}
    }


	public function index()
	{
		$this->load->model('M_simperti');
		$this->load->view('login');	

	}


    public function login_aksi(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
		$role = $this->input->post('role',true);

 
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('role','Role','required');

        if($this->form_validation->run() != FALSE){
            
 
             $ceklogin = $this->M_simperti->cek_login_user($username,$password,$role)->num_rows();
             $cekloginid = $this->M_simperti->cek_login_user($username,$password,$role)->result();
             if ($ceklogin == 1) {
                 foreach ($cekloginid as $cek) {
                     $id_user = $cek->id_user;
                     $nama = $cek->nama;
                     $nip = $cek->nip;
                     $role = $cek->role;
                    }
 

                     $sess_data =  array(
                         'id_user' => $id_user,
                         'nama' => $nama,
                         'nip' => $nip,
                         'role' => $role,
                         'login' => 'Berhasil'              
                        );
 
                //  redirect(base_url('home'));

                if ($sess_data['role'] == "0"){
                    $this->session->set_userdata($sess_data); 
                    redirect(base_url('admin')); 
                 }elseif($sess_data['role'] == "1"){
					$this->session->set_userdata($sess_data); 
                    redirect(base_url('kep')); 
				 }
				 elseif($sess_data['role'] == "2"){
					$this->session->set_userdata($sess_data); 
                    redirect(base_url('tu')); 
				 }
				 elseif($sess_data['role'] == "3"){
					$this->session->set_userdata($sess_data); 
                    redirect(base_url('user')); 
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

	
    public function tambahsekolah(){
		$this->load->view('tambahsekolah');
		

	}

	public function insertsekolah(){
		$id_sekolah        		= $this->input->post('id_sekolah');
		$npsn		            = $this->input->post('npsn');
		$nama_sekolah           = $this->input->post('nama_sekolah');
        $kode_wilayah           = $this->input->post('kode_wilayah');
		$bentuk_pendidikan      = $this->input->post('bentuk_pendidikan');
		$status_sekolah         = $this->input->post('status_sekolah');
		$alamat_jalan           = $this->input->post('alamat_jalan');
		$desa_kelurahan         = $this->input->post('desa_kelurahan');
		$rt                     = "0";
		$rw                     = "0";
		$lintang                = "0";
		$bujur                  = "0";
		
        $data = array(
			'id_sekolah' => $id_sekolah,
            'npsn' => $npsn,
			'nama_sekolah' => $nama_sekolah,
			'kode_wilayah' => $kode_wilayah,
			'bentuk_pendidikan' => $bentuk_pendidikan,
			'status_sekolah' => $status_sekolah,
			'alamat_jalan' => $alamat_jalan,
			'desa_kelurahan' => $desa_kelurahan,
			'rt' => $rt,
			'rw' => $rw,
			'lintang' => $lintang,
			'bujur' => $bujur
		);

		$hitungnpsn= $this->M_ppdb->tampilsekolahnpsn($npsn);

		if ($hitungnpsn >= 1) {
			$this->load->view('sekolah_ada'); 
		}else{
			$this->M_ppdb->updatesd($data,'data_sd');
			$this->load->view('sekolah_sukses'); 
		}
	}


	public function progress_data()
	{

		$data['tampilsekolah'] = $this->M_ppdb->tampilsekolah()->result();
		$data['kecamatan'] = $this->M_ppdb->tampilkuotawilayah();

		$this->load->view('progress_hal',$data);
	}



	public function tampil_sekolah_wilayah($id)
	{
		$data['tampil_sekolah_wilayah'] = $this->M_ppdb->tampil_sekolah_wilayah($id)->result();
		$data['tampil_sekolah_wilayah2'] = $this->M_ppdb->tampil_sekolah_wilayah2($id)->result();


		$this->load->view('tampil_sekolah_wilayah_hal',$data);
	}

}
