<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT DIVISI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Edit Divisi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
                 <form method="post" action="<?php echo base_url('admin/updatedivisi'); ?>">
                    <?php foreach ($edit_divisi as $data) : ?>

                    <div class="form-group" hidden>
                    <label for="">ID Divisi</label>
                    <input type="text" name="id_divisi" class="form-control" maxlength="15" value="<?=$data->id_divisi;?>">
                    </div>
                 
                    <div class="form-group">
                    <label for="">Nama Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control" maxlength="15" value="<?=$data->nama_divisi;?>">
                    </div>
                    <?php endforeach; ?>

                    <div class="form-group">
                    <button type="submit" class="btn text-bold btn-primary form-control" style="height:40px;">SIMPAN DATA</button>                    
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
                <form method="post" action="<?php echo base_url('admin/tambahdivisi'); ?>">

                    <div class="form-group">
                    <label for="">Nama Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control" maxlength="15">
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