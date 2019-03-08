<div class="card-body">    
    <h5 class="card-title m-b-0">Data Customer Suspend</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tabelData">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Laporan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<script>
    var tbl = document.getElementById('tabelData');
    var databaseRef = firebase.database().ref('customer/').orderByChild('statusAktif').equalTo(1);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var uid = childSnapshot.val().uid;
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tbl.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellJumlah = row.insertCell(4);
            var cellAction = row.insertCell(5);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.fotoCustomer + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email));
            cellNama.appendChild(document.createTextNode(childData.nama));
//            cellJumlah.appendChild(document.createTextNode("0"));
            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='suspendCustomer(`" + childKey + "`);'>Aktifkan Customer</button>";
            
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
    function suspendCustomer(id) {
        $('body').loading({
            stoppable: false
        });
        firebase.database().ref("/customer/" + id).once("value", function (snapshot) {
            snapshot.ref.child("statusAktif").set(0);
            snapshot.ref.child("masaSuspend").set(0);
            $('body').loading('stop');
            location.reload();
        });
    }
</script>
