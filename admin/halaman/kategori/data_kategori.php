<main>
    <div class="recent">
    <div class="projects">
    <div class="card" style="background-color: white;">
					<div class="card-header">
                        <h3 id="label_tambah"><i class="fa fa-plus"></i> Tambah Kategori</h3>
                        <h3 id="label_update" hidden><i class="fa fa-plus"></i> Edit Kategori</h3>
					</div>
                    <div class="card-body">
                        <input type="hidden" id="id_kategori">
                        <label for="nama_kategori"> Nama Kategori </label>
                        <input type="text" class="form-control" id="nama_kategori" placeholder="Masukkan Nama Kategori">
                        <br><br>
                        <button class="btn-primary" id="btn" onclick="insert()">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button class="btn-primary" id="btn_update" onclick="update()" hidden>
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
				</div>
			</div>
    </div>
    <br>

			<div class="recent" >
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3><i class="fa fa-bars"></i> Data Kategori</h3>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								
								<table width="100%" id="data">
									<thead>
										<tr>
											<td width="10%">No.</td>
                                            <td width="60%">Nama Kategori</td>
											<td width="100%" style="padding-left: 120px;">Aksi</td>
										</tr>
									</thead>
									<tbody>
                                    
                                    </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>				
			</div>

		</main>

        <script>
    load();

    function load() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/kategori/fileAjax.php?request=1", true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);
                let empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                empTable.innerHTML = "";

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        let NewRow = empTable.insertRow(-1);
                        let nomer = NewRow.insertCell(0); 
                        let nama_kategori = NewRow.insertCell(1);
                        let aksi_cell = NewRow.insertCell(2);

                        nomer.innerHTML = val['no'];
                        nama_kategori.innerHTML = val['nama_kategori'];
                        aksi_cell.innerHTML = '<div style="padding-left: 50px;"> <button class="btn-warning" onclick="edit('+ val['id_kategori'] +')" id="btn_edit"><i class="fa fa-pencil"></i> Edit</button>  <button class="btn-danger" onclick="hapus('+ val['id_kategori'] +')"><i class="fa fa-trash-o"></i> Hapus</button> </div>'; 
                        
                    }
                } 

            }
        };

        xhttp.send();

        
    }

    function insert() {

        let nama_kategori = document.getElementById('nama_kategori').value;

        if(nama_kategori != ''){

            let data = { nama_kategori : nama_kategori };
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/Bearbucks_Coffee/admin/halaman/kategori/fileAjax.php?request=2", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        load();

                        document.getElementById("nama_kategori").value="";
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }

    }

    function edit(id_kategori) {
        let nama_kategori = document.getElementById('nama_kategori');
        let label_tambah = document.getElementById('label_tambah');
        let label_update = document.getElementById('label_update');
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');
        
        label_tambah.hidden = true;
        label_update.hidden = false;
        btn.hidden = true;
        btn_update.hidden = false;

        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/kategori/fileAjax.php?request=4&id_kategori="+id_kategori, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        nama_kategori.value = val['nama_kategori'];
                        document.getElementById("id_kategori").value = val['id_kategori'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function hapus(id_kategori) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Yakin ? Mau di Hapus ?");

        if (konfirmasi) {
            xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/kategori/fileAjax.php?request=3&id_kategori="+id_kategori, true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
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

        let id_kategori = document.getElementById('id_kategori').value;
        let nama_kategori = document.getElementById('nama_kategori').value;
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');
        let label_tambah = document.getElementById('label_tambah');
        let label_update = document.getElementById('label_update');

        if(nama_kategori != ''){

        let data = { id_kategori : id_kategori, nama_kategori : nama_kategori };
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/Bearbucks_Coffee/admin/halaman/kategori/fileAjax.php?request=5", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                if(response == 1){
                    alert("Update successfully.");

                    load();

                    document.getElementById("nama_kategori").value="";

                    label_tambah.hidden = false;
                    label_update.hidden = true;
                    btn.hidden = false;
                    btn_update.hidden = true;
                }
            }
        };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }
    }
</script>