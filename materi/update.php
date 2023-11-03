<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $kode_matkul = mysqli_real_escape_string($connection, $_POST['kode_matkul']);
    $pertemuan_ke = mysqli_real_escape_string($connection, $_POST['pertemuan_ke']);
    $materi = mysqli_real_escape_string($connection, $_POST['materi']);
    $deskripsi = mysqli_real_escape_string($connection, $_POST['deskripsi']);

    $query = mysqli_query($connection, "UPDATE pertemuan SET kode_matkul='$kode_matkul', pertemuan_ke='$pertemuan_ke', materi='$materi', deskripsi='$deskripsi' WHERE id='$id'");

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
} else {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Permintaan tidak valid'
    ];
    header('Location: ./index.php');
}