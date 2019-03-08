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
                <th scope="col">Transaksi</th>
                <th scope="col">Total Transaksi</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>

<script>
    var tbl = document.getElementById('tblMitra');

    var databaseRef = firebase.database().ref('mitra/');
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
            var cellAlamat = row.insertCell(4);
            var cellJumlah = row.insertCell(5);
            var cellAction = row.insertCell(6);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email_mitra));
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellAlamat.appendChild(document.createTextNode(childData.alamat_mitra));
            cellJumlah.innerHTML = "Service:<span id='service'></span><br>Shop:<span id='shop'></span><br>mi-Express:<span id='express'></span>";
            cellAction.innerHTML = "<span id='total'></span>";

            tarif(childData.uid);

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
    function tarif(uid) {
        refTarif = firebase.database().ref('/tarif').orderByChild('tipe').equalTo('charge');
        refTarif.once('value').then(function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var tarif = parseInt(childSnapshot.val().tarif);

                service(tarif, uid);
                console.log("tarif: " +tarif +" + uid: " + uid);

            });
        });
    }
    function service(tarif, uid) {
        var sum = 0;
        databaseRef = firebase.database().ref('/serviceOrder').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = childData.harga;
                var ship = childData.ship;
                var percent = tarif / 100;
                var total = harga + ship;

                var pendapatan = total - (percent * total);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir Service: " + sum);
            $("#service").html(toRp(sum));
            shop(tarif, uid, sum);
        });
    }
    function shop(tarif, uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/shoporder').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = childData.price_shop;
                var ship = parseInt(childData.ship_shop);
                var percent = tarif / 100;
                var sub = (harga*parseInt(childData.qty)) + ship;

                var pendapatan = sub - (percent * sub);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir Shop: " + sum);
            $("#shop").html(toRp(sum));
            express(tarif,uid, sum+total);
        });
    }
    function express(tarif, uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/miexpress').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = parseInt(childData.harga);
                var percent = parseInt(tarif) / 100;

                var pendapatan = harga - (percent * harga);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir Express : " + sum);
            $("#express").html(toRp(sum));
            $("#total").html(toRp(sum+total));
        });
    }

</script>