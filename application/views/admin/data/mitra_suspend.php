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
                <th scope="col">Jumlah Laporan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>

<script>
    var tblTarif = document.getElementById('tblMitra');
    var databaseRef = firebase.database().ref('mitra/').orderByChild('statusAktif').equalTo(2);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var uid = childSnapshot.val().uid;

            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tblTarif.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellAlamat = row.insertCell(4);
            var cellJumlah = row.insertCell(5);
            var cellAction = row.insertCell(6);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email_mitra));
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellAlamat.appendChild(document.createTextNode(childData.alamat_mitra));
            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='aktifMitra(`" + childKey + "`);'>Aktifkan Mitra</button>";

            var refCustomer = firebase.database().ref('report/').orderByChild('uidTerlapor').equalTo(uid);
            refCustomer.once('value', function (snapshot) {
                var list = snapshot.numChildren();
                console.log(list);
                cellJumlah.appendChild(document.createTextNode(list));
            });
            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });
    function aktifMitra(id) {
        console.log(id);
        firebase.database().ref("/mitra/" + id).once("value", function (snapshot) {
            snapshot.ref.child("statusAktif").set(1);
            snapshot.ref.child("masaSuspend").set(0);
            location.reload();
        });
    }
    
</script>