<?php

class M_simperti extends CI_Model
{

    // SIMPERTI PROJEK

    function cek_login_user($username, $password, $role)
    {
        return $this->db->query("SELECT * FROM user
        where username='$username' AND password='$password' AND role='$role'");
    }

    public function tampil_divisi()
    {
        return $this->db->query("SELECT * FROM divisi");
    }
    

    public function tambahdivisi($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_divisi($id)
    {
        return $this->db->query("SELECT * FROM divisi WHERE id_divisi='$id'");
    }

    public function updatedivisi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }

    public function hapus_divisi($table,$where)
    {
        $this->db->delete('divisi', $where);
    }

    public function tampil_data_atasan()
    {
        return $this->db->query("SELECT * FROM atasan");
    }

    public function tambahatasan($data,$table)
    {
        $this->db->insert($table, $data);
    }


    public function tampil_data_karyawan()
    {
        return $this->db->query("SELECT * FROM user LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan
                                 LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi");
    }

    public function hapus_atasan($table,$where)
    {
        $this->db->delete('atasan', $where);
    }

    public function edit_atasan($id)
    {
        return $this->db->query("SELECT * FROM atasan WHERE id_atasan='$id'");
    }

    public function updateatasan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }

    public function tambahkaryawan($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_karyawan($table,$where)
    {
        $this->db->delete('user', $where);
    }

    public function tampil_data_karyawan_edit($id)
    {
        return $this->db->query("SELECT * FROM user LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan
                                 LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi WHERE user.id_user='$id'");
    }

    public function updatekaryawan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }


    public function tampil_izin()
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user WHERE izin.approve_atasan ='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_izin_sdk($id)
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user WHERE izin.approve_atasan ='Sedang Diproses' AND user.id_user='$id' ORDER BY id DESC");
    }

    public function tambahizin($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_izin($id)
    {
        return $this->db->query("SELECT * FROM izin WHERE id='$id'");
    }

    public function updateizin($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }

    public function hapus_izin($table,$where)
    {
        $this->db->delete($table, $where);
    }

    public function tampil_cuti()
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user WHERE approve_atasan ='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_cuti_sdk($id)
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user WHERE cuti.approve_atasan ='Sedang Diproses' AND user.id_user='$id' ORDER BY id DESC");
    }

    public function tambahcuti($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_cuti($id)
    {
        return $this->db->query("SELECT * FROM cuti WHERE id='$id'");
    }

    public function updatecuti($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }

    public function hapus_cuti($table,$where)
    {
        $this->db->delete($table, $where);
    }

    public function tampil_persetujuan_izin()
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi WHERE approve_atasan ='Sedang Diproses' OR approve_tu='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_persetujuan_cuti()
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi WHERE approve_atasan ='Sedang Diproses' OR approve_tu='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_status_izin()
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi ORDER BY id DESC");
    }

    public function tampil_status_izin_tu()
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi
                                WHERE izin.approve_tu='Diterima' ORDER BY id DESC");
    }

