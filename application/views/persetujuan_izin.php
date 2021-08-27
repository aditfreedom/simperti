<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DAFTAR PENGAJUAN IZIN KARYAWAN</h1>
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
       
    <!-- <div class="container">
            <p align="left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
            </p> -->

        <table class="table table-hover" id="example">
            <thead class="text-center">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA KARYAWAN</th>
                    <th scope="col">DIVISI</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">APPROVE ATASAN</th>
                    <th scope="col">APPROVE TU</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($persetujuan_izin as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->nama_divisi; ?></td>
                        <td><?php echo $data->jabatan; ?></td>
                        <td><a href="#" class="btn btn-warning"><b><?php echo $data->approve_atasan; ?></b></a></td>
                        <td><a href="#" class="btn btn-warning"><b><?php echo $data->approve_tu; ?></b></a></td>
                        <td><?php echo anchor('admin/edit_approval_izin/'.$data->id,'<div class="btn btn-primary btn-sm"><b>EDIT APPROVAL</b></div>')?></td>	
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                        <option value="04 (Keluar Sekolah/Kantor)">04 (Keluar Sekolah/Kantor)</option>
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