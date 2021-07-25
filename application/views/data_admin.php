<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PENGATURAN DATA ADMIN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Pengaturan Data Admin</li>
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
            <thead class="text-left">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NO. INDUK</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">TEMPAT LAHIR</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">LEVEL</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data_admin as $data) : 
                    $roledata = $data->role;
                    if ($roledata == "0") {
                        $role="Admin";
                        $class="btn btn-primary rounded-pill text-light text-bold";
                    }else{
                        $role="Terapis";
                        $class="btn btn-info rounded-pill text-light text-bold";
                    }
                ?>
                    <tr class="nomor text-left">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->no_induk; ?></td>
                        <td><?php echo $data->jk; ?></td>
                        <td><?php echo $data->tempat_lahir; ?></td>
                        <td><?php echo $data->tanggal_lahir; ?></td>
                        <td><a class="<?=$class;?>"><?php echo $role; ?></a></td>
                        <td><?php echo anchor('home/edit_admin/'.$data->id_user,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('home/hapus_admin/'.$data->id_user,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url('home/tambahadmin'); ?>">

                    <div class="form-group">
                    <label for="">Nama Admin</label>
                    <input type="text" name="nama" class="form-control" maxlength="25">
                    </div>

                    <div class="form-group">
                    <label for="">No. Induk</label>
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

                    <div hidden class="form-group">
                    <label for="">Rombel</label>
                    <input type="text" name="rombel" class="form-control" maxlength="40" value="-">
                    </div>

                    <div hidden class="form-group">
                    <label for="">Layak PIP</label>
                    <input type="text" name="layak_pip" class="form-control" maxlength="40" value="-">
                    </div>

                    <div class="form-group">
                    <label for="">Level</label>
                    <select class="form-control selectpicker" data-size="3" name="role" id="role" data-style="btn-secondary" data-live-search="true">
                    <option value="0">Admin</option>
                    <option value="1">Terapis</option>
                    </select>
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