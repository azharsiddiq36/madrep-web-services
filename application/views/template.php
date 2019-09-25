<!DOCTYPE html>
<style>
.dash-li{
    display: inline-block;
    margin-left: 10px;
}
</style>
<html>
  <head>
    <title>Medical Representative</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet">
      <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/icons/favicon.ico"/>
      <!--===============================================================================================-->
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animate/animate.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/select2/select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/util.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dropify/css/dropify.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--      <script type='text/javascript' src='--><?php //echo base_url();?><!--assets/js/jquery.autocomplete.js'></script>-->
<!--      <link href='--><?php //echo base_url();?><!--assets/js/jquery.autocomplete.css' rel='stylesheet' />-->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/jquery-ui/jquery-ui.css">





      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1 style="font-size: 22px"><a>Medical Representative</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="<?php base_url()?>welcome" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="<?= base_url()?>profile">Profile</a></li>
	                          <li><a href=<?php base_url()?>"logout">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="<?php if($this->uri->segment(1)=="dashboard_admin" || $this->uri->segment(1)=="login"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>dashboard_admin"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_pengguna"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_pengguna">Pengguna</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_pegawai"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_dokter">Dokter</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_narapidana"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_madrep">Medrep</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_penjamin"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_obat">Obat</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_kunjungan"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_kunjungan">Kunjungan</a></li>
                        <li class="<?php if($this->uri->segment(1)=="daftar_absen"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_absen">Absen</a></li>
                    <li class="<?php if($this->uri->segment(1)=="daftar_lokasi_absen"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_lokasi_absen">Lokasi Absen</a></li>
                    <li class="<?php if($this->uri->segment(1)=="daftar_kategori"){echo "current";}?>"><a class="btnmenu" href="<?php echo base_url()?>daftar_kategori">Kategori</a></li>

             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
	  	</div>
		  	<div class="row">
		  		<div class="col-md-12 panel-heading">

		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">
                            <?php
                                $kata =  explode("_",$this->uri->segment(1));
                                $susun = null;
                                foreach ($kata as $word){
                                    $susun = $susun." ".$word;
                                }
                                echo ucwords(ucfirst($susun));
                            ?>
                        </div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  		<?php echo $contents ;?>
					</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>

  </body>


  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery/jquery.autocomplete.min.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery/jquery.autocomplete.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url()?>assets/js/dataTables.bootstrap.js"></script>
  <script src="<?php echo base_url()?>assets/js/dropzone.js"></script>
  <script src="<?php echo base_url()?>assets/dropify/js/dropify.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/tilt/tilt.jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/app.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          $('#dataTables-example').dataTable();
          $( "#datepicker" ).datepicker({
              dateFormat:'dd-mm-yy',
          });
          $( "#datepicker2" ).datepicker({
              dateFormat:'dd-mm-yy',
          });
          $( "#datepicker1" ).datepicker({
              dateFormat:'dd-mm-yy',
          });
          $('.dropify').dropify({
              messages: {
                  default: 'Drag atau drop untuk memilih gambar',
                  replace: 'Ganti',
                  remove:  'Hapus',
                  error:   'error'
              }
          });
      });



  </script>
  </body>
</html>