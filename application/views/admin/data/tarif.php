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
                    <!--<p><button type="button" class="btn btn-info btn-lg" onclick="add_tarif()">Tambah</button></p>-->

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Tarif</th>
                                    <th>Tarif</th>
                                    <th>Keterangan</th>
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
    $('body').loading({
        stoppable: false
    });
//    var tblTarif = document.getElementById('zero_config');
    var t = $("#zero_config").DataTable();
    var databaseRef = firebase.database().ref('tarif/');
    var rowIndex = 1;
    var save_method = "add";

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();
            
            var tgl = new Date(childData.poston);
            t.row.add([
                rowIndex,
                childData.tipe,
                childData.tarif,
                childData.ket,
                "<button type='button' class='btn btn-danger' onclick='delete_user(`" + childKey + "`);'>Delete</button>" +
                "<button type='button' class='btn btn-primary' onclick='edit(`" + childKey + "`);'>Edit</button>"
            ]).draw(false);

//            var row = tblTarif.insertRow(rowIndex);
//            var cellId = row.insertCell(0);
//            var cellTipe = row.insertCell(1);
//            var cellTarif = row.insertCell(2);
//            var cellKet = row.insertCell(3);
//            var cellAction = row.insertCell(4);
//            cellId.appendChild(document.createTextNode(rowIndex));
//            cellTipe.appendChild(document.createTextNode(childData.tipe));
//            cellTarif.appendChild(document.createTextNode(childData.tarif));
//            cellKet.appendChild(document.createTextNode(childData.ket));
//            cellAction.innerHTML = "<button type='button' class='btn btn-danger' onclick='delete_user(`" + childKey + "`);'>Delete</button>" +
//                    "<button type='button' class='btn btn-primary' onclick='edit(`" + childKey + "`);'>Edit</button>";
            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });


    function add_tarif()
    {
        save_method = 'add';
        $('#form_tarif')[0].reset(); // reset form on modals
        $('#modal_tarif').modal('show'); // show bootstrap modal
    }
    function del(id)
    {
        firebase.database().ref().child('/tarif/' + id).remove();
        alert('The user is deleted successfully!');
        reload_page();
    }
    function edit(id)
    {
        save_method = 'update';
        $('#form_tarif')[0].reset();

        return firebase.database().ref('/tarif/' + id).once('value').then(function (snapshot) {

            var key = (snapshot.val() && snapshot.val().id);
            var tarif = (snapshot.val() && snapshot.val().tarif);
            var tipe = (snapshot.val() && snapshot.val().tipe);
            var ket = (snapshot.val() && snapshot.val().ket);

            $('[name="id_tarif"]').val(key);
            $('[name="tipe_tarif"]').val(tipe);
            $('[name="tarif"]').val(tarif);
            $('[name="ket"]').val(ket);
            $('#modal_tarif').modal('show');

        });
    }
    function reload_page() {
        window.location.reload();
    }
</script>
<?php $this->load->view('admin/data/tarif_modal'); ?>