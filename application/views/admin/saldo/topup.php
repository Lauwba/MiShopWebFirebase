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
                    <div class="row mb-3 align-items-center">                        
                        <div class="col-lg-8 col-md-12">
                            <form id="form_search" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Kode Mitra...." name="id_mitra" required="">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text" id="basic-addon2"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formTopup"></div>
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $('#form_search').submit(function (e) {
        e.preventDefault();
        var id_mitra = $('[name="id_mitra"]').val();
        var url = "<?php echo site_url('Saldo/form_topup/'); ?>" + id_mitra;
        $("#formTopup").load(url);
    });
</script>