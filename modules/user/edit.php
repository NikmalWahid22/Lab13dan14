<?php
$id = $_GET['id'];

// Ambil data lama dengan class Database
$data = $db->single("SELECT * FROM data_barang WHERE id_barang = $id");

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    // Gambar lama tetap dipakai kalau tidak upload baru
    $gambar_baru = $data['gambar'];

    // Jika upload gambar baru
    if (!empty($_FILES['file_gambar']['name'])) {
        $filename = time() . "_" . $_FILES['file_gambar']['name'];
        $path = "uploads/" . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path)) {
            $gambar_baru = $filename;
        }
    }

    // Update pakai class Database
    $db->update("data_barang", [
        "nama"       => $nama,
        "kategori"   => $kategori,
        "harga_jual" => $harga_jual,
        "harga_beli" => $harga_beli,
        "stok"       => $stok,
        "gambar"     => $gambar_baru
    ], "id_barang = $id");

    echo "<script>alert('Data berhasil diubah'); window.location='index.php?page=user/list';</script>";
}
?>

<div class="container">
    <h1>Edit Barang</h1>

    <form method="post" enctype="multipart/form-data">

        <label>Nama Barang</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Kategori</label>
        <select name="kategori">
            <option <?= $data['kategori']=="Komputer"?'selected':''; ?>>Komputer</option>
            <option <?= $data['kategori']=="Elektronik"?'selected':''; ?>>Elektronik</option>
            <option <?= $data['kategori']=="Hand Phone"?'selected':''; ?>>Hand Phone</option>
        </select>

        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="<?= $data['harga_jual'] ?>">

        <label>Harga Beli</label>
        <input type="text" name="harga_beli" value="<?= $data['harga_beli'] ?>">

        <label>Stok</label>
        <input type="text" name="stok" value="<?= $data['stok'] ?>">

        <label>Gambar Lama</label><br>
        <img src="uploads/<?= $data['gambar'] ?>" width="100"><br><br>

        <label>Gambar Baru</label>
        <input type="file" name="file_gambar">

        <button type="submit" name="submit" class="btn-primary">Simpan</button>
    </form>
</div>
