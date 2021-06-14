<main>
			<div class="recent" >
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3><i class="fa fa-user"></i> Data Pelanggan</h3>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								
								<table width="100%" id="data">
									<thead>
										<tr>
											<td width="10%">No.</td>
                                            <td width="60%">Nama Pelanggan</td>
                                            <td width="60%">Telepon</td>
                                            <td width="60%">Alamat</td>
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
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/pelanggan/fileAjax.php?request=1", true);

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
                        let nama = NewRow.insertCell(1);
                        let telepon = NewRow.insertCell(2);
                        let alamat = NewRow.insertCell(3);

                        nomer.innerHTML = val['no'];
                        nama.innerHTML = val['nama'];
                        telepon.innerHTML = val['telepon'];
                        alamat.innerHTML = val['alamat'];
                    }
                } 

            }
        };

        xhttp.send();

        
    }

</script>