<main>

<div class="recent" >
    <div class="projects">
       <div class="card">
          <div class="card-header">
             <h3><i class="fa fa-money"></i> Data Pembayaran</h3>
         </div>

         <div class="card-body">
             <div class="table-responsive">

                <table width="100%" id="data">
                   <thead>
                      <tr>
                         <td width="10%">No.</td>
                         <td width="20%">Nama Pemesan</td>
                         <td>Total Belanja</td>
                         <td>Tanggal Beli</td>
                         <td>Status</td>
                         <td>Aksi</td>
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
        xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/pembayaran/fileAjax.php?request=1", true);

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
                        let nama_pemesan = NewRow.insertCell(1);
                        let total_belanja = NewRow.insertCell(2);
                        let tgl_beli = NewRow.insertCell(3);
                        let status = NewRow.insertCell(4);
                        let aksi = NewRow.insertCell(5);

                        nomer.innerHTML = val['no'];
                        nama_pemesan.innerHTML = val['nama_pemesan'];
                        total_belanja.innerHTML = val['total_belanja'];
                        tgl_beli.innerHTML = val['tgl_beli'];
                        status.innerHTML = val['status'];

                        if (val['status'] == 0) {
                          aksi.innerHTML = '<button onclick="accept('+ val['id_checkout'] +')" class="btn-danger"><i class="fa fa-check"></i> Accept</button>';
                        } else if (val['status'] == 1) {
                          aksi.innerHTML = '<button class="btn-primary"><i class="fa fa-thumbs-up"></i> Clear</button>';
                        }
                        
                        
                    }
                } 

            }
        };

        xhttp.send();

        
    }

    function accept(id_checkout) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Pesanan Sudah di Terima ?");

        if (konfirmasi) {
            xhttp.open("GET", "http://localhost/Bearbucks_Coffee/admin/halaman/pembayaran/ajax.php?request=3&id_checkout="+id_checkout, true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Sudah di Proses");

                        load();
                    }

                }
            };

            xhttp.send();
        }
    }
</script>