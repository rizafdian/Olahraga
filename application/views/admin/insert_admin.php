<!DOCTYPE html>
<html>
<head>
<title>Page Admin</title>
<link href="<?php echo base_url()."assets/"; ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/"; ?>dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url()."index.php/c_admin/keadminan"; ?>">Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url()."index.php/c_admin/index"; ?>">Home</a></li>
            <li><a href="<?php echo base_url()."index.php/c_admin/cbOlahraga"; ?>">Cabang Olahraga</a></li>
            <li><a href="<?php echo base_url()."index.php/c_admin/keatlitan"; ?>">Atlit</a></li>
            <li><a href="<?php echo base_url()."index.php/c_admin/kepelatihan"; ?>">Pelatih</a></li>
            <li><a href="<?php echo base_url(). "index.php/c_admin/profile"; ?>">Profile</a></li> 
            <li><a href="<?php echo site_url('/c_admin/logout'); ?>">Logout</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>
     <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
      </div>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Please Insert Data
          </div>
          <div class="panel-body">
           <div class="row">
            <div class="col-lg-4">
             <form role="form" method="POST" action="<?php echo base_url()."index.php/c_admin/do_insert_admin"; ?>">
                <div class="form-group">
                  <label>Id Admin</label>
                  <input class="form-control" name="id_admin" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" name="username_admin" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="password_admin" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" name="nm_admin" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Kontak</label>
                  <input class="form-control" name="kontak_admin" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input class="form-control" name="email" placeholder="Enter text">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control" name="alamat" placeholder="Enter text">
                </div>
               <label><input class="btn btn-primary" type="submit" value="Save"></label>
             </form>
            </div>
          </div>
         </div>
        </div>
      </div>
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
