<form id="form_topup" method="post">
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <img src="" alt="halo" style="width: 100%" id="foto_mitra">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">ID Mitra</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly="" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">Nama Mitra</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly="" name="nama_mitra">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">Saldo Saat ini</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly="" name="saldo_sekarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">Jumlah Topup</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="jumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15">Keterangan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="ket_trans"></textarea>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var id = "<?php echo $id_mitra; ?>";

    var databaseRef = firebase.database().ref('/mitra/' + id);

    databaseRef.once('value', function (snapshot) {
        if (snapshot.val() === null) {
            swal({
                title: 'Oops...',
                text: "Data tidak ditemukan!",
                type: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Close !'}).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })
        }
        var id = (snapshot.val() && snapshot.val().id_mitra);
        var nama = (snapshot.val() && snapshot.val().nama_mitra);
        var saldo = (snapshot.val() && snapshot.val().saldo);
        var foto = (snapshot.val() && snapshot.val().foto);

        $('[name="id"]').val(id);
        $('[name="nama_mitra"]').val(nama);
        $('[name="saldo_sekarang"]').val(saldo);
       document.getElementById("foto_mitra").setAttribute("src", foto);


    });

    $('#form_topup').submit(function (e) {
        e.preventDefault();
        var d = new Date();
        var tgl = d.setHours(d.getHours());

        var id_mitra = $('[name="id"]').val();
        var ket = $('[name="ket_trans"]').val();
        var debit = parseInt($('[name="jumlah"]').val());
        var id;

        id = firebase.database().ref().child('transaksi_saldo').push().key;

        var data = {
            id_trans_saldo: id,
            id_mitra: id_mitra,
            jumlah: debit,
            status: "Debit",
            ket_trans: ket,
            stat_deliver: 1,
            tgl_trans: tgl
        };

        var updates = {};
        updates['/transaksi_saldo/' + id] = data;
        firebase.database().ref().update(updates);

        update_saldo(id_mitra, debit);

        swal({
            position: 'top-middle',
            type: 'success',
            title: 'Top Up Berhasil!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OKE !'}).then((result) => {
            if (result.value) {
                location.reload();
            }
        });

    });

    function update_saldo(id_mitra, debit) {
        var saldo_sekarang = $('[name="saldo_sekarang"]').val();
        var saldo = parseInt(saldo_sekarang) + debit;
        firebase.database().ref("mitra").orderByChild("id_mitra").equalTo(id_mitra).once("value", function (snapshot) {
            snapshot.forEach(function (user) {
                user.ref.child("saldo").set(saldo);
            });
        })
    }
</script>