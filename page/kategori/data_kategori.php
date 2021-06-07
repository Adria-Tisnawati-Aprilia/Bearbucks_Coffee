<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>

<table>
    <input type="hidden" id="id_kategori">
    <tr>
        <td>Nama Kategori</td>
        <td>:</td>
        <td>
            <input type="text" id="nama_kategori"> 
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

<table border="1" cellspacing="0" cellpadding="10" id="data">
    <thead>
        <tr>
            <th>nama_kategori</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    load();

    function load() {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/coffee/sunbucks_coffee/page/kategori/tampil.php", true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = JSON.parse(this.responseText);
                var empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                empTable.innerHTML = "";
                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        var val = response[key];
                        
                        var NewRow = empTable.insertRow(0); 
                        var nama_kategori = NewRow.insertCell(0); 
                        var aksi_cell = NewRow.insertCell(1);
                        
                        nama_kategori.innerHTML = val['nama_kategori']; 
                        aksi_cell.innerHTML = '<button onclick="edit('+ val['id_kategori'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_kategori'] +')">Hapus</button>'; 
                        
                    }
                } 

            }
        };

        xhttp.send();

        
    }

    function insert() {

        var nama_kategori = document.getElementById('nama_kategori').value;

        if(nama_kategori != ''){

            var data = { nama_kategori : nama_kategori};
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/coffee/sunbucks_coffee/page/kategori/insert.php", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        load();
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }

    }

    function edit(id_kategori) {
        var nama_kategori = document.getElementById('nama_kategori');
        var btn = document.getElementById('btn');
        var btn_edit = document.getElementById('btn_edit');
        var btn_update = document.getElementById('btn_update');
        
        btn.hidden = true;
        btn_update.hidden = false;

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/coffee/sunbucks_coffee/page/kategori/tampil_id.php?id_kategori="+id_kategori, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = JSON.parse(this.responseText);

                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        var val = response[key];

                        nama_kategori.value = val['nama_kategori'];
                        document.getElementById("id_kategori").value = val['id_kategori'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function hapus(id_kategori) {
        var xhttp = new XMLHttpRequest();
        var konfirmasi = confirm("Yakin ? Mau di Hapus ?");

        if (konfirmasi) {
            xhttp.open("GET", "http://localhost/coffee/sunbucks_coffee/page/kategori/hapus.php?id_kategori="+id_kategori, true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if(response == 1){
                        alert("Delete successfully.");

                        load();
                    }

                }
            };

            xhttp.send();
        }
    }

    function update() {

        var id_kategori = document.getElementById('id_kategori').value;
        var nama_kategori = document.getElementById('nama_kategori').value;
        
        if(nama_kategori != ""){

        var data = { id_kategori : id_kategori, nama_kategori : nama_kategori };
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/coffee/sunbucks_coffee/page/kategori/update.php", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                if(response == 1){
                    alert("Update successfully.");

                    load();
                }
            }
        };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }
    }
</script>