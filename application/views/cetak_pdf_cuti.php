<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Cuti</title>
</head><body>
<table  border="1" style="undefined;table-layout: fixed; width: 500px;border:2px black solid;">
<colgroup>
<col style="width: 150px">
<col style="width: 180.88889px">
<col style="width: 100px">
<col style="width: 100px">
<col style="width: 100px">
<col style="width: 150px">
</colgroup>
<?php foreach ($status_cuti as $data) :?>
  <tr>
    <th><img src="<?=base_url()?>assets/img/favicon.png" width="40px"></th>
    <th colspan="5">Human Resources Development Departement</th>
  </tr>
  <tr>
    <td colspan="6" style="text-align:center;">FORMULIR PERMOHONAN CUTI</td>
  </tr>
  <tr>
    <td colspan="2">Nama    : <b><?=$data->nama?></b><br>Jabatan : <b><?=$data->jabatan?></b></td>
    <td colspan="4">Dept/Lokasi  : SSB Bireuen<br>Unit               : Yayasan Sukma Bangsa </td>
  </tr>
  <tr>
    <td colspan="2">Mengajukan Permohonan Cuti : ***</td>
    <td colspan="2">Periode Th :</td>
    <td colspan="2">Hak/sisa cuti :&nbsp;&nbsp;&nbsp;&nbsp;Hari</td>
  </tr>
  <tr>
    <td colspan="2"><i class="far fa-square"></i> Cuti Tahunan</td>
    <td colspan="4"><i class="far fa-square"></i> Cuti Diluar Tanggungan Perusahaan</td>
  </tr>
  <tr>
    <td colspan="2"><i class="far fa-square"></i> Cuti Melahirkan / Gugur Kandungan</td>
    <td colspan="4"><i class="far fa-square"></i> Cuti Lain-Lain&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><i class="far fa-square"></i> Cuti Menunaikan Ibadah Haji</td>
    <td colspan="4"></td>
  </tr>
  <tr>
    <td rowspan="2">Dari tanggal</td>
    <td colspan="2">Hari : </td>
    <td rowspan="2">Kembali bekerja tanggal</td>
    <td colspan="2">Hari :</td>
  </tr>
  <tr>
    <td colspan="2">Tanggal : <b><?=$data->tanggal_cuti?></b></td>
    <td colspan="2">Tanggal : <b><?=$data->tanggal_kembali?></b></td>
  </tr>
  <tr>
    <td>Untuk keperluan</td>
    <td colspan="5"><b><?=$data->keperluan_cuti?></b></td>
  </tr>
  <tr>
    <td>Selama cuti saya dapat dihubungi</td>
    <td colspan="5">di alamat : <b><?=$data->alamat?></b><br>No. Telp  : <b><?=$data->no_hp?></b></td>
  </tr>
  <tr>
    <td colspan="5">Tugas / Pekerjaan yang sedang dijalankan : <br><?=$data->tugas_sekarang?></td>
    <td style="text-align:center;">Diserahkan Kepada :<br><br><br><?=$data->diserahkan_kepada?></td>
  </tr>
  <tr>
    <td colspan="2">Diajukan oleh,<br>Karyawan<br><br><br><br><br><b><?=$data->nama?></b><br>Tanggal : <?=$data->tanggal_pengajuan?></td>
    <td colspan="2">Disetujui oleh,<br>Atasan Langsung<br><br><br><img src="<?=base_url()?>asset/tandatangan/<?=$data->tanda_tangan;?>" width="40px" ><br><?php echo $data->nama_atasan; ?><br>Tanggal :</td>
    <td colspan="2">Diketahui oleh,<br>Kabag Tata Usaha<br><br><br><img src="<?=base_url()?>asset/tandatangan/QR_TU.png" width="40px" ><br>MAINA SARA, MA<br>Tanggal :</td>
  </tr>
  <tr>
    <td colspan="6">Diisi oleh atasan langsung (Apabila cuti ditolak atau ditangguhkan)</td>
  </tr>
  <tr>
    <td>Ditolak</td>
    <td colspan="2" rowspan="2">Sampai Dengan : <br></td>
    <td colspan="3" rowspan="2">Alasan : <br> <?=$data->alasan_ditolak?></td>
  </tr>
  <tr>
    <td>Ditangguhkan</td>
  </tr>
  <tr>
    <td colspan="6">Diisi oleh HRD Dept</td>
  </tr>
  <tr>
    <td colspan="2" rowspan="4">Dengan pengambilan cuti ini, maka hak / sisa cuti tahunan saudara periode</td>
    <td>Tahun</td>
    <td>Hak / sisa<br>(hari kerja)</td>
    <td colspan="2">Diketahui oleh,<br>HRD</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2" rowspan="3">Tanggal :</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">Catatan :<br>1 *    = Pilih salah satu<br>2 **  = Cuti melahirkan/gugur kandungan harus disertai surat keterangan dokter yang menanganinya<br>3 *** = Apabila ada persetujuan dari atasan langsung<br>4      = Bagi karyawan offshore harus disesuaikan dengan jadwalnya dan karyawan pengganti (Back-to back) dan persetujuan dari Supervisor / koordinator</td>
  </tr>
  <?php endforeach; ?>
</table>



<style>
    table {
  border-collapse: collapse;
  font-size: 11px;
}
div.a {
  border: 1px solid black;
  outline: 1px solid black;
  margin-right:20px;
  width:10px;
}

</style>
</body></html>