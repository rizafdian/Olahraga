<!DOCTYPE html>
<html>
<head>
<title>Ganti Foto</title>
</head>
<body>
<?php  foreach ( $profile as $keyPro ) { ?>
     <div id="gallery" class="col-lg-4">
                <div>
                    <?php echo '<img class="img-thumbnail" src="'.base_url().'/assets/profil/'.$keyPro->gambar.'">' ?> 
                </div>
    </div>
  <?php  } ?>
  <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'index.php/c_atlit/upload' ?>">
        <div style="width:50px;height:50px">
            <input class="btn btn-primary" name="gambar" id="gambar" type="file" onchange="cektypefile();" onclick="cektypefile();" required>
            <br>
            <button class="btn btn-primary" type="submit" id="button" > Upload </button>
            <label id="alerttype" ></label>
            <label id="alertsize" ></label>
        </div>
    </form>
    </body>
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
</html>