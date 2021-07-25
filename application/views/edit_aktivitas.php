<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT AKTIVITAS BELAJAR</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Edit Aktivitas Belajar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
            <form method="post" action="<?php echo base_url('home/update_aktivitas'); ?>">

                <div class="form-group">
                <label for="">Kode Program</label>
                <select class="form-control selectpicker" data-size="3" name="id_program" id="id_program" data-style="btn-secondary" data-live-search="true">
                <?php foreach ($program2 as $data) : ?>    
                <option selected value="<?php echo $data->id_program;?>"><b>(<?php echo $data->kode_program; ?>)</b> <?php echo $data->nama_program; ?></option>
                <?php endforeach; ?>
                <?php foreach ($program as $data) : ?>    
                <option value="<?php echo $data->id_program;?>"><b>(<?php echo $data->kode_program; ?>)</b> <?php echo $data->nama_program; ?></option>
                <?php endforeach; ?>
                </select>
                </div>

                <?php foreach ($edit_aktivitas as $data) : ?>
                <div class="form-group">
                <label for="">Aktivitas</label>
                <input type="text" name="aktivitas" class="form-control" maxlength="100" value="<?=$data->aktivitas;?>">
                </div>

                <div hidden class="form-group">
                <label for="">ID</label>
                <input type="text" name="id_aktivitas" class="form-control" value="<?=$data->id_aktivitas;?>">
                </div>

                <div class="form-group">
                <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">UBAH DATA</button>                    
                </div>
                <?php endforeach; ?>

                </form>
        </div>

    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('home/tambahsiswa'); ?>">

                    <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" maxlength="25">
                    </div>

                    <div class="form-group">
                    <label for="">NISN</label>
                    <input type="text" name="no_induk" class="form-control" maxlength="15">
                    </div>

                    <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control selectpicker" data-size="3" name="jk" id="jk" data-style="btn-secondary" data-live-search="true">
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" maxlength="30">
                    </div>

                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" maxlength="25">
                    </div>

                    <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" maxlength="50">
                    </div>

                    <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="">Rombel</label>
                    <input type="text" name="rombel" class="form-control" maxlength="40">
                    </div>

                    <div class="form-group">
                    <label for="">Layak PIP</label>
                    <select class="form-control selectpicker" data-size="3" name="layak_pip" id="layak_pip" data-style="btn-secondary" data-live-search="true">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                    </select>
                    </div>

                    <div hidden class="form-group">
                    <label for="">Role</label>
                    <input type="text" name="role" class="form-control" value="2">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">SIMPAN DATA SISWA</button>                    
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>