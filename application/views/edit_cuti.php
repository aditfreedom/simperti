<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT PENGAJUAN CUTI KARYAWAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Cuti</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
        <?php foreach ($edit_cuti as $data) : ?>
            <form method="post" action="<?php echo base_url('admin/updatecuti'); ?>">
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
                    <select name="jenis_cuti" class="form-control" required>
                        <option selected hidden value="<?=$data->jenis_cuti?>"><?=$data->jenis_cuti?></option>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Melahirkan/Gugur Kandungan">Cuti Melahirkan/Gugur Kandungan</option>
                        <option value="Cuti Menunaikan Ibadah Haji">Cuti Menunaikan Ibadah Haji</option>
                        <option value="Cuti Diluar Tanggungan Perusahaan">Cuti Diluar Tanggungan Perusahaan</option>
                        <option value="Cuti Lain-Lain">Cuti Lain-Lain</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL MULAI CUTI</label>
                    <input type="date" name="tanggal_cuti" class="form-control" value="<?=$data->tanggal_cuti?>" required>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL BERAKHIR CUTI</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?=$data->tanggal_kembali?>" required>
                    </div>
                    <div class="form-group">
                    <label for="">KEPERLUAN CUTI</label>
                    <input type="text" name="keperluan_cuti" class="form-control" value="<?=$data->keperluan_cuti?>" required>
                    </div>
                    <hr>
                    <h5 class="text-danger">SELAMA CUTI SAYA DAPAT DI HUBUNGI PADA :</h5>
                    <div class="form-group">
                    <label for="">ALAMAT DOMISILI</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$data->alamat?>" required>
                    </div>
                    <div class="form-group">
                    <label for="">NO HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?=$data->no_hp?>" required>
                    </div>
                    <hr>
                    <h5 class="text-danger">PENYERAHAN TUGAS SEMENTARA :</h5>
                    <div class="form-group">
                    <label for="">TUGAS & TANGGUNG JAWAB SEKARANG</label>
                    <textarea name="tugas_sekarang" cols="30" rows="5" class="form-control" required><?=$data->tugas_sekarang?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="">DISERAHKAN KEPADA</label>
                    <input type="text" name="diserahkan_kepada" class="form-control" value="<?=$data->diserahkan_kepada?>" required>
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="">TANGGAL PENGAJUAN CUTI</label>
                    <input type="date" name="tanggal_pengajuan" class="form-control" value="<?=$data->tanggal_pengajuan?>" required>
                    </div>                 
                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">EDIT DATA</button>                                                           
                    </div>

        </form>
                <?php endforeach; ?>

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