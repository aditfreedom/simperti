<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
       
<table class="tg" style="undefined;table-layout: fixed; width: 650px;border:2px black solid;">
  <tr>
    <th class="tg-c3ow" colspan="5"><span style="font-weight:bold;text-decoration:underline">Permintaan Izin</span><br><span style="font-weight:bold;font-style:italic">Permit Request</span></th>
    <th class="tg-0pky"><img src="<?=base_url()?>assets/img/favicon.png" width="40px"><br>
</th>
  </tr>
  <?php foreach ($status_izin as $data) : ?>
  <tr>
    <td style="border-top:1px black solid;"><span style="font-weight:bold;text-decoration:underline">Nama</span><br><span style="font-style:italic">Name</span></td>
    <td  style="border-top:1px black solid;" colspan="3">: <?php echo $data->nama; ?></td>
    <td style="border-top:1px black solid;" ><span style="font-weight:bold;text-decoration:underline">No. Induk Siswa/Pegawai</span><br><span style="font-style:italic">Student/Staff No.</span></td>
    <td style="border-top:1px black solid;">: <?php echo $data->nip_user; ?></td>
  </tr>
  <tr>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Tanggal</span><br><span style="font-style:italic">Date</span></td>
    <td class="tg-0pky" colspan="3">: (<?php echo $data->tanggal_izin; ?>) <b>s.d</b> (<?php echo $data->tanggal_akhir_izin; ?>)</td>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Bagian</span><br><span style="font-style:italic">Division</span></td>
    <td class="tg-0pky">: <?php echo $data->nama_divisi; ?></td>
  </tr>
  <tr>
    <td class="tg-73oq"><span style="font-weight:bold;text-decoration:underline">Keluar Sekolah/Kantor</span><br><span style="font-style:italic">Go out from school/office</span></td>
    <td class="tg-73oq" width="150px">:</td>
    <td class="tg-73oq" colspan="2" ><div class="a" width="5px">&nbsp;</div></td>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Kode</span><br><span style="font-style:italic">Code</span></td>
    <td class="tg-0pky">:</td>
  </tr>
  <tr>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Terlambat/Coming late</span><br><span style="font-style:italic">Keluar Lebih Cepat/Early Leaving</span></td>
    <td class="tg-iks7">:</td>
    <td class="tg-0pky" colspan="2"><div class="a" width="5px">&nbsp;</div></td>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Kode</span><br><span style="font-style:italic">Code</span></td>
    <td class="tg-0pky">: </td>
  </tr>
  <tr>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Tidak Masuk</span><br><span style="font-style:italic">Absent</span></td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky" colspan="2" width="10px"><div class="a" >&nbsp;</div></td>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Kode</span><br><span style="font-style:italic">Code</span></td>
    <td class="tg-0pky">: <?php echo $data->kode_izin; ?></td>
  </tr>
  <tr>
    <td style="border-top:1px black solid;"><span style="font-weight:bold;text-decoration:underline">Alasan</span><br><span style="font-style:italic">Reason</span></td>
    <td  style="border-top:1px black solid;" colspan="5" >: <?php echo $data->alasan; ?></td>
  </tr>
  <tr>
    <td style="border-top:1px black solid;"><span style="font-weight:bold;text-decoration:underline">Catatan Petugas Keamanan </span><br><span style="font-style:italic">Security Note</span></td>
    <td style="border-top:1px black solid;" colspan="5">:</td>
  </tr>
  <tr>
    <td style="border-top:1px black solid;"><span style="font-weight:bold;text-decoration:underline">Pemohon</span><br><span style="font-style:italic">Requested by</span></td>
    <td style="border-top:1px black solid;" colspan="2">: (<?php echo $data->nama; ?>)</td>
    <td style="border-top:1px black solid;" colspan="2"><span style="font-weight:bold;text-decoration:underline">Diketahui oleh</span><br><span style="font-style:italic">Acknowledge by</span></td>
    <td style="border-top:1px black solid;">: <img src="<?=base_url()?>asset/tandatangan/<?=$data->tanda_tangan;?>" width="40px" ><br><?php echo $data->nama_atasan; ?></td>
  </tr>
  <tr>
    <td class="tg-0pky"><span style="font-weight:bold;text-decoration:underline">Disetujui oleh</span><br><span style="font-style:italic">Approved by</span></td>
    <td class="tg-0pky" colspan="2" >: <img src="<?=base_url()?>asset/tandatangan/QR_TU.png?>" width="40px" ><br>MAINA SARA, MA</td>
    <td class="tg-73oq" colspan="2"><span style="font-weight:bold;text-decoration:underline">Diketahui Petugas Keamanan</span><br><span style="font-style:italic">Acknowledge by Security</span></td>
    <td class="tg-0pky">: </td>
  </tr>
  <tr>
    <td style="border-top:1px black solid;" colspan="6"><span style="font-weight:bold">Kode/Code</span><br>01 : Sakit /<span style="font-style:italic"> Sick Leave</span><br>02 : Terlambat / <span style="font-style:italic">Coming Late</span><br>03 : Pulang lebih cepat / <span style="font-style:italic">Early Leaving</span><br>04 : Keluar Kantor /<span style="font-style:italic"> Go out from Office</span><br>05 : Tidak Masuk / <span style="font-style:italic">Absent</span></td>
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