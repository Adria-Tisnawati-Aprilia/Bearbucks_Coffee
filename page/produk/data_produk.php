<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>

<table>
    <input type="hidden" id="id_kategori">
    <tr>
        <td>No</td>
        <td>:</td>
        <td>
            <input type="text" id="no"> 
        </td>
    </tr>
    <tr>
        <td>Id Produk</td>
        <td>:</td>
        <td>
            <input type="text" id="id_produk"> 
        </td>
    </tr>
    <tr>
        <td>Id Kategori</td>
        <td>:</td>
        <td>
            <input type="text" id="id_kategori"> 
        </td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>
            <input type="text" id="nama"> 
        </td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>:</td>
        <td>
            <input type="text" id="harga"> 
        </td>
    </tr>
    <tr>
        <td>Deskripsi</td>
        <td>:</td>
        <td>
            <input type="text" id="deskripsi"> 
        </td>
    </tr>
    <tr>                                                    
        <td>
            <button id="btn" onclick="insert()">Submit</button> 
            <button id="btn_update" onclick="update()" hidden>Update</button>
        </td>
    </tr>
</table>

<hr>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>no</th>
            <th>id_produk</th>
            <th>id_kategori</th>
            <th>nama</th>
            <th>harga</th>
            <th>deskripsi</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>