<?php

error_reporting(E_ALL);
include_once 'koneksi.php';
include_once 'header.php';

if (isset($_POST['submit']))
{
    $id_barang = $_POST['id_barang'];
    $Nama = $_POST['Nama'];
    $Kategori = $_POST['Kategori'];
    $Harga_beli = $_POST['Harga_beli'];
    $Harga_jual = $_POST['Harga_jual'];
    $Stok = $_POST['Stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0)
    {
        $filename = str_replace(' ', '_',$file_gambar['Name']);
        $destination = dirname(__FILE__) .'/gambar/' . $filename;
        if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (id_barang, Nama, Kategori, Harga_beli, Harga_jual, Stok, Gambar) ';
    $sql .= "VALUE ('{$id_barang}', '{$Nama}', '{$Kategori}', '{$Harga_beli}', '{$Harga_jual}', '{$Stok}', '{$Gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
  
    <link herf="style.css" rel="stylesheet" type="text/stylesheet" media="screen" />
    <title>Tambah Barang</title>
</head>
<body>
<div class="container">
    <h1>Tambah Barang</h1>
    <div class="main">
        <form method="post" action="tambah.php" enctype="multipart/form-data">
            <table border="0" align="left">
                <tr>
                    <div class="input">
                        <td>Id_Barang</td>
                        <td>:</td>
                        <td><input type="text" name="id_barang" /></td>
                    </div>
                </tr>
                <tr>
                <div class="input">
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td><input type="text" name="Nama" /></td>
                </div>
                </tr>
                <tr>
                <div class="input">
                    <td>Kategori</td>
                    <td>:</td>
                    <td><select name="Kategori">
                        <option value="Komputer">Komputer</option> 
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>  
                    </select>  
                    </td> 
                </div>
                </tr>
                <tr>
                <div class="input">
                    <td>Harga Beli</td>
                    <td>:</td>
                    <td><input type="text" name="Harga_beli" /></td>
                </div> 
                </tr> 
                <tr>
                <div class="input">
                    <td>Harga Jual</td>
                    <td>:</td>
                    <td><input type="text" name="Harga_jual" /><td>
                </div> 
                </tr>
                <tr>
                <div class="input">
                    <td>Stok</td>
                    <td>:</td>
                    <td><input type="text" name="Stok" /></td>
                </div> 
                </tr>
                <tr>
                <div class="input">
                    <td>File Gambar</td>
                    <td>:</td>
                    <td><input type="text" name="Gambar" /></td>
                </div> 
                </tr>
                <tr>
                <div class="submit">
                    <td><input type="submit" name="submit" value="Simpan" /></td>
                </div> 
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>

<?php include '../lab9_php_modular/footer.php'; ?>