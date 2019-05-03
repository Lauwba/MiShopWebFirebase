<div class="modal fade bd-example-modal-lg" id="modal_tarif" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
            </div>
            <form method="post" id="form_tarif">
                <div class="modal-body form">

                    <!--content here-->
                    <input type="text" name="id_tarif" value="" >
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" placeholder="Tipe Tarif" name="tipe_tarif" readonly="" required="">
                    </div>
                    <div class="form-group">
                        <label>Tarif/km</label>
                        <input type="text" class="form-control" placeholder="Nominal Tarif" name="tarif" required="">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" placeholder="Nominal Tarif" name="ket" required=""></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--<button type="button" id="btnSave" onclick="save_tarif()" class="btn btn-primary">Save</button>-->
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
//    function save() {
    $('#form_tarif').submit(function (e) {
        e.preventDefault();
        var tipe = $('[name="tipe_tarif"]').val();
        var tarif = $('[name="tarif"]').val();
        var ket = $('[name="ket"]').val();
        var id;
        if (save_method === "update") {
            id = $('[name="id_tarif"]').val();
        } else {
            id = firebase.database().ref().child('tarif').push().key;
        }

        var data = {
            id: id,
            tipe: tipe,
            tarif: tarif,
            ket: ket
        };
        var updates = {};
        updates['/tarif/' + id] = data;
        firebase.database().ref().update(updates);
//        alert("Hai");
        reload_page();
    });

</script>
