<div class="card-body">
    <h5 class="card-title m-b-0">Data Registrasi Mitra</h5>
</div>
<div class="table-responsive">
    <table class="table" id="tblMitra">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Dokumen</th>
                <th scope="col">Kode Unik</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<script>
    var tblTarif = document.getElementById('tblMitra');
    var databaseRef = firebase.database().ref('mitra/').orderByChild('statusAktif').equalTo(0);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var childKey = childSnapshot.key;
            var uid = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tblTarif.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellDok = row.insertCell(4);
            var cellUnik = row.insertCell(5);
            var cellAction = row.insertCell(6);

            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email_mitra));
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellUnik.appendChild(document.createTextNode(childData.unik));
            cellDok.innerHTML = "<table><tr><td><a target='_blank' id='ktp" + uid + "'>KTP</a></td><td><a target='_blank' id='diri" + uid + "'>Diri</a></td><td>"
                    +"<a target='_blank' id='plat" + uid + "'>"
                    + "Plat</a></td><td><a target='_blank' id='skck" + uid + "'>SKCK</a></td><td><a target='_blank' id='stnk" + uid + "'>STNK</a></td>"
                    + "<td><a target='_blank' id='sim" + uid + "'>SIM</a></td><td><a target='_blank' id='stiker" + uid + "'>Stiker</a></td></tr></table>";
            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='accMitra(`" + childKey + "`);'>Acc sbg Mitra</button>";

            $("#ktp" + uid).attr("href", childData.ktp);
            $("#diri" + uid).attr("href", childData.foto);
            $("#plat" + uid).attr("href", childData.plat);
            $("#skck" + uid).attr("href", childData.skck);
            $("#sim" + uid).attr("href", childData.sim);
            $("#stiker" + uid).attr("href", childData.stiker);
            $("#stnk" + uid).attr("href", childData.stnk);

            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });

    function accMitra(id) {
        firebase.database().ref("/mitra/" + id).once("value", function (snapshot) {
            snapshot.ref.child("statusAktif").set(1);
            location.reload();
        });
    }
</script>