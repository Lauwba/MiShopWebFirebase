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

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Total</th>
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
    $('body').loading({
        stoppable: false
    });


    var d = new Date();
    var start = d.setFullYear(d.getFullYear(), d.getMonth() - 12);

    var today = new Date();
    var end = today.setHours(23, 59, 59, 999);

    var t = $("#zero_config").DataTable();
    var databaseRef = firebase.database().ref('transaksi_saldo/').orderByChild('tgl_trans').startAt(start).endAt(end);

    var a = "Halo Gaes";
    if (a.includes("Gaes")) {
        console.log("Ada Beb")
    } else {
        console.log("Gada")
    }
    var total = 0;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {

            var childData = childSnapshot.val();

            var ket = childData.ket_trans;
            if (ket.includes("Potongan")) {
                total = total + childData.jumlah;
            }
        });
        t.row.add([
            "#",
            total,
        ]).draw(false);
        $('body').loading('stop');
    });
</script>