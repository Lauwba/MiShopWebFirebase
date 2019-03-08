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
        <div class="col-9">
            <div class="card">
                <div class="card-body">

                    <!--content here-->
                    <form class="form-horizontal" id="formInbox">
                        <div class="form-group row">
                            <label class="col-md-3 m-t-15">Kepada</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" style="width: 100%; height:36px;" name="sendto">
                                    <option>Select</option>
                                    <option value="1">Mitra</option>
                                    <option value="2">Customer</option>
                                    <option value="3">Semua</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 m-t-15">Tipe</label>
                            <div class="col-md-9">
                                <select class="form-control custom-select" style="width: 100%; height:36px;" name="tipe">
                                    <option>Select</option>
                                    <option value="2">Bike</option>
                                    <option value="1">Car</option>
                                    <option value="0">Shop</option>
                                    <option value="4">Service</option>
                                    <option value="3">Express</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-left control-label col-form-label">Pesan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="pesan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">Foto</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $('#formInbox').submit(function (e) {
        e.preventDefault();

        var files = $('[name="foto"]').val();

        if (files !== "") {
            const ref = firebase.storage().ref();
            const tgl = (+new Date());

            const file = document.querySelector('#validatedCustomFile').files[0];
            const name = "images_inbox/" + tgl;
            const metadata = {
                contentType: file.type
            };
            const task = ref.child(name).put(file, metadata);

            task.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                post(url);
            }).catch(console.error);
        } else {
            var foto = ""
            post(foto);
        }


    });

    function post(foto) {
        var d = new Date();
        var id = d.setHours(d.getHours());

        var to = $('[name="sendto"]').val();
        var type = parseInt($('[name="tipe"]').val());
        var message = $('[name="pesan"]').val();

        var data = {
            broadcaston: id,
            foto: foto,
            id: id.toString(),
            message: message,
            to: to,
            type: type
        };

        var updates = {};
        updates['/inbox/' + id] = data;
        firebase.database().ref().update(updates);
        swal({
            position: 'top-middle',
            type: 'success',
            title: 'Pengiriman Notifikasi Berhasil!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OKE !'}).then((result) => {
            if (result.value) {
                location.reload();
            }
        });

    }
</script>