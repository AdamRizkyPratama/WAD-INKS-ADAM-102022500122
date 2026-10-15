<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $angkatan = htmlspecialchars($_POST['angkatan']); 
    $sks = htmlspecialchars($_POST['sks']);
    $status = htmlspecialchars($_POST['status']);

    $namaGambar = $_FILES['gambar']['name'];
    $tmpGambar = $_FILES['gambar']['tmp_name'];
    $folder = "gambar/";

    move_uploaded_file($tmpGambar,$folder . $namaGambar);

    $query = "INSERT INTO mahasiswa 
              (nim, nama, angkatan, sks_lulus, status_keaktifan,gambar)
              VALUES 
              ('$nim', '$nama', '$angkatan', '$sks', '$status','$namaGambar')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    }else{
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }

 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial,sans-serif;
        }

        .header {
            position: relative;
            height: 65px;
        }

        .header img {
            position: absolute;
            left: 10px;
            top: 10px;
            height: 40px;
            width: 40px;
        }

        .header h2 {
            margin: 0;
            text-align: center;
            line-height: 65px;
        }

        .card1{
            width: 400px;
            margin: 30px auto;
            padding: 25px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

         label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

         input,select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: white;
            color: #111;
            border: 1px solid #111;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

         .kembali {
            display: block;
            text-align: left;
            margin-top: 15px;
            margin-left: 15px;
            color: #111;
            text-decoration: none;
            font-size: 15px;
        }

        .input-gambar {
            width: 100%;
            padding: 12px;
            border: 2px dashed #1e3a5f;
            border-radius: 10px;
            background-color: #f8fafc;
            box-sizing: border-box;
            
        }

        .input-gambar::file-selector-button {
            padding: 8px 12px;
            margin-right: 10px;
            background-color: white;
            color: #111;
            border: 1px solid #ccc;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">

    <a href="index.php">
    <img src="balik.jfif" alt="">
    </a>
    <h2>Tambah Data Mahasiswa</h2>
 
    </div>

    <div class="card1">
    <form action="" method="post" enctype="multipart/form-data">

        <label for="nim">Nim</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan Nim" required>

        <label for="Nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>

        <label for="angkatan">Angkatan</label>
        <input type="number" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" required>

        <label for="sks">SKS Lulus</label>
        <input type="number" id="sks" name="sks" placeholder="Masukkan Jumlah SKS" required>

        <label for="status">Status Keaktifan</label>
        <select name="status" id="status" required>
            <option value=""></option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>

        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="input-gambar">

        <button type="submit" name="simpan">Simpan</button>
    </form>
    </div>

</body>
</html>