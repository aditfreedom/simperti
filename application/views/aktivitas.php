<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PENGATURAN DATA AKTIVITAS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
                        <li class="breadcrumb-item active">Pengaturan Aktivitas</li>
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
                    <th scope="col">KODE PROGRAM</th>
                    <th scope="col">NAMA PROGRAM</th>
                    <th scope="col">AKTIVITAS</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($aktivitas as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->kode_program; ?></td>
                        <td><?php echo $data->nama_program; ?></td>
                        <td><?php echo $data->aktivitas; ?></td>
                        <td><?php echo anchor('home/edit_aktivitas/'.$data->id_aktivitas,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('home/hapus_aktivitas/'.$data->id_aktivitas,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
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
                <form method="post" action="<?php echo base_url('home/tambahaktivitas'); ?>">
                
                    <div class="form-group">
                    <label for="">Kode Program</label>
                    <select class="form-control selectpicker" data-size="3" name="id_program" id="id_program" data-style="btn-secondary" data-live-search="true">
                    <?php foreach ($program as $data) : ?>    
                    <option value="<?php echo $data->id_program;?>"><b>(<?php echo $data->kode_program; ?>)</b> <?php echo $data->nama_program; ?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="">Aktivitas</label>
                    <input type="text" name="aktivitas" class="form-control" maxlength="100">
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