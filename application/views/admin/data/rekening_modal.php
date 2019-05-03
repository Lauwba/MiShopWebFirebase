<div class="modal fade bd-example-modal-lg" id="modal_tarif" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
            </div>
            <form method="post" id="form_rek">
                <div class="modal-body form">
                    <!--content here-->
                    <input type="hidden" name="id_profile">
                    <div class="form-group">
                        <label>Atas Nama</label>
                        <input type="text" class="form-control" placeholder="Atas Nama Rekening" name="atas_nama">
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="text" class="form-control" placeholder="Nomor Rekening" name="no_rek">
                    </div>
                    <div class="form-group">
                        <label>Bank</label>
                        <input type="text" class="form-control" placeholder="Nama Bank" name="bank">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save_tarif()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
//    function save_tarif()
//    {
    $('#form_rek').submit(function (e) {
        e.preventDefault();
        var url;
        if (save_method == 'add')
        {
            url = "<?php echo site_url('A_data/insert_rekening') ?>";
        } else {
            url = "<?php echo site_url('A_data/update_rekening') ?>";
        }
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form_tarif').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                //if success close modal and reload ajax table
                Swal({
                    position: 'middle-end',
                    type: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#modal_tarif').modal('hide');
                location.reload(); // for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }

        });
    });
</script>
