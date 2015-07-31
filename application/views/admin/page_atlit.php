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
                               <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/add_data"; ?>">
                               Insert Data </a>
                              </label>
                             
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Kabupaten</th>
                                            <th>Provinsi</th>
                                            <th>Pekerjaan</th>
                                            <th>Kontak</th>
                                            <th>Kejuaraan </th>
                                            <th>Hasil kejuaraan</th>
                                            <th>Kekuatan</th>
                                            <th>Kelenturan</th>
                                            <th>Kecepatan</th>
                                            <th>Reaksi</th>
                                            <th>Power</th>
                                            <th>Daya Tahan Otot</th>
                                            <th>V02Max</th>
                                            <th>Kelincahan</th>
                                            <th>Teknik</th>
                                            <th>Kesehatan</th>
                                            <th>Psikologi</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($atl as $keyPro){ ?>
                                    <tbody>
                                           <tr class="odd gradeX"> <td><?php echo $keyPro['id_atlit']; ?></td>
                                            <td><?php echo $keyPro['nm_atlit']; ?></td>
                                            <td><?php echo $keyPro['tmpt_lahir']; ?></td>
                                            <td><?php echo $keyPro['tgl_lahir']; ?></td>
                                            <td><?php echo $keyPro['alamat']; ?></td>
                                            <td><?php echo $keyPro['kabupaten']; ?></td>
                                            <td><?php echo $keyPro['propinsi']; ?></td>
                                            <td><?php echo $keyPro['pekerjaan']; ?></td>
                                            <td><?php echo $keyPro['kontak']; ?></td>
                                            <td><?php echo $keyPro['kejuaraan_ygdiikuti']; ?></td>
                                            <td><?php echo $keyPro['hasil_kejuaraan']; ?></td>
                                            <td><?php echo $keyPro['kekuatan']; ?></td>
                                            <td><?php echo $keyPro['kelenturan']; ?></td>
                                            <td><?php echo $keyPro['kecepatan']; ?></td>
                                            <td><?php echo $keyPro['reaksi']; ?></td>
                                            <td><?php echo $keyPro['power']; ?></td>
                                            <td><?php echo $keyPro['dayatahanotot']; ?></td>
                                            <td><?php echo $keyPro['v02max']; ?></td>
                                            <td><?php echo $keyPro['kelincahan']; ?></td>
                                            <td><?php echo $keyPro['teknik']; ?></td>
                                            <td><?php echo $keyPro['kesehatan']; ?></td>
                                            <td><?php echo $keyPro['psikologi']; ?></td>
                                            <td><?php echo $keyPro['username_atlit']; ?></td>
                                            <td><?php echo $keyPro['password_atlit']; ?></td>
                                            <td align="left">
                                                <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/edit_data/".$keyPro['id_atlit']; ?>">Edit</a> ||
                                                <a class="btn btn-primary" href="<?php echo base_url()."index.php/c_admin/do_delete/".$keyPro['id_atlit']; ?>">Delete</a>
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
