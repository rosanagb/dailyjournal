<div class="container">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
      <i class="bi bi-plus-lg"></i> Tambah Gallery
  </button>

  <div class="row">
      <div class="table-responsive" id="gallery_data"></div>
  </div>

</div>

<!-- Awal Modal Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5">Tambah Gallery</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form method="post" action="" enctype="multipart/form-data">
              <div class="modal-body">

                  <div class="mb-3">
                      <label class="form-label">Judul</label>
                      <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul" required>
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Gambar</label>
                      <input type="file" class="form-control" name="gambar" required>
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
<!-- Akhir Modal Tambah -->

<script>
$(document).ready(function(){
    load_data();

    function load_data(hlm){
        $.ajax({
            url : "gallery_data.php",
            method : "POST",
            data : { hlm: hlm },
            success : function(data){
                $('#gallery_data').html(data);
            }
        })
    }

    $(document).on('click', '.halaman', function(){
        var hlm = $(this).attr("id");
        load_data(hlm);
    });
});
</script>

<?php
include "upload_foto.php";

// SIMPAN (INSERT / UPDATE)
if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    // wajib upload gambar untuk gallery
    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES["gambar"]);
        if ($cek_upload['status']) {
            $gambar = $cek_upload['message']; // nama file hasil upload
        } else {
            echo "<script>
                alert('".$cek_upload['message']."');
                document.location='admin.php?page=gallery';
            </script>";
            die;
        }
    }

    // mode edit (jika ada id)
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            $gambar = $_POST['gambar_lama'];
        } else {
            // hapus gambar lama kalau ganti
            if ($_POST['gambar_lama'] != '' && file_exists("img/" . $_POST['gambar_lama'])) {
                unlink("img/" . $_POST['gambar_lama']);
            }
        }

        $stmt = $conn->prepare("UPDATE gallery SET judul=?, gambar=? WHERE id_gallery=?");
        $stmt->bind_param("ssi", $judul, $gambar, $id);
        $simpan = $stmt->execute();

    } else {
        // mode tambah
        $stmt = $conn->prepare("INSERT INTO gallery (judul, gambar) VALUES (?,?)");
        $stmt->bind_param("ss", $judul, $gambar);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=gallery';
        </script>";
    }

    $stmt->close();
}

// HAPUS
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '' && file_exists("img/" . $gambar)) {
        unlink("img/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id_gallery=?");
    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=gallery';
        </script>";
    }

    $stmt->close();
}
?>
