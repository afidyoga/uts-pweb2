<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])) {
    $kode_matkul = mysqli_real_escape_string($connection, $_POST['kode_matkul']);
    $nama_matkul = mysqli_real_escape_string($connection, $_POST['nama_matkul']);
    $nama_dosen = mysqli_real_escape_string($connection, $_POST['nama_dosen']);
    $sks = mysqli_real_escape_string($connection, $_POST['sks']);

    $query = mysqli_query($connection, "INSERT INTO matakuliah (kode_matkul, nama_matkul, nama_dosen, sks) VALUES ('$kode_matkul', '$nama_matkul', '$nama_dosen', '$sks')");

    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data pertemuan'
        ];
        header('Location: ./index.php');
    } else {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => mysqli_error($connection)
        ];
        header('Location: ./index.php');
    }
} else {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Permintaan tidak valid'
    ];
    header('Location: ./index.php');
}
?>