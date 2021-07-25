<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT DATA SDK/NON SDK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Karyawan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
    <div class="container">
            <!-- <p align="left">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> Tambah Data</button>
            </p> -->


            <form method="post" action="<?php echo base_url('admin/updatekaryawan'); ?>">

            <?php foreach ($edit_karyawan as $data) : ?>
                    <div class="form-group" hidden>
                    <label for="">ID</label>
                    <input type="text" name="id_user" class="form-control" maxlength="25" value="<?=$data->id_user?>">
                    </div>

                    <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" maxlength="50" value="<?=$data->nama?>">
                    </div>

                    <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" name="nip_user" class="form-control" maxlength="15" value="<?=$data->nip_user?>">
                    </div>

                    <div class="form-group">
                    <label for="">JABATAN</label>
                    <input type="text" name="jabatan" class="form-control" maxlength="25" value="<?=$data->jabatan?>">
                    </div>
                    <?php endforeach; ?>

                    <div class="form-group">
                    <label for="">Divisi</label>
                    <select class="form-control selectpicker" data-size="3" name="divisi_user" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($edit_karyawan as $data) : ?>
                    <option selected value="<?=$data->id_divisi?>"><?=$data->nama_divisi?></option>
                    <?php endforeach; ?>
                    <?php foreach ($divisi as $data) : ?>
                    <option value="<?=$data->id_divisi?>"><?=$data->nama_divisi?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Atasan Langsung</label>
                    <select class="form-control selectpicker" data-size="3" name="id_atasan" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($edit_karyawan as $data) : ?>
                    <option selected value="<?=$data->id_atasan?>"><?=$data->jabatan_atasan?></option>
                    <?php endforeach; ?>
                    <?php foreach ($atasan as $data) : ?>
                    <option value="<?=$data->id_atasan?>"><?=$data->jabatan_atasan?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control selectpicker" data-size="3" name="role" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($edit_karyawan as $data) : ?>
                    <option selected value="<?=$data->role?>"><?=$data->role?></option>
                    <?php endforeach; ?>
                    <option value="0">ADMIN</option>
                    <option value="1">DIREKTUR/KEPALA SEKOLAH</option>
                    <option value="2">KEPALA TATA USAHA</option>
                    <option value="3">KARYAWAN</option>
                    </select>
                    </div>
                    
                    <?php foreach ($edit_karyawan as $data) : ?>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" maxlength="25" value="<?=$data->username?>">
                    </div>

                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" maxlength="50" value="<?=$data->password?>">
                    </div>
                    <?php endforeach; ?>

                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">SIMPAN DATA</button>                    
                    </div>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('admin/tambahkaryawan'); ?>">

                    <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" maxlength="25">
                    </div>

                    <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" name="nip" class="form-control" maxlength="15">
                    </div>

                    <div class="form-group">
                    <label for="">JABATAN</label>
                    <input type="text" name="jabatan" class="form-control" maxlength="15">
                    </div>

                    <div class="form-group">
                    <label for="">Divisi</label>
                    <select class="form-control selectpicker" data-size="3" name="divisi_user" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($divisi as $data) : ?>
                    <option value="<?=$data->id_divisi?>"><?=$data->nama_divisi?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Atasan Langsung</label>
                    <select class="form-control selectpicker" data-size="3" name="id_atasan" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($atasan as $data) : ?>
                    <option value="<?=$data->id_atasan?>"><?=$data->jabatan_atasan?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control selectpicker" data-size="3" name="role" id="divisi_user" data-style="btn-secondary" data-live-search="true">
                    <option value="0">ADMIN</option>
                    <option value="1">DIREKTUR/KEPALA SEKOLAH</option>
                    <option value="2">KEPALA TATA USAHA</option>
                    <option value="3">KARYAWAN</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" maxlength="25">
                    </div>

                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" maxlength="50">
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