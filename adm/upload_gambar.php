<?php 
        include "../config/config.php";
        

       

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--untuk menginclude kan icon di title bar windows -->
    <link rel="icon" href="../img/logo.ico" type="image/x-icon" />
    
    <!-- Bootstrap CSS yang sudah di pindah ke lokal, tidak lagi membutuhkan akses online-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   
    <!-- fontawesome adalah font yang digunakan untuk 'icon-icon' seperti icon social media, icon amplop, arrow (di bagian footer) dll akses online -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Official Website MlakuMlaku.com | SEPATU</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-11">
                <a href="uploud_barang.php"> Tampil Barang </a>
            <?php 
                
            ?>
            <!-- <h2>Input gambar untuk id sepatu = <?=['nama'] ?></h2> -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Gambar / Movie</label>
                    <input type="file" class="form-control" id="" placeholder="" name="gambar">
                </div> 
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <button type="submit" name="uploadGambar">Upload</button>
            </form>



            <?php  ?>
            </div>
        </div>
        <div class="row">
            <?php
                $gambar = tampilGambar($koneksi, $_GET['id']);
                
                if($gambar === false) echo 'gambar kosong';
                else {
                foreach($gambar as $data){ 
            ?>
            <div class="col-3">
                
                    <img src="../upload/<?= $data['file_gambar'] ?>"  style="height:50%"/>
                
            </div>
            <?php }
                }
            ?>
        </div>
    </div>
    

</body>
</html>