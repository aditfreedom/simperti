<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA ATASAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Atasan</li>
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
                    <th scope="col">NAMA</th>
                    <th scope="col">NIP</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">FILE TANDA TANGAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($atasan as $data) : ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama_atasan; ?></td>
                        <td><?php echo $data->nip; ?></td>
                        <td><?php echo $data->jabatan_atasan; ?></td>
                        <td><?php echo $data->tanda_tangan; ?></td>
                        <td><?php echo anchor('admin/edit_atasan/'.$data->id_atasan,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                        <?php echo anchor('admin/hapus_atasan/'.$data->id_atasan,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>	
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
            <?php echo form_open_multipart('admin/tambahatasan');?>

                    <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama_atasan" class="form-control" maxlength="50">
                    </div>

                    <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" name="nip" class="form-control" maxlength="15">
                    </div>

                    <div class="form-group">
                    <label for="">JABATAN</label>
                    <input type="text" name="jabatan_atasan" class="form-control" maxlength="15">
                    </div>

                    <div class="form-group">
                    <label for="">FILE QR CODE TANDA TANGAN (JPEG/JPG/PNG)</label>
                    <input type="file" name="tanda_tangan" class="form-control">
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