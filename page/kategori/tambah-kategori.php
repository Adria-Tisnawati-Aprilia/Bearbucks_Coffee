<form method="POST">
    <table>
        <tr>
            <td>Nama Kategori</td>
            <td>:</td>
            <td>
                <input type="text" name="nama_kategori">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="btn-tambah">
                    Tambah
                </button>
            </td>
        </tr>
    </table>
</form>

<?php
    if (isset($_POST['btn-tambah'])) {
        $nama_kategori = $_POST['nama_kategori'];

        $sql = "INSERT INTO kategori VALUES('','$nama_kategori')";

        if ($mysql_object->query($sql) === TRUE) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>location=?halaman=kategori';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('?halaman=tambah-kategori');</script>";
            exit;
        }
    }
    ?>