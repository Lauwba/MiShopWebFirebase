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
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-success" onclick="loadCust('cust_all')">Customer</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-cyan" onclick="setActiveButton('cust_report')">Laporan</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-warning" id="ts-error">Transaksi</button>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="button" class="btn btn-lg btn-block btn-outline-danger" id="ts-cyan" onclick="setActiveButton('cust_suspend')">Suspended</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="row">
            <div class="col-12" id="loadData">

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $(document).ready(function () {
        var id = '<?php echo $this->session->userdata('penanda'); ?>';
        if (id === "") {
            loadCust('cust_all');
        } else {
            loadCust(id);
        }
//        console.log(id);

    });
    function setActiveButton(penanda) {
        $.ajax({
            url: "<?php echo site_url('A_data/set_active_button'); ?>",
            method: "POST",
            data: {penanda: penanda},
            success: function (data) {
                loadCust(penanda);
            }
        });
    }

    function loadCust(id) {
        $('body').loading({
            stoppable: false
        });
        var url = "<?php echo base_url('A_data'); ?>/" + id;
        $("#loadData").load(url);
    }
</script>