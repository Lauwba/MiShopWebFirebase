<?php $this->load->view('admin/h_admin'); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Homepage</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="fa fa-user m-b-5"></i></h1>
                    <h6 class="text-white"><span id="mitra"></span></h6>
                    <small class="text-white">User Mitra</small>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fa fa-user m-b-5"></i></h1>
                    <h6 class="text-white"><span id="customer"></span></h6>
                    <small class="text-white">User Customer</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--content here-->
                    <div class="col-md-6 col-lg-2 col-xlg-3 btn" onclick="add_logo()">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">Ubah Logo</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="fa fa-plus m-b-5 font-16"></i>
                                <h5 class="m-b-0 m-t-5">2540</h5>
                                <small class="font-light">Pendapatan Hari ini</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="fa fa-plus m-b-5 font-16"></i>
                                <h5 class="m-b-0 m-t-5">120</h5>
                                <small class="font-light">Pendapatan/30 hari</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="fa fa-plus m-b-5 font-16"></i>
                                <h5 class="m-b-0 m-t-5">656</h5>
                                <small class="font-light">Pendapatan/1 Tahun</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    
</div>
<?php $this->load->view('admin/f_admin'); ?>
<?php $this->load->view('admin/dashboard/modal_logo'); ?>
<script type="text/javascript">

    user("mitra");
    user("customer");

    function add_logo()
    {
        $('#modal_logo').modal('show'); // show bootstrap modal
    }

    function user(tabel) {
        firebase.database().ref('/mitra').orderByChild('tgl_daftar').once('value').then(snapshot => {
            var row = snapshot.numChildren();
            $('#' + tabel).html(row);
        });
    }
</script>