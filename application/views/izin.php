<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PENGAJUAN IZIN KARYAWAN</h1>
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
            <p align="left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
            </p>

        <table class="table table-hover" id="example">
            <thead class="text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA KARYAWAN</th>
                    <th scope="col">TANGGAL MULAI IZIN</th>
                    <th scope="col">TANGGAL BERAKHIR IZIN</th>
                    <th scope="col">APPROVE ATASAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($izin as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->tanggal_izin; ?></td>
                        <td><?php echo $data->tanggal_akhir_izin; ?></td>
                        <td><a href="#" class="btn btn-warning"><b><?php echo $data->approve_atasan; ?></b></a></td>
                        <td><?php echo anchor('admin/edit_izin/'.$data->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('admin/hapus_izin/'.$data->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
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
                        <option value="01 : Izin Sakit/Sick Leave">01 : Izin Sakit/Sick Leave</option>
                        <option value="02-a : Izin Tidak Masuk (Acara Keluarga)">02-a : Izin Tidak Masuk (Acara Keluarga)</option>
                        <option value="02-b : Izin Tidak Masuk (Pelatihan/Mendampingi Siswa)">02-b : Izin Tidak Masuk (Pelatihan/Mendampingi Siswa)</option>
                        <option value="02-c : Izin Tidak Masuk (Sakit Anggota Keluarga)">02-c : Izin Tidak Masuk (Sakit Anggota Keluarga)</option>
                        <option value="02-d : Izin Tidak Masuk (Meninggal Anggota Keluarga)">02-d : Izin Tidak Masuk (Meninggal Anggota Keluarga)</option>
                        <option value="03 : Izin Pulang Lebih Cepat/Datang Terlambat">03 : Izin Pulang Lebih Cepat/Datang Terlambat</option>
                        <option value="04 : Lainnya">04 : Lainnya</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="">ALASAN</label>
                    <input type="text" name="alasan" class="form-control" placeholder="Isi Jam Pulang Bila Poin 03. Ex : Ke Rumah Sakit (12.00)" required>
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