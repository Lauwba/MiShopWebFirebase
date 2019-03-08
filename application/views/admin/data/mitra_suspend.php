<div class="card-body">
    <h5 class="card-title m-b-0">Data Mitra Ter-suspend</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tblMitra">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Penilaian</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<script>
    var tblTarif = document.getElementById('tblMitra');
    var databaseRef = firebase.database().ref('mitra/').orderByChild('status').equalTo(2);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tblTarif.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellAlamat = row.insertCell(4);
            var cellAction = row.insertCell(5);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email_mitra));
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellAlamat.appendChild(document.createTextNode(childData.alamat_mitra));
            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='suspendMitra(`" + childKey + "`);'>Suspend</button>";
            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });
    function suspendMitra() {

    }
</script>