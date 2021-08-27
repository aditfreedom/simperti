<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
        parent::__construct();
        $datauser = $this->session->userdata('login'); 
		if ($datauser!= "Berhasil") {
            $this->session->sess_destroy();
			redirect(base_url());
		}
	}

	//simperti projek
	public function index()
	{
		$this->load->model('M_simperti');
		$sess_data = $this->session->userdata();
		// $data['kuota'] = $this->M_ppdb->tampilkuota($datauser)->result();
		// $data['zonasi'] = $this->M_ppdb->tampilzonasi($datauser);
		// $data['afirmasi'] = $this->M_ppdb->tampilafirmasi($datauser);
		// $data['pindahan'] = $this->M_ppdb->tampilpindahan($datauser);
		// $data['prestasi'] = $this->M_ppdb->tampilprestasi($datauser);
		// $data['umum'] = $this->M_ppdb->tampilumum($datauser);
		// $data['formulirapprove'] = $this->M_ppdb->tampilformulirapprove($datauser);
		// $data['siswalulus'] = $this->M_ppdb->tampilsiswalulus($datauser);
		// $data['siswadaftarulang'] = $this->M_ppdb->tampilsiswadaftarulang($datauser);
		// $data['pendaftar'] = $this->M_ppdb->tampilpendaftar($datauser);


		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}

	public function tambahdivisi(){
	   
		$data = array(
			'nama_divisi' => $this->input->post('nama_divisi')
		);
	
		$this->M_simperti->tambahdivisi($data,'divisi');
		redirect(base_url('admin/divisi'));
	}

	public function edit_divisi($id){
		$sess_data = $this->session->userdata();
		$data['edit_divisi'] = $this->M_simperti->edit_divisi($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_divisi',$data);
		$this->load->view('template/footer');
	}

	public function updatedivisi(){
	
		$data = array(
			'nama_divisi' => $this->input->post('nama_divisi')
		);
	
		$where = array(
			'id_divisi' => $this->input->post('id_divisi')
		);


	
		$this->M_simperti->updatedivisi($where,$data,'divisi');
		$this->load->view('berhasil_ubah_divisi');
	}

	public function hapus_divisi($id){
		$where =    array ('id_divisi' => $id);
		$this->M_simperti->hapus_divisi($table,$where);
		redirect(base_url('admin/divisi'));
	}

	public function atasan()
	{
		$sess_data = $this->session->userdata();
		$data['atasan'] = $this->M_simperti->tampil_data_atasan()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('atasan',$data);
		$this->load->view('template/footer');
	}

	public function tambahatasan(){
		$tanda_tangan = $_FILES['tanda_tangan']['name'];

        $config['upload_path']          = 'asset/tandatangan/';
        $config['allowed_types']        = 'jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $array = explode('.', $_FILES['tanda_tangan']['name']);
        $extension = end($array);
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
         
        //zonasi1
        if (! $this->upload->do_upload('tanda_tangan')) {
            // $error = array('error' => $this->upload->display_errors());
            $this->load->view('error_upload_berkas2');
        }else{
            $tanda_tangan=$this->upload->data('file_name');
        }
        
		
		$data = array(
			'nama_atasan' => $this->input->post('nama_atasan'),
            'nip' => $this->input->post('nip'),
            'jabatan_atasan' => $this->input->post('jabatan_atasan'),
            'tanda_tangan' => $tanda_tangan
		);    
    

        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG" || $extension == "JPEG" || $extension == "PNG") {
                $this->M_simperti->tambahatasan($data,'atasan');
                $this->load->view('berhasil_tambah_atasan');
        }else {
            $this->load->view('gagal_upload_berkas');
        }

	}


	public function updateatasan(){
		$tanda_tangan 		= $_FILES['tanda_tangan']['name'];
		$tanda_tangan_lama 	= $this->input->post('tanda_tangan_lama');

	
		$config['upload_path']          = 'asset/tandatangan/';
        $config['allowed_types']        = 'jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $array = explode('.', $_FILES['tanda_tangan']['name']);
        $extension = end($array);
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

	   //zonasi1
	   if (! $this->upload->do_upload('tanda_tangan')) {
		// $error = array('error' => $this->upload->display_errors());
		$this->load->view('error_upload_berkas2');
	}else{
		$tanda_tangan=$this->upload->data('file_name');
	}

        if ($tanda_tangan == null) {
            $tanda_tangan = $tanda_tangan_lama;
        }	

    
        
		$data = array(
			'nama_atasan' => $this->input->post('nama_atasan'),
            'nip' => $this->input->post('nip'),
            'jabatan_atasan' => $this->input->post('jabatan_atasan'),
            'tanda_tangan' => $tanda_tangan
		);   

        $where = array(
            'id_atasan' => $this->input->post('id_atasan')
        );

    
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG" || $extension == "JPEG" || $extension == "PNG" || $extension == null) {
			$this->M_simperti->updateatasan($where, $data, 'atasan');
			$this->load->view('berhasil_tambah_atasan');
		}else {
			$this->load->view('gagal_upload_berkas');
		}
	}



	public function edit_atasan($id){
		$sess_data = $this->session->userdata();
		$data['edit_atasan'] = $this->M_simperti->edit_atasan($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_atasan',$data);
		$this->load->view('template/footer');
	}

	public function divisi()
	{
		$sess_data = $this->session->userdata();
		$data['divisi'] = $this->M_simperti->tampil_divisi()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('divisi',$data);
		$this->load->view('template/footer');
	}
	

	public function hapus_atasan($id){
		$where =    array ('id_atasan' => $id);
		$this->M_simperti->hapus_atasan($table,$where);
		redirect(base_url('admin/atasan'));
	}


	public function karyawan()
	{
		$sess_data = $this->session->userdata();
		$data['karyawan'] = $this->M_simperti->tampil_data_karyawan()->result();
		$data['atasan'] = $this->M_simperti->tampil_data_atasan()->result();
		$data['divisi'] = $this->M_simperti->tampil_divisi()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('karyawan',$data);
		$this->load->view('template/footer');
	}

	public function tambahkaryawan(){
	   
		$data = array(
			'nama' => $this->input->post('nama'),
			'nip_user' => $this->input->post('nip_user'),
			'jabatan' => $this->input->post('jabatan'),
			'divisi_user' => $this->input->post('divisi_user'),
			'id_atasan' => $this->input->post('id_atasan'),
			'role' => $this->input->post('role'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
	
		$this->M_simperti->tambahkaryawan($data,'user');
		redirect(base_url('admin/karyawan'));
	}

	public function hapus_karyawan($id){
		$where =    array ('id_user' => $id);
		$this->M_simperti->hapus_karyawan($table,$where);
		redirect(base_url('admin/karyawan'));
	}

	public function edit_karyawan($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_karyawan'] = $this->M_simperti->tampil_data_karyawan_edit($id)->result();
		$data['atasan'] = $this->M_simperti->tampil_data_atasan()->result();
		$data['divisi'] = $this->M_simperti->tampil_divisi()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_karyawan',$data);
		$this->load->view('template/footer');
	}


	public function updatekaryawan(){
	
		$data = array(
			'nama' => $this->input->post('nama'),
			'nip_user' => $this->input->post('nip_user'),
			'jabatan' => $this->input->post('jabatan'),
			'divisi_user' => $this->input->post('divisi_user'),
			'id_atasan' => $this->input->post('id_atasan'),
			'role' => $this->input->post('role'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')		);
	
		$where = array(
			'id_user' => $this->input->post('id_user')
		);


	
		$this->M_simperti->updatekaryawan($where,$data,'user');
		$this->load->view('berhasil_ubah_karyawan');
	}

	public function izin()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$id = $this->session->userdata('id_user');
			if ($role=="0") {
				$data['izin'] = $this->M_simperti->tampil_izin()->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('izin',$data);
				$this->load->view('template/footer');
			}
			if ($role=="3") {
				$data['izin'] = $this->M_simperti->tampil_izin_sdk($id)->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('izin',$data);
				$this->load->view('template/footer');
			}
	}

	public function tambahizin(){
	   
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'tanggal_izin' => $this->input->post('tanggal_izin'),
			'tanggal_akhir_izin' => $this->input->post('tanggal_akhir_izin'),
			'kode_izin' => $this->input->post('kode_izin'),
			'alasan' => $this->input->post('alasan'),
			'approve_atasan' => "Sedang Diproses",
			'approve_tu' => "Sedang Diproses"
		);
	
		$this->M_simperti->tambahizin($data,'izin');
		$this->load->view('berhasil_tambah_izin');
	}

	public function edit_izin($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_izin'] = $this->M_simperti->edit_izin($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_izin',$data);
		$this->load->view('template/footer');
	}

	public function updateizin(){
	
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'tanggal_izin' => $this->input->post('tanggal_izin'),
			'tanggal_akhir_izin' => $this->input->post('tanggal_akhir_izin'),
			'kode_izin' => $this->input->post('kode_izin'),
			'alasan' => $this->input->post('alasan'),
			'approve_atasan' => "Sedang Diproses",
			'approve_tu' => "Sedang Diproses"
		);
	
		$where = array(
			'id' => $this->input->post('id')
		);


	
		$this->M_simperti->updateizin($where,$data,'izin');
		$this->load->view('berhasil_ubah_izin');
	}

	public function hapus_izin($id){
		$where =    array ('id' => $id);
		$this->M_simperti->hapus_izin('izin',$where);
		redirect(base_url('admin/izin'));
	}

	public function cuti()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$id = $this->session->userdata('id_user');
		if ($role=="0") {
			$data['cuti'] = $this->M_simperti->tampil_cuti()->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar_admin',$sess_data);
			$this->load->view('cuti',$data);
			$this->load->view('template/footer');
		}
		if ($role=="3") {
			$data['cuti'] = $this->M_simperti->tampil_cuti_sdk($id)->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar_admin',$sess_data);
			$this->load->view('cuti',$data);
			$this->load->view('template/footer');
		}

	}

	public function tambahcuti(){
	   
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'jenis_cuti' => $this->input->post('jenis_cuti'),
			'tanggal_cuti' => $this->input->post('tanggal_cuti'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'keperluan_cuti' => $this->input->post('keperluan_cuti'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tugas_sekarang' => $this->input->post('tugas_sekarang'),
			'diserahkan_kepada' => $this->input->post('diserahkan_kepada'),
			'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
			'approve_atasan' => "Sedang Diproses",
			'alasan_ditolak' => "",
			'approve_tu' => "Sedang Diproses"
		);
	
		$this->M_simperti->tambahcuti($data,'cuti');
		$this->load->view('berhasil_tambah_cuti');
	}

	public function edit_cuti($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_cuti'] = $this->M_simperti->edit_cuti($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_cuti',$data);
		$this->load->view('template/footer');
	}

	public function updatecuti(){
	
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'jenis_cuti' => $this->input->post('jenis_cuti'),
			'tanggal_cuti' => $this->input->post('tanggal_cuti'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'keperluan_cuti' => $this->input->post('keperluan_cuti'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tugas_sekarang' => $this->input->post('tugas_sekarang'),
			'diserahkan_kepada' => $this->input->post('diserahkan_kepada'),
			'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
			'approve_atasan' => "Sedang Diproses",
			'alasan_ditolak' => "",
			'approve_tu' => "Sedang Diproses"
		);
	
		$where = array(
			'id' => $this->input->post('id')
		);


	
		$this->M_simperti->updatecuti($where,$data,'cuti');
		$this->load->view('berhasil_ubah_cuti');
	}

	public function hapus_cuti($id){
		$where =    array ('id' => $id);
		$this->M_simperti->hapus_cuti('cuti',$where);
		redirect(base_url('admin/cuti'));
	}

	public function persetujuan_izin()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$nip = $this->session->userdata('nip_user');
		if ($role=="0") {
			$data['persetujuan_izin'] = $this->M_simperti->tampil_persetujuan_izin()->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar_admin',$sess_data);
			$this->load->view('persetujuan_izin',$data);
			$this->load->view('template/footer');
		}
		if ($role=="1") {
			$data['persetujuan_izin'] = $this->M_simperti->tampil_persetujuan_izin_dirkepsek($nip)->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar_admin',$sess_data);
			$this->load->view('persetujuan_izin',$data);
			$this->load->view('template/footer');
		}
		
		
	}

	public function edit_approval_izin($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_approval'] = $this->M_simperti->edit_izin($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_approval_izin',$data);
		$this->load->view('template/footer');
	}

	public function updateapprovalizin(){
	
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'tanggal_izin' => $this->input->post('tanggal_izin'),
			'tanggal_akhir_izin' => $this->input->post('tanggal_akhir_izin'),
			'kode_izin' => $this->input->post('kode_izin'),
			'alasan' => $this->input->post('alasan'),
			'approve_atasan' => $this->input->post('approve_atasan'),
			'approve_tu' => $this->input->post('approve_tu')
		);
	
		$where = array(
			'id' => $this->input->post('id')
		);


	
		$this->M_simperti->updateizin($where,$data,'izin');
		$this->load->view('berhasil_ubah_approval_izin');
	}

	public function persetujuan_cuti()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$nip = $this->session->userdata('nip_user');
		if ($role=="0") {
		$data['persetujuan_cuti'] = $this->M_simperti->tampil_persetujuan_cuti()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('persetujuan_cuti',$data);
		$this->load->view('template/footer');
		}
		if ($role=="1") {
			$data['persetujuan_cuti'] = $this->M_simperti->tampil_persetujuan_cuti_dirkepsek($nip)->result();
			$this->load->view('template/header');
			$this->load->view('template/sidebar_admin',$sess_data);
			$this->load->view('persetujuan_cuti',$data);
			$this->load->view('template/footer');
			}
	}

	public function edit_approval_cuti($id)
	{
		$sess_data = $this->session->userdata();
		$data['edit_approval'] = $this->M_simperti->edit_cuti($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$sess_data);
		$this->load->view('edit_approval_cuti',$data);
		$this->load->view('template/footer');
	}

	public function updateapprovalcuti(){
	
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'jenis_cuti' => $this->input->post('jenis_cuti'),
			'tanggal_cuti' => $this->input->post('tanggal_cuti'),
			'tanggal_kembali' => $this->input->post('tanggal_kembali'),
			'keperluan_cuti' => $this->input->post('keperluan_cuti'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'tugas_sekarang' => $this->input->post('tugas_sekarang'),
			'diserahkan_kepada' => $this->input->post('diserahkan_kepada'),
			'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
			'approve_atasan' => $this->input->post('approve_atasan'),
			'alasan_ditolak' => $this->input->post('alasan_ditolak'),
			'approve_tu' => $this->input->post('approve_tu')
		);
	
		$where = array(
			'id' => $this->input->post('id')
		);


	
		$this->M_simperti->updatecuti($where,$data,'cuti');
		$this->load->view('berhasil_ubah_approval_cuti');
	}

	public function status_izin()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$id = $this->session->userdata('id_user');
			if ($role=="0") {
				$data['status_izin'] = $this->M_simperti->tampil_status_izin()->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('status_izin',$data);
				$this->load->view('template/footer');
			}
			if ($role=="3") {
				$data['status_izin'] = $this->M_simperti->tampil_status_izin_sdk($id)->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('status_izin',$data);
				$this->load->view('template/footer');
			}


	}

	public function status_cuti()
	{
		$sess_data = $this->session->userdata();
		$role = $this->session->userdata('role');
		$id = $this->session->userdata('id_user');
			if ($role=="0") {
				$data['status_cuti'] = $this->M_simperti->tampil_status_cuti()->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('status_cuti',$data);
				$this->load->view('template/footer');
			}
			if ($role=="3") {
				$data['status_cuti'] = $this->M_simperti->tampil_status_cuti_sdk($id)->result();
				$this->load->view('template/header');
				$this->load->view('template/sidebar_admin',$sess_data);
				$this->load->view('status_cuti',$data);
				$this->load->view('template/footer');
			}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());    
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//simperti projek



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



	
	
	public function kuota()
	{
		$data['kuota'] = $this->M_ppdb->tampil_data_kuota()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('kuota',$data);
		$this->load->view('template/footer');
	}

	public function tambahkuota(){
		$jenis           = $this->input->post('jenis');
		$kuota           = $this->input->post('kuota');
		$keterangan      = $this->input->post('keterangan');


	   
		$data = array(
			'jenis' => $jenis,
			'kuota' => $kuota,
			'keterangan' => $keterangan

		);
	
		$this->M_ppdb->tambahkuota($data,'kuota');
		redirect(base_url('home/kuota'));
	}

	public function hapuskuota($id){
		$id =    array ('id' => $id);
		$this->M_ppdb->hapuskuota($id,'kuota');
		redirect(base_url('home/kuota'));
	}

	

	public function preview($id){
		header("Content-type: application/pdf");
		readfile("asset/file");
		// $data['file']=$id;
		// $this->load->view('preview',$data);

	}

	public function zonasi($id)
	{
		$sess_data = $this->session->userdata();
		$id_pesertadidik = $this->session->userdata('id_pesertadidik');
		$data['zonasi'] = $this->M_ppdb->zonasiadmin($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah', $sess_data);
		$this->load->view('zonasiadmin', $data);
		$this->load->view('template/footer');
	}

	public function updatekuota(){
		$id       = $this->input->post('id');
		$jenis       = $this->input->post('jenis');
		$kuota        = $this->input->post('kuota');
		$keterangan        = $this->input->post('keterangan');

	
		$data = array(
			'jenis' => $jenis,
			'kuota' => $kuota,
			'keterangan' => $keterangan

		);
	
		$where = array(
			'id' => $id
		);
	
		$this->M_ppdb->updatekuota($where,$data,'kuota');
		$this->load->view('berhasil_ubah');
		$this->load->view('kuota');
	}

	public function approve_formulir()
	{
		$sess_data = $this->session->userdata();
		$id_sekolah = $this->session->userdata('id_pesertadidik');
		$data['formulir'] = $this->M_ppdb->tampil_approval($id_sekolah)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('approve_formulir',$data);
		$this->load->view('template/footer');
	}

	public function cetak_kartu($id){
		$sess_data = $this->session->userdata();
		$id =    array ('id' => $id);
		$data['cetak_kartu'] = $this->M_ppdb->tampilpengguna($id,'pengguna')->result();   
		$data2 = $this->M_ppdb->tampilpengguna($id,'pengguna')->result();   

                $this->load->view('template/header');
                $this->load->view('template/sidebar_admin_sekolah',$sess_data);
                $this->load->view('cetak_kartu2',$data);
                $this->load->view('template/footer');

        }

	

	public function editapproval($id){
		$sess_data = $this->session->userdata();
		$data['approval'] = $this->M_ppdb->tampilpengguna_upload($id)->result();
		
		foreach ($data['approval'] as $data1){
				$data3 = $data1->id_pesertadidik;
		}
		
		$id_pesertadidik=$data3;
		$data['approval2'] = $this->M_ppdb->tampilketerangan($id_pesertadidik)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('editapproval',$data);
		$this->load->view('template/footer');
	}

	

	public function updatepassword(){
		$id_pesertadidik        = $this->input->post('id_pesertadidik');
        $username   			= $this->input->post('username');
		$password   			= $this->input->post('password');

		$this->M_ppdb->updatepassword($username,$password,$id_pesertadidik);
		$this->load->view('berhasil_ubah_user');
	}



		
		public function cetakformulir(){
			// membaca data dari form
			$jenis      	 = $this->input->post('jenis');
			$nama            = $this->input->post('nama');
			$nisn	         = $this->input->post('nisn');
			$alamat	         = $this->input->post('alamat');
			$sekolah_asal    = $this->input->post('sekolahasal');
			$no_hp           = $this->input->post('no_hp');
			
			// memanggil dan membaca template dokumen yang telah kita buat
			$document = file_get_contents("formulir_pendaftaran.rtf");
			
			// isi dokumen dinyatakan dalam bentuk string
			$document = str_replace("#JENIS", $jenis, $document);
			$document = str_replace("#NAMA", $nama, $document);
			$document = str_replace("#NISN", $nisn, $document);
			$document = str_replace("#ALAMAT", $alamat, $document);
			$document = str_replace("#SEKOLAHASAL", $sekolah_asal, $document);
			$document = str_replace("#NO_HP", $no_hp, $document);
			
			// header untuk membuka file output RTF dengan MS. Word
			
			header("Content-type: application/msword");
			header("Content-disposition: inline; filename=formulir_pendaftaran.doc");
			header("Content-length: ".strlen($document));
			echo $document;
 

		}

		public function approve_lulus()
	{
		$sess_data = $this->session->userdata();
		$id_sekolah = $this->session->userdata('id_pesertadidik');
		$data['lulus'] = $this->M_ppdb->tampil_lulus($id_sekolah)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('approve_lulus',$data);
		$this->load->view('template/footer');
	}

	public function editlulus($id){
		$sess_data = $this->session->userdata();
		$data['lulus'] = $this->M_ppdb->tampilpengguna_lulus($id)->result();
		
		foreach ($data['lulus'] as $data1){
			$data3 = $data1->id_pesertadidik;
		}
		$id_pesertadidik=$data3;


		$data['approval2'] = $this->M_ppdb->tampilketerangan($id_pesertadidik)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('editlulus',$data);
		$this->load->view('template/footer');
	}


	public function updateapproval(){
		$id                	= $this->input->post('id');
        $approve_formulir   = $this->input->post('approve_formulir');
		$id_pesertadidik    = $this->input->post('id_pesertadidik');
        $keterangan		    = $this->input->post('keterangan');
		
		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
            'keterangan' => $keterangan
        );

		$hitungdata= $this->M_ppdb->tampil_keterangan($id_pesertadidik);

		if ($hitungdata ==1) {
            $this->M_ppdb->updateketerangan($id_pesertadidik, $keterangan);
			$this->M_ppdb->updateformulir($approve_formulir,$id,'pengguna');
			$this->load->view('berhasil_ubah_formulir');
		}else{
            $this->M_ppdb->tambahketerangan($data);
			$this->M_ppdb->updateformulir($approve_formulir,$id,'pengguna');
			$this->load->view('berhasil_ubah_formulir');  
		}


	}


	
		public function approve_daftarulang()
	{
		$sess_data = $this->session->userdata();
		$id_sekolah = $this->session->userdata('id_pesertadidik');
		$data['lulus'] = $this->M_ppdb->tampil_daftarulang($id_sekolah)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('approve_daftarulang',$data);
		$this->load->view('template/footer');
	}

	public function status_finalisasi()
	{
		$sess_data = $this->session->userdata();
		$id_sekolah = $this->session->userdata('id_pesertadidik');
		$data['finalisasi'] = $this->M_ppdb->tampil_finalisasi($id_sekolah)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('status_finalisasi',$data);
		$this->load->view('template/footer');
	}

	public function editdaftarulang($id){
		$sess_data = $this->session->userdata();
		$data['daftarulang'] = $this->M_ppdb->tampilpengguna_daftarulang($id)->result();
		foreach ($data['daftarulang'] as $data1){
			$data3 = $data1->id_pesertadidik;
		}
	
		$id_pesertadidik=$data3;
		$data['approval2'] = $this->M_ppdb->tampilketerangan($id_pesertadidik)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('editdaftarulang',$data);
		$this->load->view('template/footer');
	}

	public function updatedaftarulang(){
		$id                		= $this->input->post('id');
        $approve_daftarulang   	= $this->input->post('approve_daftarulang');
		$id_pesertadidik    = $this->input->post('id_pesertadidik');
        $keterangan		    = $this->input->post('keterangan');

		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
            'keterangan' => $keterangan
        );

		$hitungdata= $this->M_ppdb->tampil_keterangan($id_pesertadidik);

		if ($hitungdata ==1) {
            $this->M_ppdb->updateketerangan($id_pesertadidik, $keterangan);
			$this->M_ppdb->updatedaftarulang($approve_daftarulang,$id,'pengguna');
			$this->load->view('berhasil_ubah_daftarulang');	
		}else{
            $this->M_ppdb->tambahketerangan($data);
			$this->M_ppdb->updatedaftarulang($approve_daftarulang,$id,'pengguna');
			$this->load->view('berhasil_ubah_daftarulang');	
		}
	}

	public function updatelulus(){
		$id                	= $this->input->post('id');
        $approve_lulus   	= $this->input->post('approve_lulus');
		$id_pesertadidik    = $this->input->post('id_pesertadidik');
        $keterangan		    = $this->input->post('keterangan');

		$data = array(
			'id_pesertadidik' => $id_pesertadidik,
            'keterangan' => $keterangan
        );

		$hitungdata= $this->M_ppdb->tampil_keterangan($id_pesertadidik);

		if ($hitungdata ==1) {
            $this->M_ppdb->updateketerangan($id_pesertadidik, $keterangan);
			$this->M_ppdb->updatelulus($approve_lulus,$id,'pengguna');
			$this->load->view('berhasil_ubah_lulus');	
		}else{
            $this->M_ppdb->tambahketerangan($data);
			$this->M_ppdb->updatelulus($approve_lulus,$id,'pengguna');
			$this->load->view('berhasil_ubah_lulus');	
		}
	}
	
		public function datapengguna()
	{
		$data['pengguna'] = $this->M_ppdb->tampildatapengguna()->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('datapengguna',$data);
		$this->load->view('template/footer');
	}

	public function editpengguna($id)
	{
		$id =    array ('id' => $id);
		$data['editpengguna'] = $this->M_ppdb->tampilpengguna($id)->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('editpengguna',$data);
		$this->load->view('template/footer');
	}

	public function ganti_password($id)
	{
		$data['ganti_password'] = $this->M_ppdb->tampilgantipassword($id)->result();
		$sess_data = $this->session->userdata();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('ganti_password',$data);
		$this->load->view('template/footer');
	}

	public function editfinalisasi($id)
	{
		$sess_data = $this->session->userdata();
		$data['editfinalisasi'] = $this->M_ppdb->edit_finalisasi($id)->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin_sekolah',$sess_data);
		$this->load->view('editfinalisasi',$data);
		$this->load->view('template/footer');
	}

	public function updatefinalisasi(){
		$id                	= $this->input->post('id');
		$id_pesertadidik   	= $this->input->post('id_pesertadidik');
        $status   			= $this->input->post('status');

		
		$data['tampil_finalisasi'] = $this->M_ppdb->tampil_data_sekolahtujuan_finalisasi($id_pesertadidik)->result();

		foreach ($data['tampil_finalisasi'] as $datakunci){
			$id_sekolah = $datakunci ->id_sekolah;
			if ($datakunci->jenis_pendaftaran==1) {
				$kurang = "sisa_zonasi";
			}
			if ($datakunci->jenis_pendaftaran==2) {
				$kurang = "sisa_afirmasi";
			}
			if ($datakunci->jenis_pendaftaran==3) {
				$kurang = "sisa_pindahan";
			}
			if ($datakunci->jenis_pendaftaran==4) {
				$kurang = "sisa_prestasi";
			}
			if ($datakunci->jenis_pendaftaran==5) {
				$kurang = "sisa_umum";
			}
		}

		$kurang1=$kurang;
		$id_sekolah1=$id_sekolah;

		if ($status == 0) {
			$this->M_ppdb->kurang_kuota($kurang1,$id_sekolah1);
		}
		$this->M_ppdb->updatefinalisasi_admin($status,$id,'pengguna');
		$this->load->view('berhasil_ubah_status');
	}

	public function updatedatapengguna(){
		$id              = $this->input->post('id');
		$nama            = $this->input->post('nama');
		$jenis      	 = $this->input->post('jenis');
		$nisn	         = $this->input->post('nisn');
		$alamat	         = $this->input->post('alamat');
		$sekolah_asal    = $this->input->post('sekolah_asal');
		$no_hp           = $this->input->post('no_hp');
		$foto            = $this->input->post('foto');
		$bukti_tf        = $this->input->post('bukti_tf');
		$username        = $this->input->post('username');
		$password        = $this->input->post('password');
		$role            = $this->input->post('role');
		$approve_formulir    = $this->input->post('approve_formulir');
		$approve_lulus       = $this->input->post('approve_lulus');
		$approve_daftarulang = $this->input->post('approve_daftarulang');


	
		$data = array(
			'nama_lengkap' => $nama,
			'jenis' => $jenis,
			'nisn' => $nisn,
			'alamat' =>$alamat,
			'sekolah_asal' => $sekolah_asal,
			'no_hp' => $no_hp,
			'foto' => $foto,
			'bukti_tf' => $bukti_tf,
			'username' => $username,
			'password' => $password,
			'role' => $role,
			'approve_formulir' => $approve_formulir,
			'approve_lulus' => $approve_lulus,
			'approve_daftarulang' => $approve_daftarulang
		);
	
		$where = array(
			'id' => $id
		);
		$this->M_ppdb->updatedatapengguna($where,$data,'pengguna');
		$this->load->view('berhasil_ubah_password');
		$this->load->view('datapengguna');	}


	public function cetakformulirdaftarulang(){
			// membaca data dari form
			$nama_lengkap    = $this->input->post('nama_lengkap');
			$nama_panggilan  = $this->input->post('nama_panggilan');
			$tingkat		 = $this->input->post('tingkat');
			$nisn	         = $this->input->post('nisn');
			$goldar	         = $this->input->post('goldar');
			$anak_ke         = $this->input->post('anak_ke');
			$dari_saudara    = $this->input->post('dari_saudara');
			$jarak	         = $this->input->post('jarak');
			$tpt_lahir	     = $this->input->post('tpt_lahir');
			$tgl_lahir       = $this->input->post('tgl_lahir');
			$agama	         = $this->input->post('agama');
			$suku	         = $this->input->post('suku');
			$jk		         = $this->input->post('jk');
			$alamat	         = $this->input->post('alamat');
			$desa	         = $this->input->post('desa');
			$kabupaten       = $this->input->post('kabupaten');
			$provinsi        = $this->input->post('provinsi');
			$nama_ayah	     = $this->input->post('nama_ayah');
			$pendidikan_ayah	= $this->input->post('pendidikan_ayah');
			$penghasilan_ayah	= $this->input->post('penghasilan_ayah');
			$hp_ayah	        = $this->input->post('hp_ayah');
			$tptlahir_ayah      = $this->input->post('tptlahir_ayah');
			$tgllahir_ayah      = $this->input->post('tgllahir_ayah');
			$pekerjaan_ayah     = $this->input->post('pekerjaan_ayah');
			$alamatayah        = $this->input->post('alamat_ayah');
			$desa_ayah          = $this->input->post('desa_ayah');
			$kabupaten_ayah     = $this->input->post('kabupaten_ayah');
			$provinsi_ayah      = $this->input->post('provinsi_ayah');
			$nama_ibu	     = $this->input->post('nama_ibu');
			$pendidikan_ibu	= $this->input->post('pendidikan_ibu');
			$penghasilan_ibu	= $this->input->post('penghasilan_ibu');
			$hp_ibu	        = $this->input->post('hp_ibu');
			$tptlahir_ibu      = $this->input->post('tptlahir_ibu');
			$tgllahir_ibu      = $this->input->post('tgllahir_ibu');
			$pekerjaan_ibu     = $this->input->post('pekerjaan_ibu');
			$alamat_ibu        = $this->input->post('alamat_ibu');
			$desa_ibu          = $this->input->post('desa_ibu');
			$kabupaten_ibu     = $this->input->post('kabupaten_ibu');
			$provinsi_ibu      = $this->input->post('provinsi_ibu');
			$sekolah_asal	   = $this->input->post('sekolah_asal');
			$npsn		       = $this->input->post('npsn');
			$almt_sekolah    = $this->input->post('alamat_sekolah');
			$kabupaten_sekolah		= $this->input->post('kabupaten_sekolah');
			$provinsi_sekolah		= $this->input->post('provinsi_sekolah');
			$penyakit	         = $this->input->post('penyakit');
			$olah_raga	         = $this->input->post('olah_raga');
			$seni	         = $this->input->post('seni');
			$tari	         = $this->input->post('tari');
			$lukis	         = $this->input->post('lukis');
			$drama	         = $this->input->post('drama');
			$sastra	         = $this->input->post('sastra');
			$organisasi	         = $this->input->post('organisasi');
			$prestasi	         = $this->input->post('prestasi');
			$alasan	         = $this->input->post('alasan');
			$tentang_sekolah	         = $this->input->post('tentang_sekolah');



			
			// memanggil dan membaca template dokumen yang telah kita buat
			$document = file_get_contents("formulir_pendaftaran_ulang.rtf");
			
			// isi dokumen dinyatakan dalam bentuk string
			$document = str_replace("#NAMA_LENGKAP", $nama_lengkap, $document);
			$document = str_replace("#NAMA_PANGGILAN", $nama_panggilan, $document);
			$document = str_replace("#TINGKAT", $tingkat, $document);
			$document = str_replace("#NISN", $nisn, $document);
			$document = str_replace("#GOLDAR", $goldar, $document);
			$document = str_replace("#ANAK_KE", $anak_ke, $document);
			$document = str_replace("#DARI_SAUDARA", $dari_saudara, $document);
			$document = str_replace("#JARAK", $jarak, $document);
			$document = str_replace("#TPTLAHIR", $tpt_lahir, $document);
			$document = str_replace("#TGLLAHIR", $tgl_lahir, $document);
			$document = str_replace("#AGAMA", $agama, $document);
			$document = str_replace("#SUKU", $suku, $document);
			$document = str_replace("#JK", $jk, $document);
			$document = str_replace("#ALAMAT", $alamat, $document);
			$document = str_replace("#DESA", $desa, $document);
			$document = str_replace("#KABUPATEN", $kabupaten, $document);
			$document = str_replace("#PROVINSI", $provinsi, $document);
			$document = str_replace("#NAMA_AYAH", $nama_ayah, $document);
			$document = str_replace("#PENDIDIKAN_AYAH", $pendidikan_ayah, $document);
			$document = str_replace("#PENGHASILAN_AYAH", $penghasilan_ayah, $document);
			$document = str_replace("#NOTEL", $hp_ayah, $document);
			$document = str_replace("#TPT_AYAH", $tptlahir_ayah, $document);
			$document = str_replace("#TGL_AYAH", $tgllahir_ayah, $document);
			$document = str_replace("#PEKERJAAN", $pekerjaan_ayah, $document);
			$document = str_replace("#TPTTINGGAL_AYAH", $alamatayah, $document);
			$document = str_replace("#KEL", $desa_ayah, $document);
			$document = str_replace("#KAB", $kabupaten_ayah, $document);
			$document = str_replace("#KAU", $provinsi_ayah, $document);


			$document = str_replace("#MOTHER", $nama_ibu, $document);
			$document = str_replace("#KUG", $pendidikan_ibu, $document);
			$document = str_replace("#KEK", $penghasilan_ibu, $document);
			$document = str_replace("#HP", $hp_ibu, $document);
			$document = str_replace("#KUH", $tptlahir_ibu, $document);
			$document = str_replace("#KUK", $tgllahir_ibu, $document);
			$document = str_replace("#KUB", $pekerjaan_ibu, $document);
			$document = str_replace("#KEH", $alamat_ibu, $document);
			$document = str_replace("#KEF", $desa_ibu, $document);
			$document = str_replace("#KAF", $kabupaten_ibu, $document);
			$document = str_replace("#KAG", $provinsi_ibu, $document);
			$document = str_replace("#HH", $sekolah_asal, $document);
			$document = str_replace("#HK", $npsn, $document);
			$document = str_replace("#HN", $almt_sekolah, $document);
			$document = str_replace("#HJ", $kabupaten_sekolah, $document);
			$document = str_replace("#HY", $provinsi_sekolah, $document);
			$document = str_replace("#PENYAKIT", $penyakit, $document);
			$document = str_replace("#OLAH_RAGA", $olah_raga, $document);
			$document = str_replace("#SENI", $seni, $document);
			$document = str_replace("#TARI", $tari, $document);
			$document = str_replace("#LUKIS", $lukis, $document);
			$document = str_replace("#DRAMA", $drama, $document);
			$document = str_replace("#SASTRA", $sastra, $document);
			$document = str_replace("#ORGANISASI", $organisasi, $document);
			$document = str_replace("#PRESTASI", $prestasi, $document);
			$document = str_replace("#ALASAN", $alasan, $document);
			$document = str_replace("#TENTANG_SEKOLAH", $tentang_sekolah, $document);


			



			
			// header untuk membuka file output RTF dengan MS. Word
			
			header("Content-type: application/msword");
			header("Content-disposition: inline; filename=formulir_pendaftaran_ulang.doc");
			header("Content-length: ".strlen($document));
			echo $document;

		}

	

}
