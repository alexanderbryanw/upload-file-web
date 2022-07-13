<?php

// data dari form
$judul = $_POST['judul'];
$foto = $_FILES['foto'];

// dapatkan ekstensi file
$ext = explode(".", $foto['name']);
$ext = end($ext);
$ext = strtolower($ext);

// buat array yang berisi daftar ekstensi yang diperbolehkan
$ext_boleh = ["jpg", "jpeg", "png"];

// cek apakah file yang diupload memiliki ext yang valid
if(in_array($ext, $ext_boleh)){
    echo "File valid. Upload berhasil";
    $sumber = $foto['tmp_name'];
    $tujuan = "uploads/" . $foto['name'];
    move_uploaded_file($sumber, $tujuan);

    $k = new PDO("mysql:host=localhost;dbname=unimedia_senin", "root", "");
    $sql = "INSERT INTO gallery (judul, foto)
            VALUES (?, ?)";

    $result = $k->prepare($sql);
    $result->execute([$judul, $tujuan]);

}else{
    echo "File tidak valid. Upload ditolak";
}
