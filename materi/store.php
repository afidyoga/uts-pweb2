<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])) {
    $kode_matkul = mysqli_real_escape_string($connection, $_POST['kode_matkul']);
    $pertemuan_ke = mysqli_real_escape_string($connection, $_POST['pertemuan_ke']);
    $materi = mysqli_real_escape_string($connection, $_POST['materi']);
    $deskripsi = mysqli_real_escape_string($connection, $_POST['deskripsi']);

    $query = mysqli_query($connection, "INSERT INTO pertemuan (kode_matkul, pertemuan_ke, materi, deskripsi) VALUES ('$kode_matkul', '$pertemuan_ke', '$materi', '$deskripsi')");

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