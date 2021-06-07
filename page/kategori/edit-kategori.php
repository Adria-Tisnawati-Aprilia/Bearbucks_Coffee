<?php
    $id_kategori = $_GET['id_kategori'];
    $sql = "SELECT *FROM kategori WHERE id_kategori = $id_kategori ";
    $result = $object->query($sql);

    if ($result->num_rows > 0 ) {
        while ($row = $result->fetch_assoc()) {
            $id_kategori = $row['id_kategori'];
            $nama_kategori = $row['nama_kategori'];
        }
    } else {
        echo "Data Tidak ada";
    }
?>
<form method="POST">
    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td>:</td>
            <td>
                <input type="text" name="nama_kategori" value="<?php echo $nama_kategori?>" >
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="btn-ubah">
                    Simpan
                </button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['btn-ubah'])) {
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        $sql = "UPDATE kategori SET nama_kategori= '$nama_kategori' WHERE id_kategori = "$id_kategori";

        if ($object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>location=?halaman=kategori';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?halaman=edit-kategori&id_kategori=$id_kategori');</script>";
            exit;
        }
    }
    ?>