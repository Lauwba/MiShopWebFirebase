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
                    <h4 class="card-title">Masukkan Range Periode</h4>
                    <form id="formPeriode">
                        <div class="row">

                            <div class="col-sm-6">
                                <label>Mulai</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="mulai">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>            
                            </div>
                            <div class="col-sm-6">
                                <label>Akhir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="akhir">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Proses</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12" id="reportData"></div>
    </div>    
</div>


<?php $this->load->view('admin/f_admin'); ?>
<script>
    $('#formPeriode').submit(function (e) {
        e.preventDefault();
        $('body').loading({
            stoppable: false
        });

        var mulai = $('[name="mulai"]').val();
        var akhir = $('[name="akhir"]').val();

        let start = new Date(mulai).getTime();
        let end = new Date(akhir).getTime();

        refTarif = firebase.database().ref('/tarif').orderByChild('tipe').equalTo('charge');

        refTarif.once('value').then(function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var tarif = childSnapshot.val().tarif;

                service(tarif, start, end);
                shop(tarif, start, end);
                ojol(tarif, start, end, 'mibike');
                ojol(tarif, start, end, 'miexpress');
                ojol(tarif, start, end, 'micar');

                var url = "<?php echo site_url('Report/report_income_mishop/'); ?>" + mulai + '/' + akhir;
                $('#reportData').load(url);
            });
            $('body').loading('stop');
        });
    });
    function service(tarif, start, end) {
        var sum = 0;
        databaseRef = firebase.database().ref('/serviceorder').orderByChild('tanggal_order').startAt(start).endAt(end);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = childData.harga;
                var ship = childData.ship;
                var percent = parseInt(tarif) / 100;

                var pendapatan = percent * (harga + ship);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir Service: " + sum);
            $("#service").html(toRp(sum));
        });
    }
    function shop(tarif, start, end) {
        var sum = 0;
        databaseRef = firebase.database().ref('/shoporder').orderByChild('tanggalOrder').startAt(start).endAt(end);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = childData.price_shop;
                var ship = parseInt(childData.ship_shop);
                var percent = parseInt(tarif) / 100;

                var pendapatan = percent * (harga + ship);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir Shop: " + sum);
            $("#shop").html(toRp(sum));
        });
    }
    function ojol(tarif, start, end, tabel) {
        var sum = 0;
        databaseRef = firebase.database().ref('/' + tabel).orderByChild('tanggal').startAt(start).endAt(end);
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
                var harga = parseInt(childData.harga);
                var percent = parseInt(tarif) / 100;

                var pendapatan = percent * (harga);

                console.log("income: " + pendapatan);

                sum = sum + pendapatan;

            });
            console.log("Akhir " + tabel + ": " + sum);
            $("#" + tabel).html(toRp(sum));
        });
    }
</script>
