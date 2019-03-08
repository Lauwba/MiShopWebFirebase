<div class="card-body">
    <h5 class="card-title m-b-0">Data Laporan Mitra</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tblMitra">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jumlah Laporan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<div class="modal fade none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Batas Akhir Suspend</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formTglSuspend">
                    <input type="hidden" name="id_mitra">
<!--                    <label>Tanggal <small>(bulan/tanggal/tahun)</small></label>
                    <div class="input-group">
                        <input type="datetime-local" class="form-control mydatepicker" placeholder="mm/dd/yyyy" name="tanggal">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>-->
                    <label>Batas Waktu</label>
                    <div class="input-group">
                        <input type="text" class="form-control mydatepicker" placeholder="YYYY/mm/dd hh:ii"  name="tanggal">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-success save-event waves-effect waves-light" onclick="suspendMitra()">Proses Suspend</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/f_admin_add'); ?>
<script>
    var tblTarif = document.getElementById('tblMitra');
    var databaseRef = firebase.database().ref('mitra/').orderByChild('statusAktif').equalTo(1);
    var rowIndex = 1;

    databaseRef.once('value', function (snapshot) {
        snapshot.forEach(function (childSnapshot) {
            var uid = childSnapshot.val().uid;

            var childKey = childSnapshot.key;
            var childData = childSnapshot.val();

            var row = tblTarif.insertRow(rowIndex);
            var cellNo = row.insertCell(0);
            var cellFoto = row.insertCell(1);
            var cellEmail = row.insertCell(2);
            var cellNama = row.insertCell(3);
            var cellAlamat = row.insertCell(4);
            var cellRate = row.insertCell(5);
            var cellAction = row.insertCell(6);
            cellNo.appendChild(document.createTextNode(rowIndex));
            cellFoto.innerHTML = "<img src='" + childData.foto + "' style='width:100px'>";
            cellEmail.appendChild(document.createTextNode(childData.email_mitra));
            cellNama.appendChild(document.createTextNode(childData.nama_mitra));
            cellAlamat.appendChild(document.createTextNode(childData.alamat_mitra));
//            cellRate.appendChild(document.createTextNode(""));
            cellAction.innerHTML = "<button type='button' class='btn btn-primary' onclick='modalSuspend(`" + childKey + "`);'>Suspend</button>";

            var refCustomer = firebase.database().ref('report/').orderByChild('uidTerlapor').equalTo(uid);
            refCustomer.once('value', function (snapshot) {
                var list = snapshot.numChildren();
                console.log(list);
                cellRate.appendChild(document.createTextNode(list));
            });

            rowIndex = rowIndex + 1;
        });
        $('body').loading('stop');
    });
    function suspendMitra(id) {
        $('body').loading({
            stoppable: false
        });
        var tanggal = $('[name="tanggal"]').val();
        let tgl = new Date(tanggal).getTime();
        var id = $('[name="id_mitra"]').val();
        firebase.database().ref("/mitra/" + id).once("value", function (snapshot) {
            snapshot.ref.child("statusAktif").set(2);
            snapshot.ref.child("masaSuspend").set(tgl);
            $('body').loading('stop');
            location.reload();
        });
    }
    function modalSuspend(id) {
        $("#formTglSuspend")[0].reset();
        $("#my-event").modal('show');
        $('[name="id_mitra"]').val(id);
    }
</script>