<?php
// file ini di-include dari admin.php, jadi session & koneksi sudah ada

$limit = 4;
$p  = isset($_GET['p']) ? (int)$_GET['p'] : 1;
if ($p < 1) $p = 1;

$offset = ($p - 1) * $limit;

// total data
$totalRes = $conn->query("SELECT COUNT(*) AS total FROM user");
$totalRow = $totalRes->fetch_assoc();
$totalData = (int)$totalRow['total'];
$totalPage = (int)ceil($totalData / $limit);

// data per halaman
$stmt = $conn->prepare("SELECT id, username, foto FROM user ORDER BY id DESC LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h5 class="m-0">Daftar User</h5>
  <a href="user_add.php" class="btn btn-primary btn-sm">+ Tambah User</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th width="60">No</th>
            <th width="120">Foto</th>
            <th>Username</th>
            <th width="200">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = $offset + 1;
          while ($row = $result->fetch_assoc()):
            $foto = (!empty($row['foto']) && file_exists("uploads/".$row['foto']))
              ? "uploads/".$row['foto']
              : "https://via.placeholder.com/80";
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="<?= htmlspecialchars($foto) ?>" width="80" class="rounded"></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td>
              <a class="btn btn-warning btn-sm" href="user_edit.php?id=<?= $row['id'] ?>">Edit</a>
              <a class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin hapus user ini?')"
                 href="user_delete.php?id=<?= $row['id'] ?>">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <!-- pagination -->
    <nav>
      <ul class="pagination">
        <?php for ($i=1; $i <= $totalPage; $i++): ?>
          <li class="page-item <?= ($i == $p) ? 'active' : '' ?>">
            <a class="page-link" href="admin.php?page=user&p=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>
</div>

<?php
$stmt->close();
?>
