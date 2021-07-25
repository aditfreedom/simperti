<!doctype html>
<html lang="en">
  <head>
  <link href="<?=base_url()?>assets/img/favicon.png" rel="icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&family=Share+Tech+Mono&family=Varela+Round&display=swap" rel="stylesheet">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'login.css';?>">
    <script src="https://kit.fontawesome.com/2d7830743a.js" crossorigin="anonymous"></script>

    <title>MONITORING METODE ABA</title>
  </head>
  <div class="limiter">
  <body style="background-image: url(<?php echo base_url('assets/img/new-tech.jpg');?>);background-size: cover;}">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <img src="<?=base_url()?>assets/img/favicon.png" class="mx-auto d-block" width="100px">
            <h6 class="text-center" style="margin-top:5px;"><b>SISTEM MONITORING<br>DENGAN METODE ABA</b></h6><br>
            <h5 class="text-center"><b>ADMIN/TERAPIS AREA</b></h5>

            <?php echo form_open('adminuser/login_aksi');?>
              <div class="form-label-group">
                <input  name="username" id="inputEmail" class="form-control"  required autofocus>
                <label for="inputEmail">NIP</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="date" id="inputPassword" class="form-control" required>
                <label for="inputPassword">TANGGAL LAHIR</label>
              </div>
              <!-- <div class="form-label-group">
              <input type="checkbox" onclick="myFunction()" id="show"> Tampil Password
              </div> -->

              <button class="btn btn-lg text-light btn-block text-uppercase font-weight-bold rounded-pill" type="submit" style="background-color:#FF0064;"><b>Login</b></button>
              <?php echo form_close();?>
            </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    <script>
    function myFunction() {
  var x = document.getElementById("inputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
  </body>
</html>