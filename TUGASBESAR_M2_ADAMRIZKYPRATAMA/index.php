<?php
include 'koneksi.php';
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);

if(isset($_POST['cari'])){
$nama = $_POST["keyword"];
$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$nama%'";  
$result = mysqli_query($koneksi, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
        }

        article {
            display: grid;
            grid-template-columns: repeat(3, 300px);
            gap: 25px;
            justify-content: center;
        }
        .form-cari{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 25px auto 35px;
        }
        .cari {
            width: 300px;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            box-sizing: border-box;
        }

        form button {
            padding: 12px 22px;
            background-color: #1e3a5f;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }


        .profil {
            height: 400px;
            width: 300px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }



        .nama {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            padding: 20px;
            color: #1e3a5f;
        }

        .status {
            color: gray;
            margin-top: 8px;
            margin-bottom: 8px;
            margin-left: 20px;
            text-align: left;
        }

        .tombol {
            display: block;
            width: fit-content;
            margin: 30px auto;
            padding: 10px 20px;
            background-color: white;
            color: #111;
            border: 1px solid #111;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }
        
        .aksi {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-right: 20px;
            margin-top: 20px;
        }

        .aksi .tombol {
            margin: 0;
        }

        .foto {
            width: 150px;
            height: 125px;
            object-fit: cover;
            display: block;
            border-radius: 5px;
            margin: auto;
            border: 2px solid #d1d5db;
        }

        .tambah-button {
            display: flex;
            justify-content: center;
            margin: 35px auto;  
        }

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 22px;
            background-color: #1e3a5f;
            color: white;
            border: 1px solid #1e3a5f;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            
        }
    </style>
</head>

<body>

    <h2>Mahasiswa</h2>
    
     <form action="" method="POST" class="form-cari">

        <input type="text" name="keyword" placeholder="Masukkan Nama" class="cari">
        <button type="submit" name="cari">Cari</button>
        
    </form>

    <br>
   <article>

    <?php while ($data = mysqli_fetch_assoc($result)) { ?>

        <div class="profil">

            <p class="nama">
                <?= $data['nama']; ?>
            </p>

            <img src="gambar/<?= $data['gambar']; ?>" class="foto">

            <hr>

            <p class="status">
                NIM : <?= $data['nim']; ?>
            </p>

            <p class="status">
                Status : <?= $data['status_keaktifan']; ?>
            </p>

            <p class="status">
                Total SKS : <?= $data['sks_lulus']; ?>
            </p>

            <p class="status">
                Angkatan : <?= $data['angkatan']; ?>
            </p>

            
            <div class="aksi">
                <a href="edit.php?id=<?= $data['id'] ?>" class="tombol">Edit</a>
                <a href="delete.php?id=<?= $data['id']; ?>" class="tombol">Delete</a>
            </div>
        </div>

        <?php }?>


    <br>
    <br>

</article>
<div class="tambah-button">
    <a href="tambah.php" class="btn-tambah">
        <span class="ikon-tambah">+</span>
        Tambah Mahasiswa
    </a>
</div>
</body>
</html>