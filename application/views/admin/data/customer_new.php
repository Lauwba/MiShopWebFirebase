<div class="card-body">
    <h5 class="card-title m-b-0">Data Customer Aktif</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tabelData">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Daftar</th>
                <!--<th scope="col">Action</th>-->
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<script>
    var tbl = document.getElementById('tabelData');
    var databaseRef = firebase.database().ref('customer/').orderByChild('statusAktif').equalTo(0);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tbl.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellAlamat = row.insertCell(4);
            var cellTgl = row.insertCell(5);
//            var cellAction = row.insertCell(6);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.fotoCustomer + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email));
            cellNama.appendChild(document.createTextNode(childData.nama));
            cellAlamat.appendChild(document.createTextNode(childData.alamat));
            cellTgl.appendChild(document.createTextNode(childData.terdaftar));
//            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='suspendCustomer(`" + childKey + "`);'>Suspend</button>";
            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });
    function suspendCustomer() {

    }
</script>