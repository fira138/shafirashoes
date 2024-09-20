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
<body>
    <div class="container">
        <div class="row">
            <div class="col6">
                <table class='table'>
                    <tr>
                            <td>#</td>
                            <td>Nama</td>
                            <td>size</td>
                            <td>Harga</td>
                            <td>Deskripsi</td>
                            
                    <?php 
                        $barang = tampilBarang($koneksi);
                        if($barang == false)
                        {
                            echo 'barang kosong';
                        }
                        else {
                            $no=1;
                            foreach($barang as $rec){
                    ?>
                    <tr>
                            <td><?= $no ?></td>
                            <td><?= $rec['nama'] ?></td>
                            <td><?= $rec['size'] ?></td>
                            <td><?= $rec['harga'] ?></td>
                            <td><?= $rec['diskripsi'] ?></td>
                            <td><a href="update.barang.php?id=<?= $rec['id'] ?>">edit</a></td>


                           
                            <td><a href="upload_gambar.php?id=<?= $rec['id'] ?>">gambar</a></td>
                            <td>
                            <form action="" method="post">
                                    <!-- data id barang disimpan dalam tag input type hidden dengan valuenya
                                     adalah id dari record/data terpilih  -->
                                    <input type="hidden" name="id" value="<?= $rec['id'] ?>">
                                    <button type="submit" class="btn-danger" name='del'>Delete</button >
                                </form>
                                 
                    </tr>
                    <?php  $no++; 
                            }
                     }
                     ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>