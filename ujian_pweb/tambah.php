<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nama       = $_POST['nama'];
    $lokasi     = $_POST['lokasi'];
    $detail  = $_POST['detail'];
    $tanggal    = date("Y-m-d");

    $query = "INSERT INTO barang 
                (nama_barang, detail_barang, tempat_ditemukan, tanggal, status)
              VALUES 
                ('$nama', '$detail', '$lokasi', '$tanggal', 'tersimpan')";

    mysqli_query($koneksi, $query);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="app">

        <div class="header">
            <div class="brand">
                <div class="logo">+</div>
                <div>
                    <div class="title">Tambah Barang Hilang</div>
                    <div class="subtitle">Isi data barang baru</div>
                </div>
            </div>
        </div>

        <div class="card">
            <form method="POST">

                <label>Nama Barang</label>
                <input type="text" name="nama" class="input" required>

                <label>Lokasi Hilang / Ditemukan</label>
                <input type="text" name="lokasi" class="input" required>

                <label>Detail</label>
                <textarea name="detail" class="input" rows="4" required></textarea>

                <div class="flex" style="margin-top:12px;">
                    <a href="index.php" class="btn btn-ghost">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary right">Simpan</button>
                </div>

            </form>
        </div>

    </div>

</body>

</html>