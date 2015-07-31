<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page Pelatih</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Cabang Olahraga Pelatih</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    <li><a href="">Home</a></li>
                    <li><a href="">Profile</a></li>

                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="" data-toggle="modal" data-target="#myModale"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="http://localhost/olahraga/index.php/c_pelatih/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <div class = "left">
                     <?php  foreach ( $profile as $keyPro ) { ?>
                      <div id="gallery" class="col-lg-11">
                        <?php echo '<img class="img-responsive" alt="Responsive image" src="'.base_url().'/assets/profil/'.$keyPro->gambar.'">' ?> 
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                         Ganti Foto
                        </button>                                    
                      </div>
                     <?php  } ?>
                    </div>
                </div>
            </div>

            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Table
                        </div>
                        <!-- /.panel-heading -->
                        <?php  foreach ( $profile as $keyPro ) { ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr><th>Nama</th><td><?php echo "$keyPro->nm_pelatih<br>" ; ?></td></tr>
                                    <tr><th>Tempat Lahir</th><td><?php echo "$keyPro->tmpt_lhr<br>" ; ?></td></tr>
                                    <tr><th>Tanggal Lahir</th><td><?php echo "$keyPro->tgl_lhr<br>" ; ?></td></tr>
                                    <tr><th>Alamat</th><td><?php echo "$keyPro->alamat<br>" ; ?></td></tr>
                                    <tr><th>Kabupaten</th><td><?php echo "$keyPro->kabupaten<br>" ; ?></td></tr>
                                    <tr><th>Provinsi</th><td><?php echo "$keyPro->propinsi<br>" ; ?></td></tr>
                                    <tr><th>Kontak</th><td><?php echo "$keyPro->kontak<br>" ; ?></td></tr>
                                    </table>
                        <?php  } ?>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit foto profile</h4>
                      </div>
                      <div class="modal-body">
                        <?php  foreach ( $profile as $keyPro ) { ?>
                          <div>
                           <?php echo '<img class="img-thumbnail" src="'.base_url().'/assets/profil/'.$keyPro->gambar.'">' ?> 
                          </div>
                      <?php  } ?>
                      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'index.php/c_pelatih/upload' ?>">
                            <div style="width:50px;height:50px">
                                <input class="btn btn-primary" name="gambar" id="gambar" type="file" onchange="cektypefile();" onclick="cektypefile();" required>
                                <label id="alerttype" ></label>
                                <label id="alertsize" ></label>
                            </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="button" > Upload </button>
                      </div>
                      </form>
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
     <script type="text/javascript">
    function cektypefile(){
        var gambar              =   $('#gambar')[0].files[0];
        var nama_gambar         =   gambar.name;
        var type_gambar         =   '.' + nama_gambar.split( '.' ).pop();
        var type_gambar         =   type_gambar.toLowerCase();

        var ukuran_gambar       =   $('#gambar')[0].files[0].size;
        var ukuran_gambar_kb    =   Math.floor( ukuran_gambar / 1024 );

        if ( type_gambar == '.jpg' || type_gambar == '.jpeg' || type_gambar == '.png' ){
            if ( ukuran_gambar > 512000 ){
                $('#button').prop( 'disabled' , true );
                $('#alertsize').html( '<b style="color:red"> <i> Size of image is too large, maximum size is 500kb. Your image size is ' + ukuran_gambar_kb + 'kb </i> </b>' );
            }
            else{
                $('#button').prop( 'disabled' , false );   
                $('#alertsize').html( '' );
            }
            $('#alerttype').html( '' );
        }
        else{
            $('#button').prop( 'disabled' , true );
            $('#alerttype').html( '<b style="color:red"> <i> Type of images is not valid </i> </b>' );
        }
    }
</script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
