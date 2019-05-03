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
                                    <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="mulai" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>            
                            </div>
                            <div class="col-sm-6">
                                <label>Akhir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="akhir" required="">
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
        let end = new Date(akhir).setHours(23, 59, 59, 999);
//        console.log("start: " + start);
//        console.log("end: " + end);

        income("micar", "Potongan Transaksi Mi Car", start, end);
        income("mibike", "Potongan Transaksi Mi Bike", start, end);
        income("miexpress", "Potongan Transaksi Mi Express", start, end);
        income("shop", "Potongan Transaksi Mi Shop", start, end);
        income("service", "Potongan Transaksi Mi Service", start, end);
        total(start, end);
        var url = "<?php echo site_url('Report/report_income_mishop/'); ?>" + mulai + '/' + akhir;
        $('#reportData').load(url);

    });
    function income(type, condition, start, end) {
        var total = 0;
        var databaseRef = firebase.database().ref('transaksi_saldo/').orderByChild('tgl_trans').startAt(start).endAt(end);
        databaseRef.once('value').then(function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childData = childSnapshot.val();
                var ket = childData.ket_trans;
                if (ket.includes(condition)) {
                    total = total + childData.jumlah;
                }

            });
            $('body').loading('stop');
            $("#" + type).html(toRp(total));
        });
    }
    function total(start, end){
        var total = 0;
        var databaseRef = firebase.database().ref('transaksi_saldo/').orderByChild('tgl_trans').startAt(start).endAt(end);

        databaseRef.once('value').then(function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var childData = childSnapshot.val();

                var ket = childData.ket_trans;
                if (ket.includes("Potongan")) {
                    total = total + childData.jumlah;
                }
            });
            $('body').loading('stop');
            $("#total").html(toRp(total));
        });
    }
</script>
