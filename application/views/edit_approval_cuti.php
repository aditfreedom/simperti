<?php
  $role=$this->session->userdata('role');
  $hidden_kepsekdir="";
  $hidden_umum="";
  $hidden_sdk="";

  if ($role=="1") {
    $hidden_kepsekdir="hidden";
  }
  if ($role=="2") {
    $hidden_umum="hidden";
  }
  if ($role=="3") {
    $hidden_sdk="hidden";
  }
  ?> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">APPROVAL PENGAJUAN CUTI KARYAWAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Izin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
        <?php foreach ($edit_approval as $data) : ?>
            <form method="post" action="<?php echo base_url('admin/updateapprovalcuti'); ?>">
            <div class="form-group" hidden>
            <label for="">ID </label>
            <input type="text" name="id" class="form-control" value="<?=$data->id?>">
            </div>
            <div class="form-group" hidden>
                    <label for="">ID USER</label>
                    <input type="text" name="id_user" class="form-control" value="<?=$data->id_user?>">
                    </div>
                    <h5 class="text-danger">RINCIAN CUTI :</h5>
                    <div class="form-group">
                    <label for="">JENIS CUTI</label>
                    <input type="text" name="jenis_cuti" class="form-control" value="<?=$data->jenis_cuti?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL MULAI CUTI</label>
                    <input type="date" name="tanggal_cuti" class="form-control" value="<?=$data->tanggal_cuti?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL BERAKHIR CUTI</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?=$data->tanggal_kembali?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="">KEPERLUAN CUTI</label>
                    <input type="text" name="keperluan_cuti" class="form-control" value="<?=$data->keperluan_cuti?>" readonly>
                    </div>
                    <hr>
                    <h5 class="text-danger">SELAMA CUTI SAYA DAPAT DI HUBUNGI PADA :</h5>
                    <div class="form-group">
                    <label for="">ALAMAT DOMISILI</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$data->alamat?>" readonly>
                    </div>
                    <div class="form-group">
                    <label for="">NO HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?=$data->no_hp?>" readonly>
                    </div>
                    <hr>
                    <h5 class="text-danger">PENYERAHAN TUGAS SEMENTARA :</h5>
                    <div class="form-group">
                    <label for="">TUGAS & TANGGUNG JAWAB SEKARANG</label>
                    <textarea name="tugas_sekarang" cols="30" rows="5" class="form-control" readonly><?=$data->tugas_sekarang?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="">DISERAHKAN KEPADA</label>
                    <input type="text" name="diserahkan_kepada" class="form-control" value="<?=$data->diserahkan_kepada?>" readonly>
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="">TANGGAL PENGAJUAN CUTI</label>
                    <input type="date" name="tanggal_pengajuan" class="form-control" value="<?=$data->tanggal_pengajuan?>" readonly>
                    </div>
                    <hr> 
                    <h5 class="text-danger">KONFIRMASI APPROVAL :</h5>
                    <div class="form-group" >
                    <label for="">KONFIRMASI APPROVAL ATASAN</label>
                    <select name="approve_atasan" class="form-control" >
                        <option selected hidden value="<?=$data->approve_atasan?>"><?=$data->approve_atasan?></option>
                        <option value="Sedang Diproses">Sedang Diproses</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                    </div>
                    <div class="form-group" >
                    <label for="">ALASAN PENOLAKAN (APABILA DITOLAK)</label>
                    <textarea name="alasan_ditolak" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                <div class="form-group" <?=$hidden_kepsekdir?>>
                    <label for="">KONFIRMASI APPROVAL TU</label>
                    <select name="approve_tu" class="form-control">
                        <option selected hidden value="<?=$data->approve_atasan?>"><?=$data->approve_tu?></option>
                        <option value="Sedang Diproses">Sedang Diproses</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                    </div>

            <div class="form-group">
            <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">EDIT DATA</button>                    
        </form>
                <?php endforeach; ?>
        </div>

    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/tambahizin'); ?>">

                    <div class="form-group" hidden>
                    <label for="">ID USER</label>
                    <input type="text" name="id_user" class="form-control" value="<?=$this->session->userdata('id_user')?>">
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL MULAI IZIN</label>
                    <input type="date" name="tanggal_izin" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL BERAKHIR IZIN</label>
                    <input type="date" name="tanggal_akhir_izin" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">KODE IZIN</label>
                    <select name="kode_izin" class="form-control" required>
                        <option value="01 (Sakit/Sick Leave)">01 (Sakit/Sick Leave)</option>
                        <option value="02 (Terlambat/Coming Late)">02 (Terlambat/Coming Late)</option>
                        <option value="03 (Pulang Lebih Cepat/Early Leaving)">03 (Pulang Lebih Cepat/Early Leaving)</option>
                        <option value="04 (Keluar Sekolah/Kantor)">01 (Sakit/Sick Leave)</option>
                        <option value="05 (Tidak Masuk/Absent)">05 (Tidak Masuk/Absent)</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">ALASAN</label>
                    <input type="text" name="alasan" class="form-control" required>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">SIMPAN DATA</button>                    
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>