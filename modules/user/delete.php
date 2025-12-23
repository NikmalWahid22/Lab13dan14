<?php
$id = $_GET['id'];

$data = $db->single("SELECT gambar FROM data_barang WHERE id_barang = '$id'");

if ($data) {
    
    if (!empty($data['gambar']) && file_exists("uploads/" . $data['gambar'])) {
        unlink("uploads/" . $data['gambar']);
    }
}

$delete = $db->delete("data_barang", "id_barang = '$id'");

if ($delete) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href='index.php?page=user/list';
          </script>";
} else {
    echo "<p>Gagal menghapus data!</p>";
}
?>
