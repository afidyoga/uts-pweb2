<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kode_matkul = $_GET['kode_matkul'];
$query = mysqli_query($connection, "SELECT * FROM matakuliah WHERE kode_matkul='$kode_matkul'");
$nama_dosen = mysqli_query($connection, "SELECT nidn, nama_dosen FROM dosen");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Mata Kuliah</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./update.php" method="POST">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <div class="form-group">
                <label for="kode_matkul">Kode Mata Kuliah</label>
                <input class="form-control" type="text" name="kode_matkul" value="<?= $row['kode_matkul'] ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nama_matkul">Nama Mata Kuliah</label>
                <input class="form-control" type="text" name="nama_matkul" value="<?= $row['nama_matkul'] ?>" required>
              </div>
              <div class="form-group">
              <label for="kode_matkul">Nama Dosen</label>
              <select class="form-control" name="nama_dosen" id="nama_dosen" required>
                <option value="">--Pilih Mata Kuliah--</option>
                  <?php
                  while ($r = mysqli_fetch_array($nama_dosen)) :
                  ?>
                    <option value="<?= $r['nama_dosen'] ?>" <?php if ($row['nama_dosen'] == $r['nama_dosen']) {
                                                              echo "selected";
                                                            } ?>><?= $r['nama_dosen'] ?></option>
                  <?php
                  endwhile;
                  ?>
              </select>
              </div>
              <div class="form-group">
                <label for="sks">SKS</label>
                <input class="form-control" type="number" name="sks" value="<?= $row['sks'] ?>" required>
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
              </div>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>