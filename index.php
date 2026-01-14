<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RosanaFrameWork</title>
    <link rel="icon" href="img/icon.jpg" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
      body {
        text-align: center;
        transition: all 0.3s ease;
        font-family: Arial, Helvetica, sans-serif;
      }
      img {
        transition: transform 0.3s ease;
      }
      img:hover {
        transform: scale(1.05);
      }

      .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
      }
      .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }
      #darkBtn {
        background: black;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
      }
      #lightBtn {
        background: yellow;
        color: black;
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
      }

      .card-hari {
        border-radius: 10px;
      }
      .card-body h5 {
        background-color: rgba(255, 255, 255, 0.3);
        border-bottom: 2px solid white;
        padding: 8px;
        border-radius: 6px;
        margin-bottom: 10px;
      }

      #hero {
        background: var(--bs-primary-bg-subtle);
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container d-flex align-items-center">
        <a class="navbar-brand fw-bold" href="#">My Daily Journal</a>

        <div class="d-flex ms-auto align-items-center gap-2">
          <button
            id="darkBtn"
            class="btn btn-dark btn-sm"
            onclick="ubahKeDark()"
          >
            🌙
          </button>
          <button
            id="lightBtn"
            class="btn btn-light btn-sm border"
            onclick="ubahKeLight()"
          >
            ☀️
          </button>

          <!-- Tombol toggle menu -->
          <button
            class="navbar-toggler ms-2"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <!-- Menu utama -->
        <div
          class="collapse navbar-collapse justify-content-end text-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- hero -->
    <section id="hero" class="text-center p-5">
      <div class="container">
        <div
          class="d-flex flex-column flex-md-row-reverse align-items-center gap-4"
        >
          <img src="img/banner.jpg" class="img-fluid" width="300" />
          <div class="text-center text-md-start">
            <h1 class="fw-bold display-4">Hidup adalah Anugerah</h1>
            <h4 class="lead display-6">
              Mencatat semua Moment dalam activitas
            </h4>

            <h6>
              <span id="tanggal"></span>
              <span id="jam"></span>
            </h6>
          </div>
        </div>
      </div>
    </section>

    <!-- articel -->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- galeri -->
    <section id="gallery" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Galeri</h1>

        <div
          id="carouselExample"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner rounded shadow">
            <div class="carousel-inner rounded shadow">
  <?php
  include "koneksi.php";

  $sql = "SELECT * FROM gallery ORDER BY id_gallery ASC";
  $hasil = $conn->query($sql);

  $active = "active";
  while ($row = $hasil->fetch_assoc()) {
  ?>
    <div class="carousel-item <?= $active ?>">
      <img
        src="img/<?= $row['gambar'] ?>"
        class="d-block w-100"
        alt="<?= $row['judul'] ?>"
      />
    </div>
  <?php
    $active = "";
  }
  ?>
