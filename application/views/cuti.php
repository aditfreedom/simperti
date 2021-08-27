<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PENGAJUAN CUTI KARYAWAN</h1>
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
            <p align="left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
            </p>

        <table class="table table-hover" id="example">
            <thead class="text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA KARYAWAN</th>
                    <th scope="col">JENIS CUTI</th>
                    <th scope="col">TANGGAL MULAI CUTI</th>
                    <th scope="col">TANGGAL BERAKHIR CUTI</th>
                    <th scope="col">APPROVE ATASAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($cuti as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->jenis_cuti; ?></td>
                        <td><?php echo $data->tanggal_cuti; ?></td>
                        <td><?php echo $data->tanggal_kembali; ?></td>
                        <td><a href="#" class="btn btn-warning"><b><?php echo $data->approve_atasan; ?></b></a></td>
                        <td><?php echo anchor('admin/edit_cuti/'.$data->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('admin/hapus_cuti/'.$data->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4 class="text-danger">NB : <br>Harap Melapor Kepada Atasan Langsung Dan TU Untuk Approval</h4>
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
                <form method="post" action="<?php echo base_url('admin/tambahcuti'); ?>">

                    <div class="form-group" hidden>
                    <label for="">ID USER</label>
                    <input type="text" name="id_user" class="form-control" value="<?=$this->session->userdata('id_user')?>">
                    </div>
                    <h5 class="text-danger">RINCIAN CUTI :</h5>
                    <div class="form-group">
                    <label for="">JENIS CUTI</label>
                    <select name="jenis_cuti" class="form-control" required>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Melahirkan/Gugur Kandungan">Cuti Melahirkan/Gugur Kandungan</option>
                        <option value="Cuti Menunaikan Ibadah Haji">Cuti Menunaikan Ibadah Haji</option>
                        <option value="Cuti Diluar Tanggungan Perusahaan">Cuti Diluar Tanggungan Perusahaan</option>
                        <option value="Cuti Lain-Lain">Cuti Lain-Lain</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL MULAI CUTI</label>
                    <input type="date" name="tanggal_cuti" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">TANGGAL BERAKHIR CUTI</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">KEPERLUAN CUTI</label>
                    <input type="text" name="keperluan_cuti" class="form-control" required>
                    </div>
                    <hr>
                    <h5 class="text-danger">SELAMA CUTI SAYA DAPAT DI HUBUNGI PADA :</h5>
                    <div class="form-group">
                    <label for="">ALAMAT DOMISILI</label>
                    <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="">NO HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <hr>
                    <h5 class="text-danger">PENYERAHAN TUGAS SEMENTARA :</h5>
                    <div class="form-group">
                    <label for="">TUGAS & TANGGUNG JAWAB SEKARANG</label>
                    <textarea name="tugas_sekarang" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                    <label for="">DISERAHKAN KEPADA</label>
                    <input type="text" name="diserahkan_kepada" class="form-control" required>
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="">TANGGAL PENGAJUAN CUTI</label>
                    <input type="date" name="tanggal_pengajuan" class="form-control" required>
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