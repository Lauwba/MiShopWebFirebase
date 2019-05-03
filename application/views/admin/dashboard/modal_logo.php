<div class="modal fade bd-example-modal-lg" id="modal_logo" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
            </div>
            <form method="post" id="form_logo">
                <div class="modal-body form">
                    <!--content here-->
                    <div class="form-group">
                        <label>File Upload</label>
                        <div class="custom-file">
                            <input name="logo" type="file" class="custom-file-input" id="validatedCustomFile" required="">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
//    function save_logo()
//    {
    $('#form_logo').submit(function (e) {
        e.preventDefault();
        var url;
        var data = new FormData($('#form_logo')[0]);
        url = "<?php echo site_url('A_dashboard/update_logo') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
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
                $('#modal_logo').modal('hide');
                location.reload(); // for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Error Adding Data...");
            }

        });
    });
</script>
