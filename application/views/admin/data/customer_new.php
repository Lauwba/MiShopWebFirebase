<div class="card-body">
    <h5 class="card-title m-b-0">Data Customer</h5>
</div>
<div class="table-responsive">    
    <table class="table" id="tabelData">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>                
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>                            
        </tbody>
    </table>
</div>
<div class="col-md-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="demo">
            <!--<span id="demo"></span>-->
            <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
        </ul>
    </nav>
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
                    <input type="hidden" name="id_customer">
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
                <button type="button" class="btn btn-success save-event waves-effect waves-light" onclick="suspendCustomer()">Proses Suspend</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
    var tbl = document.getElementById('tabelData');
//    var databaseRef = firebase.database().ref('customer/').orderByChild('statusAktif').equalTo(0);
    var dbRef;
    var dbRefPage = firebase.database().ref('customer/');
    var key;

//    dbRefPage.once('value', function (snapshot) {
//
//        var rowData = snapshot.numChildren();
//        var jmlPage = parseInt(rowData) / 3;
//        var text = "";
//        for (i = 0; i < jmlPage; i++) {
//            var page = parseInt(i) + 1;
//            text += '<li class="page-item"><a class="page-link" href="#" onclick="goToPage(`' + key + '`)">' + page + '</a></li>';
//        }
//        document.getElementById("demo").innerHTML = text;
//    })

    $(document).ready(function () {
//        dbRef = firebase.database().ref('customer/').limitToFirst(4);
        dbRef = firebase.database().ref('customer/');
        loadData(dbRef);
    });

    function goToPage(key) {
        dbRef = firebase.database().ref('customer/').orderByKey().limitToFirst(4).startAt(key);
        loadData(dbRef);
    }

    function loadData(databaseRef) {
        var rowIndex = 1;
        databaseRef.once('value', function (snapshot) {
            snapshot.forEach(function (childSnapshot) {
                var uid = childSnapshot.val().uid;
                var childKey = childSnapshot.key;
                var childData = childSnapshot.val();
//                if (rowIndex <= 3) {
//                    if (jQuery.isEmptyObject(childData.fotoCustomer)) {
//                        var foto = "<?php echo base_url('assets/profil/people.png'); ?>";
//                    } else {
                var foto = childData.fotoCustomer;
//                    }

                if (childData.statusAktif === 1) {
                    var status = "Suspend";
                } else {
                    var status = "Aktif";
                }

                var row = tbl.insertRow(rowIndex);
                var cellNo = row.insertCell(0);
                var cellFoto = row.insertCell(1);
                var cellEmail = row.insertCell(2);
                var cellNama = row.insertCell(3);
                var cellAlamat = row.insertCell(4);
                var cellStatus = row.insertCell(5);
                cellNo.appendChild(document.createTextNode(rowIndex));
                cellFoto.innerHTML = "<img src='" + foto + "' style='width:100px' alt='#' onerror='imgError(this)'>";
                ">";
                cellEmail.appendChild(document.createTextNode(childData.email));
                cellNama.appendChild(document.createTextNode(childData.nama));
                cellAlamat.appendChild(document.createTextNode(childData.alamat));
                cellStatus.appendChild(document.createTextNode(status));
//                } else if (rowIndex === 4) {
//                    key = childKey;
//                    console.log(key);
//                }
                rowIndex = rowIndex + 1;


            });
            $('body').loading('stop');
        });
    }
</script>