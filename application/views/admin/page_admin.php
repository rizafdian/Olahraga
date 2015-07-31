<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()."assets/"; ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url()."assets/"; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url()."assets/"; ?>bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()."assets/"; ?>distsb/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()."assets/"; ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."assets/"; ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/"; ?>dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                             
                              <label>
                               <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/add_admin"; ?>">
                               Insert Data </a>
                              </label>
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                               Import Excel</button>
                             
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Kontak</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($atl as $keyPro){ ?>
                                    <tbody>
                                           <tr class="odd gradeX"> <td><?php echo $keyPro['id_admin']; ?></td>
                                            <td><?php echo $keyPro['nm_admin']; ?></td>
                                            <td><?php echo $keyPro['username_admin']; ?></td>
                                            <td><?php echo $keyPro['password_admin']; ?></td>
                                            <td><?php echo $keyPro['kontak_admin']; ?></td>
                                            <td><?php echo $keyPro['email']; ?></td>
                                            <td><?php echo $keyPro['alamat']; ?></td>
                                            <td align="left">
                                                <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/edit_admin/".$keyPro['id_admin']; ?>">Edit</a> ||
                                                <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/do_delete_admin/".$keyPro['id_admin']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Import data excel</h4>
                      </div>
                      <div class="modal-body">
                      <?php echo form_open_multipart('import_excel/do_upload');?>
                            <div style="width:50px;height:50px">
                                <input type="file" id="file_upload" name="userfile" size="20"/><br />
                            </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="button" value="upload"> Submit </button>
                      </div>
                      <?php echo form_close();?>
                       </div>
                  </div>
                </div>   

    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/"; ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()."assets/"; ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()."assets/"; ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()."assets/"; ?>distsb/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
