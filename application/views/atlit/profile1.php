<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Page Siswa</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/"; ?>dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/"; ?>dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistem Informasi Akademik</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li> -->
            <li><a href="<?php echo site_url('member/c_member/logout'); ?>">Logout</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>
    <!-- end header -->

    <div class="container-fluid">
      <div class="row">
       <!-- sidebar -->
          <div class = "left">
          <?php  foreach ( $profile as $keyPro ) { ?>
            <div id="gallery" class="col-xs-2 col-md-2">
                 <?php echo '<img class="img-responsive" alt="Responsive image" src="'.base_url().'/assets/profil/'.$keyPro->gambar.'">' ?> 
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Ganti Foto
                 </button>
            </div>
          <?php  } ?>
        </div>
       <!-- end sidebar --> 
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <!-- content -->
         <div class="panel panel-default">
            <div class="panel-heading">
              DataTables Advanced Tables
            </div>
             <?php  foreach ( $profile as $keyPro ) { ?>
             <div class="panel-body">
              <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <tr><th>Nama</th><td><?php echo "$keyPro->nm_atlit<br>" ; ?></td></tr>
                  <tr><th>Tempat Lahir</th><td><?php echo "$keyPro->tmpt_lahir<br>" ; ?></td></tr>
                  <tr><th>Tanggal Lahir</th><td><?php echo "$keyPro->tgl_lahir<br>" ; ?></td></tr>
                  <tr><th>Alamat</th><td><?php echo "$keyPro->alamat<br>" ; ?></td></tr>
                  <tr><th>Kabupaten</th><td><?php echo "$keyPro->kabupaten<br>" ; ?></td></tr>
                </table>
              <?php  } ?>
              </div>
            </div>
        </div>

         <!-- end content --> 

          

         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/dist/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