</div>

          </div>

          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExample"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <!-- schedule -->
    <section id="schedule" class="py-5 bg-body border-top">
      <div class="container">
        <h2 class="text-center fw-bold mb-4">
          Jadwal Kuliah & Kegiatan Mahasiswa
        </h2>

        <div class="row g-3">
          <!-- Senin -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-primary h-100">
              <div class="card-body">
                <h5 class="fw-bold">Senin</h5>
                <p class="mb-2">
                  09:30 - 12:00<br />Rekayasa Perangkat Lunak<br />Ruang H5.7
                </p>
                <p>12:30 - 15:00<br />Sistem Operasi<br />Ruang H5.8</p>
              </div>
            </div>
          </div>

          <!-- Selasa -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-danger h-100">
              <div class="card-body">
                <h5 class="fw-bold">Selasa</h5>
                <p class="mb-2">
                  09:30 - 12:00<br />Probabilitas dan Statistik<br />Ruang H5.2
                </p>
                <p>
                  12:30 - 15:00<br />Manajeman Proyek Teknologi Informasi<br />Ruang
                  H4.11
                </p>
              </div>
            </div>
          </div>

          <!-- Rabu -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-success h-100">
              <div class="card-body">
                <h5 class="fw-bold">Rabu</h5>
                <p class="mb-2">
                  09:30 - 12:00<br />Logika Informatika<br />Ruang H3.8
                </p>
                <p>12:30 - 15:00<br />Basis Data<br />Ruang D2.K</p>
              </div>
            </div>
          </div>

          <!-- Kamis -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-warning h-100">
              <div class="card-body">
                <h5 class="fw-bold">Kamis</h5>
                <p class="mb-2">
                  08:40 - 10:20<br />Pemrograman Berbasis Web<br />Ruang D2.J
                </p>
                <p>
                  12:30 - 15:00<br />Sistem informasi<br />Ruang Rapet H4.12
                </p>
              </div>
            </div>
          </div>

          <!-- Jumat -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-info h-100">
              <div class="card-body">
                <h5 class="fw-bold">Jumat</h5>
                <p class="mb-2">
                  08:40 - 10:20<br />Basis Data<br />Ruang H5.6
                </p>
              </div>
            </div>
          </div>

          <!-- Sabtu -->
          <div class="col-12 col-md-3">
            <div class="card text-dark text-center bg-dark-subtle h-100">
              <div class="card-body">
                <h5 class="fw-bold">Sabtu</h5>
                <p class="mb-2">09:30 - 10:30<br />BTNG<br />Online</p>
                <p>10:30 - 12:00<br />Week End<br />Online</p>
              </div>
            </div>
          </div>

          <!-- Minggu -->
          <div class="col-12 col-md-3">
            <div class="card text-white text-center bg-dark h-100">
              <div class="card-body">
                <h5 class="fw-bold">Minggu</h5>
                <p class="mb-0">HAPPY DAY</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Profile -->
    <section id="profile" class="py-5 bg-body border-top">
      <div class="container">
        <h2 class="text-center fw-bold mb-4">Profil</h2>

        <div class="row g-4 align-items-center">
          <div class="col-12 col-md-3 text-center">
            <img
              src="img/profile.jpg"
              alt="Foto Mahasiswa"
              class="rounded-circle shadow"
              style="width: 180px; height: 180px; object-fit: cover"
            />

            <h4 class="mt-3 mb-0 d-md-none">Rosana</h4>
          </div>

          <!-- Data diri -->
          <div class="col-12 col-md-9">
            <div class="table-responsive">
              <table class="table table-striped align-middle mb-0">
                <tbody>
                  <tr class="d-none d-md-table-row">
                    <th style="width: 180px">Nama</th>
                    <td><strong>Rosana</strong></td>
                  </tr>
                  <tr>
                    <th>NIM</th>
                    <td>A11.2024.15708</td>
                  </tr>
                  <tr>
                    <th>Program Studi</th>
                    <td>Teknik Informatika</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>
                      <a href="mailto:gaby@example.com"
                        >1112415708@mhs.dinus.ac.id</a
                      >
                    </td>
                  </tr>
                  <tr>
                    <th>Telepon</th>
                    <td>+62 82137440133</td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>Jl. Kawi no 1, Semarang</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer -->
    <footer class="text-center p-5 bg-primary-subtle">
      <div class="mb-2">
        <a href="#" class="text-decoration-none me-3"
          ><i class="bi bi-instagram"></i
        ></a>
        <a href="#" class="text-decoration-none"
          ><i class="bi bi-tiktok"></i
        ></a>
      </div>
      <div>Rosana 15708 &copy; 2025</div>
    </footer>

    <script>
      function ubahKeDark() {
        document.body.style.backgroundColor = "black";
        document.body.style.color = "white";

        document.getElementById("hero").style.backgroundColor = "gray";
        document.getElementById("hero").style.color = "white";

        document.getElementById("gallery").style.backgroundColor = "gray";
        document.getElementById("gallery").style.color = "white";
      }

      function ubahKeLight() {
        document.body.style.backgroundColor = "white";
        document.body.style.color = "black";

        document.getElementById("hero").style.backgroundColor =
          "var(--bs-primary-bg-subtle)";
        document.getElementById("hero").style.color = "black";

        document.getElementById("gallery").style.backgroundColor =
          "var(--bs-primary-bg-subtle)";
        document.getElementById("galerry").style.color = "black";
      }
    </script>
    <script>
      (function () {
        const saved = localStorage.getItem("theme");
        const prefersDark = window.matchMedia(
          "(prefers-color-scheme: dark)"
        ).matches;
        const initial = saved || (prefersDark ? "dark" : "light");
        document.documentElement.setAttribute("data-bs-theme", initial);
      })();

      function setTheme(mode) {
        document.documentElement.setAttribute("data-bs-theme", mode);
        localStorage.setItem("theme", mode);
      }
      function ubahKeDark() {
        setTheme("dark");
      }
      function ubahKeLight() {
        setTheme("light");
      }
    </script>
    <script type="text/javascript">
      window.setTimeout("tampilWaktu()", 1000);

      function tampilWaktu() {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;

        setTimeout("tampilWaktu()", 1000);

        document.getElementById("tanggal").innerHTML =
          waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();

        document.getElementById("jam").innerHTML =
          waktu.getHours() +
          ":" +
          waktu.getMinutes() +
          ":" +
          waktu.getSeconds();
      }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
