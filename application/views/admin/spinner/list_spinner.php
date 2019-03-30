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
                        
                        <!--content here-->
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Transaksi Selesai</th>
                                    <th>Aplikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                $data = $this->Crud_m->select('spinner');
                                foreach ($data as $d) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d->jml_transaksi; ?></td>
                                        <td><?php if($d->tipe == 0){ echo "Mi-Bike dan Mi-Express"; } else { echo "Mi-Car"; } ?></td>
                                        <td>
                                            <a href="<?php echo site_url("Spinner/detail/$d->id_spinner");?>" class="btn btn-primary btn-md">
                                                    Detail <i class="m-r-10 mdi mdi-arrow-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/f_admin'); ?>