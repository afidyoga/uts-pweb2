<?php
session_start();
require_once '../helper/connection.php';

$kode_matkul = $_POST['kode_matkul'];
$nama_matkul = $_POST['nama_matkul'];
$nama_dosen = $_POST['nama_dosen']; // Menggunakan variabel nama_dosen yang sesuai dengan nama input field pada formulir
$sks = $_POST['sks'];

$query = mysqli_query($connection, "UPDATE matakuliah SET nama_matkul = '$nama_matkul', nama_dosen = '$nama_dosen', sks = '$sks' WHERE kode_matkul = '$kode_matkul'");

if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
