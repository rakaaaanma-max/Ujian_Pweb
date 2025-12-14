<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

// Proses update ketika tombol ditekan
if (isset($_POST['update'])) {

    $status = $_POST['status'];
    $npm = $_POST['npm'];

    mysqli_query($koneksi, "UPDATE barang SET 
        status='$status',
        npm_pengambil='$npm'
        WHERE id='$id'
    ");

    echo "<script>alert('Status berhasil diperbarui!'); window.location='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Edit Status Barang</title>
</head>

<body>

    <div class="app">

        <div class="header">
            <div class="brand">
                <div class="logo">+</div>
                <div>
                    <div class="title">Edit Status Barang</div>
                    <div class="subtitle">Perbarui status & data pengambil</div>
                </div>
            </div>
        </div>

        <div class="card">
            <form method="POST">

                <label>Nama Barang</label>
                <input type="text" class="input"
                    value="<?= htmlspecialchars($row['nama_barang']); ?>" disabled>

                <label>Status</label>
                <select name="status" class="input">
                    <option value="tersimpan" <?= ($row['status'] == 'tersimpan') ? 'selected' : '' ?>>
                        Tersimpan
                    </option>
                    <option value="diambil" <?= ($row['status'] == 'diambil') ? 'selected' : '' ?>>
                        Telah Diambil
                    </option>
                </select>

                <label>NPM Pengambil <span class="small">(isi jika barang telah diambil)</span></label>
                <input type="text" name="npm" class="input"
                    value="<?= htmlspecialchars($row['npm_pengambil']); ?>">

                <div class="flex" style="margin-top:12px;">
                    <a href="index.php" class="btn btn-ghost">Kembali</a>
                    <button type="submit" name="update" class="btn btn-primary right">Update</button>
                </div>

            </form>
        </div>

    </div>

</body>

</html>