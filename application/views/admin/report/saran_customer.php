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
                                    <th>Tgl</th>
                                    <th>Email Customer</th>
                                    <th>Kritik/Saran</th>
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

    var t = $("#zero_config").DataTable();
    // var tblTarif = document.getElementById('zero_config');
    var databaseRef = firebase.database().ref('kritik/').orderByChild('type').equalTo(2);
    // var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();
            var tgl = new Date(childData.poston);
            t.row.add([
                tgl,
                childData.email_customer,
                childData.komentar
            ]).draw(false);

            // var row = tblTarif.insertRow(rowIndex);
            // var cellTgl = row.insertCell(0);
            // var cellEmail = row.insertCell(1);
            // var cellKritik = row.insertCell(2);

            // var tgl = new Date(childData.poston);

            // cellTgl.appendChild(document.createTextNode(tgl));
            // cellEmail.appendChild(document.createTextNode(childData.email_customer));
            // cellKritik.appendChild(document.createTextNode(childData.komentar));
            // rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });
</script>