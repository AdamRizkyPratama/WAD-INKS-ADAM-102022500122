<?php
include "koneksi.php";
$data = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $data";
$result = mysqli_query($koneksi,$query);

$mahasiswa = mysqli_fetch_assoc($result);

if (isset($_POST["simpan"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $sks = $_POST['sks'];
    $status1 = $_POST['status'];

    $query = "UPDATE mahasiswa SET 
    nim = '$nim', 
    nama = '$nama', 
    angkatan = '$angkatan', 
    sks_lulus = '$sks',
    status_keaktifan = '$status1' 
    WHERE id = '$data'";

    $result = mysqli_query($koneksi,$query);
    if($result){
        header("Location: index.php");
        exit;
    }
    echo "Data Gagal Disimpan";

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
body {
    font-family: Arial, sans-serif;
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

.card1 {
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

input,
select {
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

h2{
    text-align: center;
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
</style>
</head>
<body>

    <div class="header">

        <a href="index.php">
        <img src="balik.jfif" alt="">
        </a>
        <h2>Edit Data Mahasiswa</h2>
    
    </div>

    <div class="card1">
    <form action="" method="post">

        <label for="nim">Nim</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan Nim" required value="<?= $mahasiswa['nim']; ?>">

        <label for="Nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required value="<?= $mahasiswa['nama']; ?>">

        <label for="angkatan">Angkatan</label>
        <input type="number" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" required value="<?= $mahasiswa['angkatan']; ?>">

        <label for="sks">SKS Lulus</label>
        <input type="number" id="sks" name="sks" placeholder="Masukkan Jumlah SKS" required value="<?= $mahasiswa['sks_lulus']; ?>">

        <label for="status">Status Keaktifan</label>
        <select name="status" id="status" required >
            <option value=""></option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>

        <button type="submit" name="simpan">Simpan</button>
    </form>
    </div>
</body>
</html>

