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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form id="formTrans">
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="ti-search"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <!--content here-->
                <div class="table-responsive">
                    <table class="table table-bordered" id="tblSpinner">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mitra</th>
                                <th>Nama Mitra</th>
                                <th>Nominal Spinner</th>
                            </tr>
                            <tr>
                                <th colspan="3"><strong>Total</strong></th>
                                <th><strong><span id="totalSpin"></span></strong></th>
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
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $('body').loading({
        stoppable: false
    });
    var today = new Date();
    var start = today.setHours(0, 0, 0, 0);
    var end = today.setHours(23, 59, 59, 999);

    var tblSpinner = document.getElementById('tblSpinner');
    var databaseRef = firebase.database().ref('transaksi_saldo/').orderByChild("tgl_trans").startAt(start).endAt(end);
    var rowIndex = 1;
    var sum = 0;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {

            if (childSnapshot.val().ket_trans === "Spinner") {

                var childKey = childSnapshot.val().id_mitra;
                var childData = childSnapshot.val();

                var row = tblSpinner.insertRow(rowIndex);
                var cellId = row.insertCell(0);
                var cellMitra = row.insertCell(1);
                var cellNama = row.insertCell(2);
                var cellNominal = row.insertCell(3);
                cellId.appendChild(document.createTextNode(rowIndex));
                cellMitra.appendChild(document.createTextNode(childData.id_mitra));
                cellNominal.appendChild(document.createTextNode(toRp(childData.jumlah)));

                firebase.database().ref('/mitra/' + childKey).once('value').then(function (snapshot) {
                    cellNama.appendChild(document.createTextNode(snapshot.val() && snapshot.val().nama_mitra));
                    console.log(childKey);
                });

                rowIndex = rowIndex + 1;
                sum += parseInt(childData.jumlah);
            }
        });
        $('body').loading('stop');
        $('#totalSpin').html(toRp(sum));
    });
</script>