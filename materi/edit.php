<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM pertemuan WHERE id='$id'");
$matkul = mysqli_query($connection, "SELECT kode_matkul,nama_matkul FROM matakuliah");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Materi & Pertemuan</h1>
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
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <div class="form-group">
                <label for="kode_matkul">Mata Kuliah</label>
                <select class="form-control" name="kode_matkul" id="kode_matkul" required>
                  <option value="">--Pilih Mata Kuliah--</option>
                  <?php
                  while ($r = mysqli_fetch_array($matkul)) :
                  ?>
                    <option value="<?= $r['kode_matkul'] ?>" <?php if ($row['kode_matkul'] == $r['kode_matkul']) {
                                                              echo "selected";
                                                            } ?>><?= $r['nama_matkul'] ?></option>
                  <?php
                  endwhile;
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="pertemuan_ke">Pertemuan Ke-</label>
                <input class="form-control" type="number" name="pertemuan_ke" value="<?= $row['pertemuan_ke'] ?>" required>
              </div>
              <div class="form-group">
                <label for="materi">Materi</label>
                <input class="form-control" type="text" name="materi" value="<?= $row['materi'] ?>" required>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="4" required><?= $row['deskripsi'] ?></textarea>
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