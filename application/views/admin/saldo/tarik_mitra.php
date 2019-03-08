<?php $this->load->view('admin/h_admin'); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--content here-->
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!--<th>Key</th>-->
                                    <th>Mitra</th>
                                    <th>Tgl Request</th>
                                    <th>Jumlah Penarikan</th>
                                    <th>Action</th>
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
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    var tblTarif = document.getElementById('zero_config');
    var databaseRef = firebase.database().ref('transaksi_saldo/')
            .orderByChild("stat_deliver")
            .equalTo(0)

    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {

            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            if (childData.status === "Kredit") {
                var row = tblTarif.insertRow(rowIndex);
                var cellMitra = row.insertCell(0);
                var cellTgl = row.insertCell(1);
                var cellJml = row.insertCell(2);
                var cellAction = row.insertCell(3);
                cellMitra.appendChild(document.createTextNode(childData.id_mitra));
                cellTgl.appendChild(document.createTextNode(childData.tgl_trans));
                cellJml.appendChild(document.createTextNode(childData.jumlah));
                cellAction.innerHTML = "<button type='button' class='btn btn-success' onclick='confirm(`" + childKey + "`);'>Konfirmasi Withdrawal</button>";
                rowIndex = rowIndex + 1;
            }
        });
    });

    function confirm(id) {
        firebase.database().ref("/transaksi_saldo/" + id).once("value", function (snapshot) {
            
            snapshot.ref.child("stat_deliver").set(1);
            
            var id_mitra = (snapshot.val() && snapshot.val().id_mitra);
            var saldo = (snapshot.val() && snapshot.val().jumlah);
            update_saldo(id_mitra, saldo);

        });
    }

    function update_saldo(id_mitra, debit) {
        firebase.database().ref("mitra").orderByChild("id_mitra").equalTo(id_mitra).once("value", function (snapshot) {
            snapshot.forEach(function (user) {
                
                var saldo_sekarang = (user.val() && user.val().saldo);
                var saldo = parseInt(saldo_sekarang) - debit;
                
                user.ref.child("saldo").set(saldo);
                location.reload();
            });
        })
    }

</script>