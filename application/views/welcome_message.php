<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SIAKAD | Stekomindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="<?=base_url()?>assets/images/logo-01.png"/>
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/datatables/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/datatables/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/jqueryui/jquery-ui.css">
    <script src="<?=base_url()?>assets/datatables/media/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="<?=base_url()?>assets/datatables/media/js/dataTables.bootstrap.min.js"></script>-->
    <script src="<?=base_url()?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/jqueryui/jquery-ui.js"></script>
    <!-- <script src="<?=base_url()?>assets/my_action.js"></script> -->
    <?php
        include './assets/my_action.php';
    ?>
    <style>
        body{
            background: url("<?=base_url()?>assets/images/bg.jpg");
        }
        .header{
            background: url("<?=base_url()?>assets/images/bgk.gif");
            /*min-height: 75px;*/
            border-radius: 0px;
            border-bottom: solid medium #E59F3B;
            border-left: none;
            border-right: none;
            border-top: none;
            color: #fff;
        }
        .navbar-inverse .navbar-brand {
            color: #fff;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
        }
        .form{
            background: #fff;
            border: solid thin #CCCCCC;
        }
    </style>
	
</head>
<body>
    <nav class="navbar navbar-inverse header">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">Sistem Informasi Akademik</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <!--<ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li> 
            <li><a href="#">Page 3</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>-->
        </div>
      </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Selamat Datang!</h3>
                <p>
                <b>LKP-STEKOMINDO</b> adalah Sebuah Lembaga Pendidikan dan Lembaga Keterampilan yang berizin dari Dinas Pendidikan dengan Surat Keputusan: 420.9/2606/06/2013 yang menyelenggarakan Pendidikan Non Formal dan Informal (PNFI) dalam Bidang Manajemen Informatika, Manajemen Bisnis, Akuntansi, Kesehatan, dan Kejar Paket A,B,C.<br/>

                Berada dalam Payung Hukum YPP-ABN (Yayasan Peduli Pendidikan Anak Bangsa Nusantara. Nomor Akta Notaris 05 Tahun 2012 KEPUTUSAN KEMENKUMHAM: AHU-380.AH.01.04.Tahun 2013 NPWP: 31.652.326.5-322.000 Email : ypp_abn@yahoo.co.id Dalam Payung Hukum yang sama POLITEKNIK RADEN INTAN (POLTEKTAN) 
                </p>
            </div>
            <div class="col-md-4 form">
                <br/>
                <div id="notif_login"></div>
                <form id="form_login">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>    
                <br/>
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?=base_url()?>assets/images/DSC_0115.JPG" class="img-responsive img-thumbnail"/>
            </div>
            <div class="col-md-3">
                <img src="<?=base_url()?>assets/images/2.jpg" class="img-responsive img-thumbnail"/>
            </div>
            <div class="col-md-3">
            	<img src="<?=base_url()?>assets/images/15.JPG" class="img-responsive img-thumbnail"/>
            </div>
            <div class="col-md-3">
            	<img src="<?=base_url()?>assets/images/6.JPG" class="img-responsive img-thumbnail"/>
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; 2016 STEKOMINDO | Created By <a href="https://www.facebook.com/okta.pilopa">Okta Pilopa</a>
            </div>
        </div>
    </div>
</body>
</html>