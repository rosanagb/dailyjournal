<?php
include "koneksi.php";

$hlm = isset($_POST['hlm']) ? (int)$_POST['hlm'] : 1;
if ($hlm < 1) $hlm = 1;

$limit = 4;
$limit_start = ($hlm - 1) * $limit;
$no = $limit_start + 1;

$sql = "SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT $limit_start, $limit";
$hasil = $conn->query($sql);

// total data
$sql_total = "SELECT COUNT(*) AS total FROM gallery";
$total = $conn->query($sql_total)->fetch_assoc()['total'];
$total_hlm = ceil($total / $limit);
?>

<table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $hasil->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['judul']) ?></td>
        <td>
          <img src="img/<?= htmlspecialchars($row['gambar']) ?>" width="120" class="rounded">
        </td>
        <td>
          <!-- tombol edit pakai modal (kita buat datanya dikirim via hidden input) -->
          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id_gallery'] ?>">Edit</button>

          <form method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id_gallery'] ?>">
            <input type="hidden" name="gambar" value="<?= $row['gambar'] ?>">
            <button type="submit" name="hapus" class="btn btn-danger btn-sm"
              onclick="return confirm('Yakin hapus?')">Hapus</button>
          </form>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit<?= $row['id_gallery'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5">Edit Gallery</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="admin.php?page=gallery" enctype="multipart/form-data">

              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $row['id_gallery'] ?>">
                <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">

                <div class="mb-3">
                  <label class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($row['judul']) ?>" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Gambar Saat Ini</label><br>
                  <img src="img/<?= htmlspecialchars($row['gambar']) ?>" width="150" class="rounded mb-2">
                  <input type="file" class="form-control" name="gambar">
                  <small class="text-muted">Jika tidak upload, gambar lama tetap dipakai.</small>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- End Modal Edit -->

    <?php } ?>
  </tbody>
</table>

<!-- Pagination -->
<nav>
  <ul class="pagination">
    <?php for($i=1; $i<=$total_hlm; $i++){ ?>
      <li class="page-item">
        <a class="page-link halaman" id="<?= $i ?>" href="#"><?= $i ?></a>
      </li>
    <?php } ?>
  </ul>
</nav>
