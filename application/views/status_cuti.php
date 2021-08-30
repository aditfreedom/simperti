<?php
  $role=$this->session->userdata('role');
  $hidden_kepsekdir="";
  $hidden_umum="";
  $hidden_sdk="";

  if ($role=="1") {
    $hidden_kepsekdir="hidden";
  }
  if ($role=="2") {
    $hidden_umum="hidden";
  }
  if ($role=="3") {
    $hidden_sdk="hidden";
  }
  ?> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">STATUS PENGAJUAN CUTI KARYAWAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SIMPERTI</a></li>
                        <li class="breadcrumb-item active">CUTI</li>
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
                    <th <?=$hidden_kepsekdir?> <?=$hidden_sdk?> scope="col">TANGGAL CUTI</th>
                    <th scope="col">APPROVE ATASAN</th>
                    <th scope="col">ALASAN (BILA DITOLAK)</th>
                    <th scope="col">APPROVE TU</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($status_cuti as $data) : 
                $approve_atasan=$data->approve_atasan;
                $approve_tu=$data->approve_tu;

                if ($approve_atasan=="Sedang Diproses") {
                        $btnatasan ="btn-warning";
                }elseif($approve_atasan=="Diterima"){
                        $btnatasan ="btn-success";
                }else{
                        $btnatasan ="btn-danger";
                }

                if ($approve_tu=="Sedang Diproses") {
                    $btntu ="btn-warning";
            }elseif($approve_tu=="Diterima"){
                    $btntu ="btn-success";
            }else{
                    $btntu ="btn-danger";
            }

            $persetujuan = $data->approve_tu;
            $btn_tu="";
            if ($persetujuan=="Diterima") {
                $btn_tu="";
            }else {
                $btn_tu="hidden";
            }

            $persetujuan_atasan = $data->approve_atasan;
            $btn_atasan="";
            if ($persetujuan_atasan=="Diterima") {
                $btn_atasan="";
            }else {
                $btn_atasan="hidden";
            }
                ?>
                    <tr class="nomor text-center">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $data->nama; ?></td>
                        <td><?php echo $data->jabatan; ?></td>
                        <td <?=$hidden_kepsekdir?> <?=$hidden_sdk?>>(<?php echo $data->tanggal_cuti; ?>) <b>s.d</b> (<?php echo $data->tanggal_kembali; ?>)</td>
                        <td><a href="#" class="btn <?=$btnatasan;?>"><b><?php echo $data->approve_atasan; ?></b></a></td>
                        <td><?php echo $data->alasan_ditolak; ?></td>
                        <td><a href="#" class="btn <?=$btntu;?>" <?=$btn_atasan?>><b><?php echo $data->approve_tu; ?></b></a></td>
                        <td <?=$btn_tu?>><?php echo anchor('admin/cetak_cuti/'.$data->id,'<div class="btn btn-info btn-sm"><b>CETAK</b></div>')?></td>	
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