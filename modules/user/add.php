<?php
$db = new Database();

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    // Upload gambar
    $gambar = "";
    if (!empty($_FILES['file_gambar']['name'])) {
        $filename = time() . "_" . $_FILES['file_gambar']['name'];
        $path = "uploads/" . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path)) {
            $gambar = $filename;
        }
    }

    // Query insert (pakai $db, bukan mysqli)
    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";

    $db->query($sql);

    echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php?page=user/list';</script>";
}
?>

<div class="container">
    <h1>Tambah Barang</h1>

    <form method="post" enctype="multipart/form-data">

        <label>Nama Barang</label>
        <input type="text" name="nama" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>

        <label>Harga Jual</label>
        <input type="text" name="harga_jual" required>

        <label>Harga Beli</label>
        <input type="text" name="harga_beli" required>

        <label>Stok</label>
        <input type="text" name="stok" required>

        <label>Gambar</label>
        <input type="file" name="file_gambar">

        <button type="submit" name="submit" class="btn-primary">Simpan</button>
    </form>
</div>
