<?php
include("koneksi.php");
include("header.php");

$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas</title>
    <link herf="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>Data Barang</h>
        <p>
        <tr>
            <a href="tambah.php?id=">Tambah Barang</a>
        </tr>
        </p>

        <div class="main">
            <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Id_Barang</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?= $row['id_barang'];?></td>
                <td><img src="Gambar/<?= $row['Gambar'];?>" alt="<?= $row['Nama'];?>"></td>
                <td><?= $row['Nama'];?></td>
                <td><?= $row['Kategori'];?></td>
                <td><?= $row['Harga_beli'];?></td>
                <td><?= $row['Harga_jual'];?></td>
                <td><?= $row['Stok'];?></td>
                <td>
                    <a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>    

<?php include '../lab9_php_modular/footer.php'; ?>