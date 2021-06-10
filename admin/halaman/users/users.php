<main>
    <div class="recent">
    <div class="projects">
    <div class="card" style="background-color: white;">
					<div class="card-header">
                        <h3><i class="fa fa-plus"></i> Tambah Users</h3>
					</div>
                    <div class="card-body">
                        <input type="hidden" id="id_users">
                        <label for="nama_kategori"> Username </label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda">
                        <br><br>
                        <input type="hidden" id="id_kategori">
                        <label for="nama_kategori"> Password </label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda">
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
							<h3><i class="fa fa-bars"></i> Data Users</h3>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								
								<table width="100%" id="data">
									<thead>
										<tr>
											<td width="10%">No.</td>
                                            <td width="40%">Username</td>
											<td width="100%" style="padding-left: 135px;">Aksi</td>
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
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/users/fileAjax.php?request=1", true);

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
                        let username = NewRow.insertCell(1);
                        let aksi_cell = NewRow.insertCell(2);
                        let sesi = "<?= $_SESSION['username'] ?>";

                        nomer.innerHTML = val['no'];
                        username.innerHTML = val['username'];

                        if (val['username'] == sesi) {
                            aksi_cell.innerHTML = '<div style="padding-left: 60px;"> <button style="padding-left: 15px; padding-right: 20px;" class="btn-warning" onclick="edit('+ val['id_users'] +')" id="btn_edit"><i class="fa fa-pencil"></i> Edit</button> </div>'; 
                        } else {
                            aksi_cell.innerHTML = '<div style="padding-left: 60px;"> <button style="padding-left: 15px; padding-right: 20px;" class="btn-warning" onclick="edit('+ val['id_users'] +')" id="btn_edit"><i class="fa fa-pencil"></i> Edit</button>  <button class="btn-danger" onclick="hapus('+ val['id_users'] +')"><i class="fa fa-trash-o"></i> Hapus</button> </div>'; 
                        }
                        
                    }
                } 

            }
        };

        xhttp.send();

        
    }

    function insert() {

        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;

        if(username != '' && password != ''){

            let data = { username : username, password : password };
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/Bearbucks_Coffee/admin/halaman/users/fileAjax.php?request=2", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        load();

                        document.getElementById("username").value="";
                        document.getElementById("password").value="";
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }

    }

    function edit(id_users) {
        let username = document.getElementById('username');
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');
        
        btn.hidden = true;
        btn_update.hidden = false;

        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/users/fileAjax.php?request=4&id_users="+id_users, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        username.value = val['username'];
                        password.value = val['password'];
                        document.getElementById("id_users").value = val['id_users'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function hapus(id_users) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Yakin ? Mau di Hapus ?");

        if (konfirmasi) {
            xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/users/fileAjax.php?request=3&id_users="+id_users, true);

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

        let id_users = document.getElementById('id_users').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');

        if(username != '' && password != ''){

        let data = { id_users : id_users, username : username, password : password };
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/Bearbucks_Coffee/admin/halaman/users/fileAjax.php?request=5", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var response = this.responseText;
                if(response == 1){
                    alert("Update successfully.");

                    load();

                    document.getElementById("username").value="";
                    document.getElementById("password").value="";

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