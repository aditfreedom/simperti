<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">EDIT ATASAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">Edit Atasan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
       
                    <?php echo form_open_multipart('admin/updateatasan');?>
                    <?php foreach ($edit_atasan as $data) : ?>

                    <div class="form-group" hidden>
                    <label for="">ID Atasan</label>
                    <input type="text" name="id_atasan" class="form-control" maxlength="15" value="<?=$data->id_atasan;?>">
                    </div>
                 
                    <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama_atasan" class="form-control" maxlength="50" value="<?=$data->nama_atasan;?>">
                    </div>

                    <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" name="nip" class="form-control" maxlength="15" value="<?=$data->nip;?>">
                    </div>

                    <div class="form-group">
                    <label for="">JABATAN</label>
                    <input type="text" name="jabatan_atasan" class="form-control" maxlength="30" value="<?=$data->jabatan_atasan;?>">
                    </div>

                    <div class="form-group">
                    <label for="">QR CODE</label><br>
                    <img src="<?=base_url('asset/tandatangan/'.$data->tanda_tangan)?>" width="200px">
                    <input hidden type="text" name="tanda_tangan_lama" class="form-control" maxlength="30" value="<?=$data->tanda_tangan;?>">
                    </div>
                    <?php endforeach; ?>

                    <div class="form-group">
                    <label for="">FILE QR CODE TANDA TANGAN (JPEG/JPG/PNG)</label>
                    <input type="file" name="tanda_tangan" class="form-control">
                    </div>
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