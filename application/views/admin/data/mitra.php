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
                    <h5 class="card-title">Data Mitra</h5>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-success" onclick="setActiveButton('registrasi_mitra')">Registrasi</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-cyan" onclick="setActiveButton('mitra_rate')">Laporan</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-warning" id="ts-warning">Pendapatan</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-danger" id="ts-error">Transaksi</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-info" id="ts-cyan">Suspended</button>
                        </div>
<!--                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-dark" id="ts-cyan">Cari</button>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <!--<div class="card-body">-->
            <div class="row">
                <div class="col-12" id="loadData">

                </div>
            </div>
        <!--</div>-->
    </div>
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $(document).ready(function () {
        var id = '<?php echo $this->session->userdata('penanda_mitra'); ?>';
        if (id === "") {
            loadMitra('cust_all');
        } else {
            loadMitra(id);
        }
//        console.log(id);

    });
    function setActiveButton(penanda) {
        $.ajax({
            url: "<?php echo site_url('A_data/set_active_mitra'); ?>",
            method: "POST",
            data: {penanda: penanda},
            success: function (data) {
                loadMitra(penanda);
            }
        });
    }
    
    function loadMitra(id) {
        $('body').loading({
            stoppable: false
        });
        var url = "<?php echo base_url('A_data'); ?>/" + id;
        $("#loadData").load(url);
    }
</script>