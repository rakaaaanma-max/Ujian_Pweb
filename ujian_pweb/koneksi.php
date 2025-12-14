<?php
$koneksi = mysqli_connect("localhost", "root", "", "barang_hilang");

if (!$koneksi) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>
