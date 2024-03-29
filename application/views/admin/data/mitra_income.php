<div class="card-body">
    <h5 class="card-title m-b-0">Data Transaksi Mitra</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tblMitra">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
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

            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var uid = childData.uid;

            var row = tbl.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellNama = row.insertCell(2);
            var cellJumlah = row.insertCell(3);
            var cellAction = row.insertCell(4);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px' onerror='imgError(this)'>";
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellJumlah.innerHTML = "<table><tr><td>Service</td><td>Shop</td><td>Express</td><td>Car</td><td>Bike</td></tr>"
                    + "<tr><td><span id='service" + uid + "'></span></td><td><span id='shop" + uid + "'></span></td><td><span id='express" + uid + "'>"
                    + "</span></td><td><span id='car" + uid + "'></span></td><td><span id='bike" + uid + "'></span></td></tr></table>";
            cellAction.innerHTML = "<span id='total" + uid + "'></span>";

            service(uid);

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
    function service(uid) {
        var sum = 0;
        databaseRef = firebase.database().ref('/serviceOrder').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                if (childData.status === 4) {

                    var harga = childData.harga;
                    var ship = childData.ship;
                    var total = harga + ship;

                    var pendapatan = total;

                    console.log("income: " + pendapatan);

                    sum = sum + pendapatan;
                }

            });
            console.log("Akhir Service: " + sum);
            console.log("List: " + snapshot.numChildren());
            $("#service" + uid).html(toRp(sum));

            shop(uid, sum);
        });
    }
    function shop(uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/shoporder').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                if (childData.status_order_shop === 4) {
                    var harga = childData.price_shop;
                    var ship = parseInt(childData.ship_shop);
                    var sub = (harga * parseInt(childData.qty)) + ship;

                    var pendapatan = sub;

                    console.log("income: " + pendapatan);

                    sum = sum + pendapatan;
                }
            });
            console.log("Akhir Shop: " + sum);
            $("#shop" + uid).html(toRp(sum));
            express(uid, sum + total);
        });
    }
    function express(uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/miexpress').orderByChild('uid').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                if (childData.status === 3) {
                    var harga = parseInt(childData.harga);

                    var pendapatan = harga;

                    console.log("income: " + pendapatan);

                    sum = sum + pendapatan;
                }

            });
            console.log("Akhir Express : " + sum);
            $("#express" + uid).html(toRp(sum));
            bike(uid, sum + total)
        });
    }
    function bike(uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/mibike').orderByChild('driver').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                if (childData.status === 3) {
                    var harga = parseInt(childData.harga);

                    var pendapatan = harga;

                    console.log("income: " + pendapatan);

                    sum = sum + pendapatan;
                }

            });
            console.log("Akhir Express : " + sum);
            $("#bike" + uid).html(toRp(sum));
            car(uid, sum + total);
        });

    }
    function car(uid, total) {
        var sum = 0;
        databaseRef = firebase.database().ref('/micar').orderByChild('driver').equalTo(uid);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                if (childData.status === 3) {
                    var harga = parseInt(childData.harga);

                    var pendapatan = harga;

                    console.log("income: " + pendapatan);

                    sum = sum + pendapatan;
                }

            });
            console.log("Akhir Express : " + sum);
            $("#car" + uid).html(toRp(sum));
            $("#total" + uid).html(toRp(sum + total));
        });
    }

</script>