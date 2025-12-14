<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Barang Hilang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        a {
            text-decoration: none;
        }

        .btn {
            padding: 5px 8px;
            background: #333;
            color: white;
            border-radius: 4px;
        }

        .taken {
            background: #e8ffe8;
            /* warna hijau cerah untuk barang yang sudah diambil */
        }
    </style>
</head>

<body>

    <h2 style="text-align:center;">DATA BARANG HILANG DI KAMPUS</h2>

    <div style="text-align:center;">
        <a class="btn" href="tambah.php">Tambah Barang</a>
    </div>

    <!-- ===================== -->
    <!-- BARANG MASIH TERSIMPAN -->
    <!-- ===================== -->

    <h3 style="text-align:center; margin-top: 40px;">BARANG YANG MASIH TERSIMPAN</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Detail</th>
            <th>Tempat Ditemukan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $tersimpan = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='tersimpan' ORDER BY id DESC");
        while ($row = mysqli_fetch_array($tersimpan)) {
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['detail_barang']; ?></td>
                <td><?= $row['tempat_ditemukan']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a class="btn" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                    <a class="btn" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- ===================== -->
    <!-- BARANG SUDAH DIAMBIL -->
    <!-- ===================== -->

    <h3 style="text-align:center; margin-top: 40px;">BARANG YANG SUDAH DIAMBIL</h3>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Detail</th>
            <th>Tempat Ditemukan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>NPM Pengambil</th>
            <th>Aksi</th>
        </tr>

        <?php
        $diambil = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='diambil' ORDER BY id DESC");
        while ($row2 = mysqli_fetch_array($diambil)) {
        ?>
            <tr class="taken">
                <td><?= $row2['id']; ?></td>
                <td><?= $row2['nama_barang']; ?></td>
                <td><?= $row2['detail_barang']; ?></td>
                <td><?= $row2['tempat_ditemukan']; ?></td>
                <td><?= $row2['tanggal']; ?></td>
                <td><?= $row2['status']; ?></td>
                <td><?= $row2['npm_pengambil']; ?></td>
                <td>
                    <a class="btn" href="edit.php?id=<?= $row2['id']; ?>">Edit</a>
                    <a class="btn" href="hapus.php?id=<?= $row2['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>