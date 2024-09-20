<?php

if(isset($_POST['Submit'])){
    $nama = htmlspecialchars ($_POST['Nama']);
    $ukuran = implode(',',$_POST['size']);
    $harga = htmlspecialchars ($_POST['Harga']);
    $deskripsi = htmlspecialchars ($_POST['diskripsi']);
    
    $data = [
        'nama' => $nama,
        'ukuran' => $ukuran,
        'harga' => $harga,
        'diskripsi' => $deskripsi
       
    ];

    // var_dump($data);

    // sebelum menginputkan data kedalam database kita akan memvalidasi semua inputan, apakah sudah terisi
    // jika ternyata ada sebuah field yang tidak terisi maka fungsi validasiBarang akan mengeluarkan 
    // pesan error melalui url
    // jika berhasil, variabel validasi akan menghasilkan nilai 0
    $validasi = validasiBarang($data);
    
    // jika validasi berhasil (tidak ada inputan yang kosong atau bernilai 0)
    if($validasi === 0)
    {
        // maka input data barang akan di lakukan dengan memanggil fungsi inputBarang
        $result = inputBarang($data, $koneksi);

        // jika eksekusi query berhasil maka halaman akan di arahkan ke input_sepatu.php dengan pesan sukses = 1
        if ($result) header("Location: input.sepatu.php?success=1");  
        else header("Location: input.sepatu.php?errno=1");  // jika eksekusi tidak berhasil, maka halaman akan diarahkan ke halmaan input_sepatu.php dengan error no = 1
    } 
    else 
        header("Location: input.sepatu.php?error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong

    exit();
    
}


if (isset($_POST['uploadGambar'])){

$id = $_POST['id'];
$gambar = basename($_FILES['gambar']['name']);

$data = [
    'id' => $id,
    'gambar' => $gambar
];

$validasi = validasiBarang($data);

if($validasi === 0) {
    $result = inputGambarPisah($data, $koneksi);

    if($result){
        $dir = $_SERVER['DOCUMENT_ROOT'].'/katalog sepatu fira/upload/';
        $upload = tambahGambar($dir, $_FILES['gambar']);
        if($upload) header("location: upload_gambar.php?id=$id&success=2");
        else header("location: upload_gambar.php?id=$id&errno=1");
      
    
    }
    else header("location:upload_gambar.php?id=$id&errno=2");
}
else 
     header("Location: upload_gambar.php?id=id&error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong


exit();
}
else if(isset($_POST['del'])){
    $id = $_POST['id'];

    $result = hapusBarang($id, $koneksi);

    if($result) header("Location: tampil_barang.php?success=2"); 
    else header("Location: tampil_barang.php?errno=2"); 
}

if (isset($_POST['uploadGambar'])){

    $id = $_POST['id'];
    $gambar = basename($_FILES['gambar']['name']);

    $data = [
        'id' => $id,
        'gambar' => $gambar
    ];

    $validasi = validasiBarang($data);

    if($validasi === 0) {
        $result = inputGambarPisah($data, $koneksi);

        if($result){
            $dir = $_SERVER['DOCUMENT_ROOT'].'/katalog sepatu fira/upload/sepatu/';
            $upload = tambahGambar($dir, $_FILES['gambar']);
            if($upload) header("location: upload_gambar.php?id=$id&success=2");
            else header("location:upload_gambar.php?id=$id&errno=2");
        }
        else header("location:upload_gambar.php?id=$id&errno=2");
    }
    else 
         header("Location: upload_gambar.php?id=$id&error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong


    exit();
}

if(isset($_POST['updateSepatuGambar']))
{
    $nama = htmlspecialchars($_POST['Nama']);    
    $ukuran = implode(',',$_POST['size']);
    $harga = htmlspecialchars($_POST['Harga']);
    $deskripsi = htmlspecialchars($_POST['Deskripsi']);
    $id = $_POST['id'];   

    // variabel gambar yang baru jika diupdate maka variabel ini akan terisi
    $gambar = basename($_FILES['gambar']['name']);

    // variabel gambar yang lama ditabel barang
    $gblama = $_POST['gambar_lama'];

    if(!empty($gambar)){
        $data = [
            'nama' => $nama, 
            'ukuran' => $ukuran,
            'harga' => $harga,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar
        ];
    }
    else {
        $data = [
            'nama' => $nama, 
            'ukuran' => $ukuran,
            'harga' => $harga,
            'deskripsi' => $deskripsi
        ];
    }

    $validasi = validasiBarang($data);

    if($validasi === 0){
        $result = updateBarangGambar($data, $koneksi, $id);
        if($result) {
            if(!empty($gambar))
            {
                $gb = tampilSatuBarangGambar($koneksi, $id);
                $dest = $_SERVER['DOCUMENT_ROOT'].'/katalog sepatu fira/upload/';
                $upload = tambahGambar($dest, $_FILES['gambar']);
                if($upload) 
                { 
                    unlink("../upload/$gblama");
                    header("location: tampil_barang_gambar.php");
                }
                else {
                    header("location: tampil_barang_gambar.php?errno=2");
                }
            }
            else {
                header("location: tampil_barang_gambar.php");
            }
        }
        else {
            header("location: tampil_barang_gambar.php?errno=1");
        }
    }
    else 
        header("Location: tampil_barang.php?id=$id&error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong
    
    exit();
}
    if(isset($_POST['updatesepatu'])){
        $nama = htmlspecialchars($_POST['Nama']);    
        $size = implode(',',$_POST['size']); 
        $harga = htmlspecialchars($_POST['harga']);
        $deskripsi = htmlspecialchars($_POST['diskripsi']);
        $id = $_POST['id'];   

        $data = [
            'nama' => $nama,
            'size' => $size,
            'harga' => $harga,
            'diskripsi' => $deskripsi
        ];

        $validasi = validasiBarang($data);

        if($validasi === 0){
            $result = updateBarang($koneksi, $data, $id);

            if ($result) header("location: tampil_barang.php?success=1");
            else header("location: tampil_barang.php?errno=1");
        }
        else 
            header("Location: tampil_barang.php?&error=missing_field&field=" . $validasi); // line ini berisi pesan error jika ada salah satu inputan kosong dan inputan yang mana yang kosong
    }

?>


