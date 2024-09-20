<?php 
// include "./adm/koneksi.php";
// echo 'tes function';

// fungsi untuk memvalidasi semua inputan dari user
function validasiBarang($data){

    foreach($data as $barang => $value){
        $value = trim($value);
        if ($value === '' || $value === null || $value === false)  return $barang; 
    }

    return 0;
}


// fungsi untuk memasukkan data ke tabel sepatu
function inputBarang($data, $koneksi){
    // global $koneksi;

    $nama = $data['nama'];
    $ukuran = $data['ukuran'];
    $harga = $data['harga'];
    $deskripsi = $data['diskripsi'];

    // prepare statement untuk mencegah SQL Injection (ikhtiar wkwk)
    $sql = "INSERT INTO sepatu (nama, size, harga,  diskripsi) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt === false) {
        return "Failed to prepare statement: " . mysqli_error($koneksi);
    }
    mysqli_stmt_bind_param($stmt, 'ssis', $nama, $ukuran, $harga,  $deskripsi);
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
        return false;
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    return true;
}
function tampilBarang($koneksi){
    $sql  = "SELECT * FROM sepatu"; // query untuk menampilkan semua data 
    $stmt = mysqli_query($koneksi, $sql);

    // $result = mysqli_fetch_array($stmt);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}
function hapusBarang($id, $koneksi){
    $sql = "DELETE FROM sepatu WHERE id = ? ";
    $stmt = mysqli_prepare($koneksi, $sql);

    if ($stmt === false) {
        return "Failed to prepare statement: " . mysqli_error($koneksi);
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
    return true;
}
function tampilSatu($koneksi, $id){
    
    $sql  = "SELECT * FROM sepatu WHERE id = $id"; // query untuk menampilkan data sesuai id yang dicari

    $stmt = mysqli_query($koneksi, $sql);
    // $result = mysqli_fetch_array($stmt);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}
// tambahan fungsi untuk yang tabel gambar dan barangnya terpisah


function inputGambarPisah($data, $koneksi){
    $id_sepatu = $data['id'];
    $gambar = $data['gambar']; 

    $sql = "INSERT INTO gambar (id_sepatu, file_gambar) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if($stmt === false) 
        return "Failed to prepare statement : ". mysqli_error($koneksi);
    mysqli_stmt_bind_param($stmt, 'is', $id_sepatu, $gambar);
    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    if($result) return true;
    else return false;
}

function tampilGambar($koneksi, $id){
    $sql = "SELECT * FROM gambar WHERE id_sepatu = $id";
    $stmt = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}

// untuk menampilkan satu barang saja
function tampilSatuBarang($koneksi, $id)
{
    $sql = "SELECT * FROM sepatu WHERE id = $id";
    $stmt = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_array($stmt);
    else return false; 
}

// fungsi untuk menampilkan kategori
function tampilKategori($koneksi)
{
    $sql = "SELECT * FROM kategori";
    $stmt = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($stmt) > 0 ) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false; 
}
// function update barang
function updateBarang($koneksi, $data, $id){

    foreach($data as $rec => $value) {
        $sql = "UPDATE sepatu SET `$rec` = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        if($stmt === false) 
            return "Failed to prepare statement : ". mysqli_error($koneksi);
        mysqli_stmt_bind_param($stmt, 'si', $value, $id);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    return true;
}

function updateBarangGambar ($data, $koneksi, $id){
    
    foreach($data as $rec => $value) {
        $sql = "UPDATE sepatu_gambar SET `$rec` = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $sql);
        if($stmt === false) 
            return "Failed to prepare statement : ". mysqli_error($koneksi);
        mysqli_stmt_bind_param($stmt, 'si', $value, $id);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    return true;
}
?>