    public function tampil_status_izin_sdk($id)
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi WHERE user.id_user='$id' AND NOT izin.approve_atasan='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_status_izin_sdk_report($id)
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan WHERE izin.id='$id'");
    }

    public function tampil_status_cuti_sdk_report($id)
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan WHERE cuti.id='$id'");
    }

    public function tampil_status_cuti()
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi ORDER BY id DESC");
    }

    public function tampil_status_cuti_sdk($id)
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi WHERE user.id_user='$id' AND NOT cuti.approve_atasan='Sedang Diproses'  ORDER BY id DESC");
    }

    public function tampil_status_cuti_tu()
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi
                                WHERE cuti.approve_tu='Diterima' ORDER BY id DESC");
    }

    public function tampil_persetujuan_izin_dirkepsek($nip)
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan 
                                WHERE atasan.nip='$nip' AND izin.approve_atasan ='Sedang Diproses' ORDER BY id DESC");
    }

    public function tampil_persetujuan_izin_tu($nip)
    {
        return $this->db->query("SELECT * FROM izin
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan 
                                WHERE (atasan.nip='$nip' AND (izin.approve_atasan ='Sedang Diproses' OR izin.approve_tu ='Sedang Diproses')) OR (izin.approve_atasan ='Diterima' AND izin.approve_tu ='Sedang Diproses') ORDER BY id DESC");
    }

    public function tampil_persetujuan_cuti_tu($nip)
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan 
                                WHERE (atasan.nip='$nip' AND (cuti.approve_atasan ='Sedang Diproses' OR cuti.approve_tu ='Sedang Diproses')) OR (cuti.approve_atasan ='Diterima' AND cuti.approve_tu ='Sedang Diproses') ORDER BY id DESC");
    }

    public function tampil_persetujuan_cuti_dirkepsek($nip)
    {
        return $this->db->query("SELECT * FROM cuti
                                LEFT JOIN user ON cuti.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                LEFT JOIN atasan ON user.id_atasan = atasan.id_atasan 
                                WHERE atasan.nip='$nip' AND cuti.approve_atasan ='Sedang Diproses' ORDER BY id DESC");
    }


    public function tampil_rekap_izin($tanggal1,$tanggal2,$divisi)
    {
        return $this->db->query("SELECT * FROM izin 
                                LEFT JOIN user ON izin.id_user = user.id_user 
                                LEFT JOIN divisi ON user.divisi_user = divisi.id_divisi 
                                 WHERE (izin.tanggal_izin >='$tanggal1' AND izin.tanggal_akhir_izin <='$tanggal2') AND user.divisi_user='$divisi' AND
                                 approve_atasan = 'Diterima' AND approve_tu = 'Diterima' ");
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // SIMPERTI PROJEK



    public function tampildatasiswa_assesmen()
    {
        return $this->db->query("SELECT * FROM user WHERE role='2'");
    }

    public function tampildatasiswa_assesmen_byid($id)
    {
        return $this->db->query("SELECT * FROM user WHERE id_user='$id'");
    }


    function cek_login_admin($username, $password)
    {
        return $this->db->query("SELECT * FROM user
        where no_induk='$username' AND tanggal_lahir='$password'");
    }

   

    function hapus_siswa($table, $where)
    {
        $insert = $this->db->delete($table, $where);
        return $insert;
    }

    public function updatesiswa($where, $data)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update('user');
    }

    public function tampildataadmin_assesmen()
    {
        return $this->db->query("SELECT * FROM user WHERE role='0' OR role='1'");
    }

    public function tambahadmin($data)
    {
        $this->db->insert('user', $data);
    }

    function hapus_admin($table, $where)
    {
        $insert = $this->db->delete($table, $where);
        return $insert;
    }

    public function tampildataadmin_assesmen_byid($id)
    {
        return $this->db->query("SELECT * FROM user WHERE id_user='$id'");
    }

    public function updateadmin($where, $data)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update('user');
    }


    public function tampilprogram()
    {
        return $this->db->query("SELECT * FROM program");
    }

    public function tambahprogram($data)
    {
        $this->db->insert('program', $data);
    }

    function hapus_program($table, $where)
    {
        $insert = $this->db->delete($table, $where);
        return $insert;
    }

    public function tampildataprogram_byid($id)
    {
        return $this->db->query("SELECT * FROM program WHERE id_program='$id'");
    }

    public function updateprogram($where, $data)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update('program');
    }


    public function tampilaktivitas()
    {
        return $this->db->query("SELECT * FROM aktivitas
                                LEFT JOIN program ON aktivitas.id_program = program.id_program");
    }

    public function tambahaktivitas($data)
    {
        $this->db->insert('aktivitas', $data);
    }

    function hapus_aktivitas($table, $where)
    {
        $insert = $this->db->delete($table, $where);
        return $insert;
    }

    public function tampildataaktivitas_byid($id)
    {
        return $this->db->query("SELECT * FROM aktivitas WHERE id_aktivitas='$id'");
    }

    public function tampilprogram_byid($id)
    {
        return $this->db->query("SELECT * FROM aktivitas
                                LEFT JOIN program ON aktivitas.id_program = program.id_program
                                WHERE id_aktivitas='$id'");
    }

    public function updateaktivitas($where, $data,$table)
    {
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update($table);
    }

    public function tampilsiswa_hitung()
    {
        return $this->db->query("SELECT * FROM user WHERE role='2'");
    }

    public function tampilterapis_hitung()
    {
        return $this->db->query("SELECT * FROM user WHERE role='1'");
    }

    public function tampiladmin_hitung()
    {
        return $this->db->query("SELECT * FROM user WHERE role='0'");
    }

    public function tampilprogram_hitung()
    {
        return $this->db->query("SELECT * FROM program");
    }

    public function tampilaktivitas_hitung()
    {
        return $this->db->query("SELECT * FROM aktivitas");
    }



    // ASSESMEN PROJEK





    public function tampil_data_kuota($where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }

        $this->db->select('ks.*, ds.*')
            ->from('kuota_siswa ks')
            ->join('data_smp ds', 'ds.id_sekolah = ks.id_sekolah');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tampilsekolah_kuota()
    {
        return $this->db->query("SELECT * FROM data_smp");
    }

    public function tampilsekolah()
    {
        return $this->db->query("SELECT * FROM data_smp 
                                LEFT JOIN kuota_siswa ON data_smp.id_sekolah = kuota_siswa.id_sekolah ORDER BY data_smp.id_sekolah ASC");
    }

    public function tampilapproval()
    {
        return $this->db->query("SELECT * FROM data_smp 
                                LEFT JOIN kuota_siswa ON data_smp.id_sekolah = kuota_siswa.id_sekolah ORDER BY data_smp.id_sekolah ASC");
    }

    public function jumlah_approve()
    {
        return $this->db->query("select * from pengguna 
        left join sekolah_tujuan on pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
        where approve_formulir='Diterima'
                                ");
    }

    public function tampildatapengguna()
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah WHERE pengguna.role='2' ");
    }

    public function tampilakunsekolah($id)
    {
        return $this->db->query("SELECT * FROM pengguna WHERE id_pesertadidik ='$id' ");
    }

    public function tampilsiswa($nisn)
    {
        return $this->db->query("SELECT * FROM datasiswa LEFT JOIN data_sd ON
        datasiswa.id_sekolah = data_sd.id_sekolah WHERE nisn='$nisn' OR nik='$nisn'");
    }

    public function tampilsekolah_admin()
    {
        return $this->db->query("SELECT * FROM pengguna LEFT JOIN data_smp ON
        pengguna.id_pesertadidik = data_smp.id_sekolah WHERE role = 1");
    }

    public function joinsekolah()
    {
        return $this->db->query("SELECT * FROM data_sd ");
    }

     public function tampilwilayah(){
        return $this->db->query("SELECT dw.kode_wilayah,dw.nama_wilayah, ks.total,
		(select count(sk.id_pesertadidik) from sekolah_tujuan sk  JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=1) as zonasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=2) as afirmasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=3) as pindahan,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=4) as prestasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=5) as umum
 FROM `sekolah_tujuan` st  RIGHT JOIN data_smp s on s.id_sekolah=st.id_sekolah
 JOIN kuota_siswa ks on ks.id_sekolah=s.id_sekolah
 JOIN data_wilayah dw on dw.kode_wilayah=s.kode_wilayah
 GROUP by s.kode_wilayah");

        // return $this->db->query("SELECT * FROM data_wilayah ");
     }

    public function tampildatapengguna1($username, $password)
    {
        $result = $this->db->query("SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
        return $result->num_rows();
    }


    public function tampil_data_pengguna($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah WHERE pengguna.id='$id' ");
    }

    public function tampil_data_sekolahtujuan($id_pesertadidik)
    {
        $result = $this->db->query("SELECT * FROM sekolah_tujuan WHERE id_pesertadidik='$id_pesertadidik'");
        return $result->num_rows();
    }

     

     public function tampil_data_berkas($id_pesertadidik){
        $result = $this->db->query("SELECT * FROM upload_berkas WHERE id_pesertadidik='$id_pesertadidik'");
        return $result->num_rows();
     }

     public function nomor_formulir($id_sekolah,$where2){
        return $this->db->query("SELECT * FROM sekolah_tujuan 
                                    LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                    WHERE pengguna.status='1' AND id_sekolah='$id_sekolah' AND NOT sekolah_tujuan.id_pesertadidik ='$where2'");
     }

     public function data_balikan(){
         return $this->db->query("SELECT datasiswa.id_pesertadidik as dsid, data_sd.npsn as dsdnpsn, data_sd.nama_sekolah as dsdnm,
         datasiswa.nik as dsnik,datasiswa.nisn as dsnisn,datasiswa.nama_siswa as dsnm, datasiswa.tempat_lahir as dstpt,
          datasiswa.tanggal_lahir as dstgl, datasiswa.jk as dsjk, datasiswa.nama_ibu_kandung as dsibu,
         sekolah_tujuan.id_sekolah as stid, data_smp.npsn as dsmpnpsn, data_smp.nama_sekolah as dsmpnm
             FROM datasiswa
             LEFT JOIN pengguna ON datasiswa.id_pesertadidik = pengguna.id_pesertadidik
             LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
             LEFT JOIN sekolah_tujuan ON datasiswa.id_pesertadidik = sekolah_tujuan.id_pesertadidik
             LEFT JOIN data_smp ON sekolah_tujuan.id_sekolah = data_smp.id_sekolah
             WHERE pengguna.status = '1' AND pengguna.approve_daftarulang='Diterima'");
     }



    public function tampil_data_finalisasi($id_pesertadidik)
    {
        return $this->db->query("SELECT * FROM pengguna WHERE id_pesertadidik='$id_pesertadidik'");
    }

    public function tampil_data_sekolahtujuan_admin($id_pesertadidik)
    {
        return $this->db->query("SELECT sekolah_tujuan.*, jenis_pendaftaran.nama, data_wilayah.nama_wilayah, data_desa.nama_desa, data_smp.nama_sekolah FROM sekolah_tujuan 
                                LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                LEFT JOIN data_wilayah ON sekolah_tujuan.kode_wilayah = data_wilayah.kode_wilayah
                                LEFT JOIN data_desa ON sekolah_tujuan.id_desa = data_desa.id_desa
                                LEFT JOIN data_smp ON sekolah_tujuan.id_sekolah = data_smp.id_sekolah
                                WHERE id_pesertadidik='$id_pesertadidik'");
    }


     public function tampil_data_uploadberkas_admin($id_pesertadidik){
        return $this->db->query("SELECT * FROM upload_berkas WHERE id_pesertadidik='$id_pesertadidik'");
     }


     public function uploadberkas($id_pesertadidik){
        return $this->db->query("SELECT * FROM upload_berkas WHERE id_pesertadidik='$id_pesertadidik'");
    }



    public function tampildatasiswa($username, $password)
    {
        $result = $this->db->query("SELECT * FROM datasiswa WHERE nik='$username' AND nisn='$password'");
        return $result->num_rows();
    }

    public function tampilsekolahnpsn($npsn)
    {
        $result = $this->db->query("SELECT * FROM data_sd WHERE npsn='$npsn'");
        return $result->num_rows();
    }

    public function tambahkuota($data)
    {
        $this->db->insert('kuota_siswa', $data);
    }

    public function updatesd($data)
    {
        $this->db->insert('data_sd', $data);
    }

    public function tambahketerangan($data)
    {
        $this->db->insert('keterangan', $data);
    }

    public function tambahsekolahtujuan($data)
    {
        return $this->db->insert('sekolah_tujuan', $data);
    }

    public function kurangikuota($id_sekolah, $query)
    {
        $query = " UPDATE kuota_siswa SET $query WHERE id_sekolah='$id_sekolah'";
        return $this->db->query($query);
    }

    public function tambahberkas($data)
    {
        $this->db->insert('upload_berkas', $data);
    }

    public function hapuskuota($id)
    {
        $this->db->delete('kuota_siswa', $id);
    }

    public function hapus_sekolah($id)
    {
        $this->db->delete('pengguna', $id);
    }

    public function editkuota($id)
    {
        return $this->db->get_where('kuota', $id);
    }

    public function edit_sekolah($id)
    {
        return $this->db->get_where('pengguna', $id);
    }



    public function update_sekolah($where, $data)
    {
        $this->db->where($where);
        $this->db->update('pengguna', $data);
    }

    public function updatedatapengguna($where, $data)
    {
        $this->db->where($where);
        $this->db->update('pengguna', $data);
    }

    public function updateformuliruser($where, $data)
    {
        $this->db->where($where);
        $this->db->update('pengguna', $data);
    }

    public function updateformulirsiswa($where, $data)
    {
        $this->db->where($where);
        $this->db->update('datasiswa', $data);
    }

    public function updatesekolahtujuan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('sekolah_tujuan', $data);
    }

    public function updateberkas($where, $data)
    {
        $this->db->where($where);
        $this->db->update('upload_berkas', $data);
    }

    

    public function tambahdatasiswa($data)
    {
        $this->db->insert('datasiswa', $data);
    }

    public function tampil_approval($id_sekolah)
    {
        $query = $this->db->query("SELECT * from sekolah_tujuan 
                                    LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                    LEFT JOIN datasiswa ON sekolah_tujuan.id_pesertadidik = datasiswa.id_pesertadidik
                                    LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.id_sekolah ='$id_sekolah' AND pengguna.role='2' AND pengguna.status='1'");
        return $query;
    }

    public function tampilinfolulus()
    {
        $query = $this->db->query("SELECT * from pengguna where approve_lulus = 'Lulus'");
        return $query;
    }

    public function tampil_lulus($id_sekolah)
    {
        $query = $this->db->query("SELECT * from sekolah_tujuan 
        LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
        LEFT JOIN datasiswa ON sekolah_tujuan.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
        LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
        WHERE sekolah_tujuan.id_sekolah ='$id_sekolah' AND pengguna.role='2' AND pengguna.approve_formulir='Diterima' AND pengguna.status='1'");
        return $query;
    }

    public function tampil_daftarulang($id_sekolah)
    {
        $query = $this->db->query("SELECT * from sekolah_tujuan 
        LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
        LEFT JOIN datasiswa ON sekolah_tujuan.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
        LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
        WHERE sekolah_tujuan.id_sekolah ='$id_sekolah' AND pengguna.role='2' AND pengguna.approve_lulus='Lulus' AND pengguna.status='1'");
        return $query;
    }

    public function tampil_finalisasi($id_sekolah)
    {
        $query = $this->db->query("SELECT * from sekolah_tujuan 
        LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
        LEFT JOIN datasiswa ON sekolah_tujuan.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
        LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
        WHERE sekolah_tujuan.id_sekolah ='$id_sekolah' AND pengguna.role='2' AND pengguna.status='1'");
        return $query;
    }


    public function tampil_data_sekolahtujuan_finalisasi($id_pesertadidik)
    {
        return $this->db->query("SELECT * FROM sekolah_tujuan 
                                LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                LEFT JOIN data_wilayah ON sekolah_tujuan.kode_wilayah = data_wilayah.kode_wilayah
                                LEFT JOIN data_desa ON sekolah_tujuan.id_desa = data_desa.id_desa
                                LEFT JOIN data_smp ON sekolah_tujuan.id_sekolah = data_smp.id_sekolah
                                WHERE id_pesertadidik='$id_pesertadidik'");
    }


    public function edit_finalisasi($id)
    {
        $query = $this->db->query("SELECT * from pengguna WHERE id='$id'");
        return $query;
    }

    public function kurang_kuota($kurang, $id_sekolah)
    {
        $this->db->query("UPDATE kuota_siswa SET $kurang=($kurang+1), total_in=(total_in-1) WHERE id_sekolah = '$id_sekolah'");
    }

    

    public function tampilapprovalformulir($id)
    {
        $query = $this->db->query("SELECT approve_formulir from pengguna where id = '$id' ");
        return $query;
    }



    public function tampilpengguna_lulus($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        WHERE pengguna.id='$id' ");
    }

    public function tampilpengguna_daftarulang($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        WHERE pengguna.id='$id' ");
    }

    public function tampilpengguna_upload($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
        LEFT JOIN upload_berkas ON pengguna.id_pesertadidik = upload_berkas.id_pesertadidik
        LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
        WHERE pengguna.id='$id' ");
    }

    public function tampilupload($id)
    {
        return $this->db->query("SELECT * FROM upload_berkas WHERE id_pesertadidik='$id' ");
    }

    public function tampilgantipassword($id)
    {
        return $this->db->query("SELECT * FROM pengguna WHERE pengguna.id_pesertadidik='$id' ");
    }

    public function tampilpengguna($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah WHERE pengguna.id_pesertadidik='$id' ");
    }
    
    public function tampilpengguna222($id)
    {
        return $this->db->query("SELECT * FROM pengguna
        LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah WHERE pengguna.id_pesertadidik='$id' ");
    }
    
     public function tampilpengguna_siswa($id)
    {
        return $this->db->query("SELECT data_sd.nama_sekolah,pengguna.status,datasiswa.id_pesertadidik,datasiswa.id_sekolah,datasiswa.kode_wilayah,datasiswa.nama_siswa,datasiswa.tempat_lahir,datasiswa.tanggal_lahir,datasiswa.jk,
datasiswa.nik,datasiswa.nisn,datasiswa.alamat_jalan,datasiswa.desa_kelurahan,datasiswa.rt ,datasiswa.rw,
datasiswa.nama_dusun,datasiswa.nama_ibu_kandung,datasiswa.pekerjaan_ibu_kandung,datasiswa.penghasilan_ibu_kandung,datasiswa.nama_ayah,pekerjaan_ayah,
datasiswa.penghasilan_ayah,datasiswa.nama_wali,datasiswa.pekerjaan_wali,datasiswa.penghasilan_wali,datasiswa.kebutuhan_khusus,datasiswa.no_kip,datasiswa.no_pkh,datasiswa.lintang,datasiswa.bujur
 FROM pengguna
LEFT JOIN datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah WHERE pengguna.id_pesertadidik='$id' ");
    }

    public function tampil_keterangan($id_pesertadidik)
    {
        $result= $this->db->query("SELECT * FROM keterangan WHERE id_pesertadidik='$id_pesertadidik'");
        return $result->num_rows();

    }

    public function tampilpengguna2($id)
    {
        return $this->db->query("SELECT * FROM datasiswa LEFT JOIN data_sd ON
        data_sd.id_sekolah = datasiswa.id_sekolah WHERE id_pesertadidik='$id'");
    }

    public function tampilpengguna3()
    {
        return $this->db->query("SELECT * FROM datasiswa LEFT JOIN data_sd ON
        data_sd.id_sekolah = datasiswa.id_sekolah");
    }

    public function tampiliddaftarulang($id)
    {
        return $this->db->get_where('daftarulang', $id);
    }

    public function tampilketerangan($id)
    {
        return $this->db->query("SELECT * FROM keterangan WHERE id_pesertadidik='$id'");
    }

    public function hitungidlulus($where)
    {
        $result = $this->db->query("SELECT*FROM daftarulang where id='$where'");
        return $result->num_rows();
    }

    public function tampilkuota($datauser)
    {
        $query = $this->db->query("SELECT * FROM kuota_siswa
        LEFT JOIN jenis_pendaftaran ON kuota_siswa.id_kuota = jenis_pendaftaran.id_jenis
        LEFT JOIN data_smp ON kuota_siswa.id_sekolah = data_smp.id_sekolah
        WHERE kuota_siswa.id_sekolah='$datauser'");
        return $query;
    }



    public function tampilzonasi($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.jenis_pendaftaran='1' AND sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }


    public function tampilzonasi2()
    {
        return $this->db->query("SELECT sisa_zonasi FROM kuota_siswa;");
    }

    public function tampilafirmasi2()
    {
        return $this->db->query("SELECT sisa_afirmasi FROM kuota_siswa;");
    }

    public function tampilpindahan2()
    {
        return $this->db->query("SELECT sisa_pindahan FROM kuota_siswa;");
    }

    public function tampilprestasi2()
    {
        return $this->db->query("SELECT sisa_prestasi FROM kuota_siswa;");
    }

    public function tampilumum2(){
        return $this->db->query("SELECT sisa_umum FROM kuota_siswa;");
        
    }


    public function tampilpendaftarzonasi()
    {
        return $this->db->query("SELECT jenis_pendaftaran FROM sekolah_tujuan 
                                LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                WHERE jenis_pendaftaran='1' AND pengguna.status='1'");
    }

    public function tampilpendaftarafirmasi()
    {
        return $this->db->query("SELECT jenis_pendaftaran FROM sekolah_tujuan 
                                LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                WHERE jenis_pendaftaran='2' AND pengguna.status='1';");
    }


    public function tampilwilayah1()
    {
        return $this->db->query("SELECT * FROM data_wilayah;");
    }


    public function tampil_sekolah_wilayah($id)
    {
        return $this->db->query("SELECT * FROM data_smp 
                                LEFT JOIN kuota_siswa ON data_smp.id_sekolah = kuota_siswa.id_sekolah
                                WHERE data_smp.kode_wilayah = '$id';");
    }

    public function tampil_sekolah_wilayah2($id)
    {
        return $this->db->query("SELECT s.nama_sekolah, s.npsn, ks.total,
		(select count(sk.id_pesertadidik) from sekolah_tujuan sk  JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=1) as zonasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=2) as afirmasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=3) as pindahan,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=4) as prestasi,
        (select count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN pengguna p on p.id_pesertadidik = sk.id_pesertadidik
 where p.status=1 and id_sekolah =  st.id_sekolah and jenis_pendaftaran=5) as umum
 FROM `sekolah_tujuan` st 
 RIGHT JOIN data_smp s on s.id_sekolah=st.id_sekolah
 JOIN kuota_siswa ks on ks.id_sekolah=s.id_sekolah  AND s.kode_wilayah='$id' GROUP by s.id_sekolah");
    }


    public function tampilpendaftarpindahan()
    {
        return $this->db->query("SELECT jenis_pendaftaran FROM sekolah_tujuan 
                                LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                WHERE jenis_pendaftaran='3' AND pengguna.status='1'");
    }

    public function tampilpendaftarprestasi()
    {
        return $this->db->query("SELECT jenis_pendaftaran FROM sekolah_tujuan
                                LEFT JOIN pengguna ON sekolah_tujuan.id_pesertadidik = pengguna.id_pesertadidik
                                WHERE jenis_pendaftaran='4' AND pengguna.status='1'");
    }

    public function tampilpendaftarumum()
    {
        return $this->db->query("SELECT jenis_pendaftaran FROM sekolah_tujuan WHERE jenis_pendaftaran='5';");
    }

    public function tampilafirmasi($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.jenis_pendaftaran='2' AND sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilpindahan($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.jenis_pendaftaran='3' AND sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilprestasi($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.jenis_pendaftaran='4' AND sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }
    
     public function tampilumum($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.jenis_pendaftaran='5' AND sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilformulirapprove($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.id_sekolah='$id' AND pengguna.approve_formulir='Diterima' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilsiswalulus($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.id_sekolah='$id' AND pengguna.approve_lulus='Lulus' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilsiswadaftarulang($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.id_sekolah='$id' AND pengguna.approve_daftarulang='Diterima' AND pengguna.status='1'");
        return $result->num_rows();
    }

    public function tampilpendaftar($id)
    {
        $result = $this->db->query("SELECT * FROM pengguna
                                    LEFT JOIN sekolah_tujuan ON pengguna.id_pesertadidik = sekolah_tujuan.id_pesertadidik
                                    LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                    WHERE sekolah_tujuan.id_sekolah='$id' AND pengguna.status='1'");
        return $result->num_rows();
    }



    public function tampilpensmp()
    {
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Afirmasi' ");
        return $query;
    }

    public function tampilpensma()
    {
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan Orang Tua' ");
        return $query;
    }

    public function tampilpindsd()
    {
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Jalur Prestasi' ");
        return $query;
    }

    public function tampilpindsmp()
    {
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan SMP' ");
        return $query;
    }

    public function tampilpindsma()
    {
        $query = $this->db->query("SELECT kuota FROM kuota WHERE jenis='Pindahan SMA' ");
        return $query;
    }

    public function hitunguser()
    {
        $result = $this->db->query("SELECT*FROM pengguna");
        return $result->num_rows();
    }

    public function hitungsdformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SD' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungsmpformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SMP' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungsmaformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Peserta Didik Baru SMA' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsdformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SD' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsmpformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SMP' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpindsmaformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE jenis='Pindahan SMA' AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungpdlulus()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Lulus'");
        return $result->num_rows();
    }

    public function hitungpdtidaklulus()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Tidak Lulus'");
        return $result->num_rows();
    }

    public function hitungpddaftarulang()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_daftarulang='Diterima'");
        return $result->num_rows();
    }

    public function hitungpdtidakdaftarulang()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE approve_lulus='Ditolak'");
        return $result->num_rows();
    }

    public function hitungformulir()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE (jenis='Peserta Didik Baru SD' OR jenis='Peserta Didik Baru SMP' OR jenis='Peserta Didik Baru SMA') AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function hitungformulirpindahan()
    {
        $result = $this->db->query("SELECT*FROM pengguna WHERE (jenis='Pindahan SD' OR jenis='Pindahan SMP' OR jenis='Pindahan SMA') AND approve_formulir='Diterima'");
        return $result->num_rows();
    }

    public function updateformulir($approve_formulir, $id)
    {
        $this->db->query("UPDATE pengguna SET approve_formulir='$approve_formulir' WHERE id = '$id'");
    }

    public function updateketerangan($id_pesertadidik, $keterangan)
    {
        $this->db->query("UPDATE keterangan SET keterangan='$keterangan' WHERE id_pesertadidik = '$id_pesertadidik'");
    }

    public function updatefinalisasi_admin($status, $id)
    {
        $this->db->query("UPDATE pengguna SET status='$status' WHERE id = '$id'");
    }

    public function updatepassword($username, $password, $id)
    {
        $this->db->query("UPDATE pengguna SET username='$username', password='$password' WHERE id_pesertadidik = '$id'");
    }

    public function updatefinalisasi($status, $id_pesertadidik)
    {
        return $this->db->query("UPDATE pengguna SET approve_formulir='Antrian',approve_lulus='Antrian',approve_daftarulang='Antrian',status='$status' WHERE id_pesertadidik = '$id_pesertadidik'");
    }

    public function updatelulus($approve_lulus, $id)
    {
        $this->db->query("UPDATE pengguna SET approve_lulus='$approve_lulus' WHERE id = '$id'");
    }

    public function updatedaftarulanguser($where, $data)
    {
        $this->db->where($where);
        $this->db->update('daftarulang', $data);
    }

    public function updatedaftarulang($approve_daftarulang, $id)
    {
        $this->db->query("UPDATE pengguna SET approve_daftarulang='$approve_daftarulang' WHERE id = '$id'");
    }

    public function tambahiddaftarulang($data)
    {
        $this->db->insert('daftarulang', $data);
    }



    public function editdaftarulang($id)
    {
        return $this->db->get_where('daftarulang', $id);
    }


    function cek_login($username, $password)
    {
        return $this->db->query("SELECT * FROM pengguna LEFT JOIN
        datasiswa ON pengguna.id_pesertadidik = datasiswa.id_pesertadidik
        LEFT JOIN data_sd ON datasiswa.id_sekolah = data_sd.id_sekolah
        where pengguna.username='$username' AND pengguna.password='$password'");
    }


  

    function getData($table, $where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return $query->result_array();
    }

    function updateData($tbl, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($tbl, $data);
    }

    function tambahData($table, $data)
    {
        $insert = $this->db->insert($table, $data);
        return $insert;
    }

   

    function getZonasi($where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }

        $this->db->select('z.*, s.*, d.nama_desa as desa, w.nama_wilayah as kecamatan')
            ->from('zonasi z')
            ->join('data_smp s', 's.id_sekolah=z.id_sekolah')
            ->join('data_desa d', 'd.id_desa = z.id_desa')
            ->join('data_wilayah w', 'w.kode_wilayah = d.kode_wilayah');
        $query = $this->db->get();
        return $query->result_array();
    }


    function zonasiadmin($id)
    {
       return $this->db->query("SELECT * FROM zonasi 
                                LEFT JOIN data_desa ON zonasi.id_desa = data_desa.id_desa
                                LEFT JOIN data_wilayah ON data_desa.kode_wilayah = data_wilayah.kode_wilayah
                                LEFT JOIN data_smp ON zonasi.id_sekolah = data_smp.id_sekolah
                                WHERE zonasi.id_sekolah='$id'");
    }

    function getDataSiswa($where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }

        $this->db->select('siswa.*, sd.nama_sekolah as sekolah_asal')
            ->from('datasiswa siswa')
            ->join('data_sd sd', 'sd.id_sekolah=siswa.id_sekolah');

        $query = $this->db->get();
        return $query->result_array();
    }

    function getDataSiswa2($where)
    {

        return $this->db->query("SELECT * FROM sekolah_tujuan 
                                LEFT JOIN jenis_pendaftaran ON sekolah_tujuan.jenis_pendaftaran = jenis_pendaftaran.id_jenis
                                LEFT JOIN data_wilayah ON sekolah_tujuan.kode_wilayah = data_wilayah.kode_wilayah
                                LEFT JOIN data_desa ON sekolah_tujuan.id_desa = data_desa.id_desa
                                LEFT JOIN data_smp ON sekolah_tujuan.id_sekolah = data_smp.id_sekolah

                                WHERE id_pesertadidik ='$where'");
    }

    function tampilkuotawilayah()
    {
        $query = $this->db->query("SELECT dw.kode_wilayah, dw.nama_wilayah, SUM(k.total) as total_penerimaan,
                                        (SELECT count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN data_smp smp ON smp.id_sekolah=sk.id_sekolah JOIN pengguna p ON p.id_pesertadidik=sk.id_pesertadidik WHERE p.status=1 AND sk.jenis_pendaftaran=1 AND smp.kode_wilayah=dw.kode_wilayah) AS zonasi,
                                        (SELECT count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN data_smp smp ON smp.id_sekolah=sk.id_sekolah JOIN pengguna p ON p.id_pesertadidik=sk.id_pesertadidik WHERE p.status=1 AND sk.jenis_pendaftaran=2 AND smp.kode_wilayah=dw.kode_wilayah) AS afirmasi,
                                        (SELECT count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN data_smp smp ON smp.id_sekolah=sk.id_sekolah JOIN pengguna p ON p.id_pesertadidik=sk.id_pesertadidik WHERE p.status=1 AND sk.jenis_pendaftaran=3 AND smp.kode_wilayah=dw.kode_wilayah) AS pindahan,
                                        (SELECT count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN data_smp smp ON smp.id_sekolah=sk.id_sekolah JOIN pengguna p ON p.id_pesertadidik=sk.id_pesertadidik WHERE p.status=1 AND sk.jenis_pendaftaran=4 AND smp.kode_wilayah=dw.kode_wilayah) AS prestasi,
                                        (SELECT count(sk.id_pesertadidik) from sekolah_tujuan sk JOIN data_smp smp ON smp.id_sekolah=sk.id_sekolah JOIN pengguna p ON p.id_pesertadidik=sk.id_pesertadidik WHERE p.status=1 AND sk.jenis_pendaftaran=5 AND smp.kode_wilayah=dw.kode_wilayah) AS umum
                                    from sekolah_tujuan st 
                                    RIGHT JOIN data_smp ds ON ds.id_sekolah=st.id_sekolah
                                    JOIN data_wilayah dw ON dw.kode_wilayah=ds.kode_wilayah
                                    JOIN kuota_siswa k ON k.id_sekolah=ds.id_sekolah
                                    GROUP by dw.kode_wilayah");

        return $query->result_array();
    }
}
