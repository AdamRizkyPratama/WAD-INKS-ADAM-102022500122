<?php
$koneksi = mysqli_connect("localhost","root","","sistemtugasakhir");
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>