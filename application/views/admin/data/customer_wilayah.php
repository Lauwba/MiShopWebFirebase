<script>
    function user(prov, id, active) {
        var databaseRef = firebase.database().ref('customer/').orderByChild('provinsi').equalTo(prov);

        databaseRef.once('value', function (snapshot) {
            var row = 0;
            snapshot.forEach(function (childSnapshot) {
                var actives = childSnapshot.val().statusAktif;
                var codes = active.toString() + id.toString();
                if (active.toString() === actives.toString()) {
                    row = row + 1;

                    $("#" + codes).html(row);
                }
            });
        });
    }
    function userAll(prov, id) {
        var databaseRef = firebase.database().ref('customer/').orderByChild('provinsi').equalTo(prov);

        databaseRef.once('value', function (snapshot) {
            var list = snapshot.numChildren();
            $("#" + id).html(list);
            $('body').loading('stop');
        });
    }
</script>
<div class="card-body">
    <h5 class="card-title m-b-0">Data Customer</h5>
</div>
<div class="table-responsive">    
    <table class="table table-bordered" id="tabelData">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Jumlah User Aktif</th>
                <th scope="col">Jumlah User Ter-Suspend</th>
                <th scope="col">Jumlah User Terdaftar</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $no = 1;
            $provinsi = $this->Etc->prov();
            foreach ($provinsi as $p) {
                ?>   
            <script>
                user(`<?php echo $p->name; ?>`, `<?php echo $p->id; ?>`, `0`);
                user(`<?php echo $p->name; ?>`, `<?php echo $p->id; ?>`, `1`);
                userAll(`<?php echo $p->name; ?>`, `<?php echo $p->id; ?>`);
            </script>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p->name; ?></td>
                <td><span id="0<?php echo $p->id; ?>"></span></td>
                <td><span id="1<?php echo $p->id; ?>"></span></td>
                <td><span id="<?php echo $p->id; ?>"></span></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
