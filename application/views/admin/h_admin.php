<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/profil/logo.png">
        <title>Mishop</title>
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/extra-libs/multicheck/multicheck.css">
        <link href="<?php echo base_url(); ?>assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/dist/css/style.min.css" rel="stylesheet">

        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

        <script src="<?php echo base_url('assets/admin//ckeditor/ckeditor.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin/ckfinder/ckfinder.js') ?>"></script>
        
        <!--/*swal*/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mitra/css/loading.css">
        <?php $this->load->view('firebase_db'); ?>

    </head>

    <body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper">
            <header class="topbar" data-navbarbg="skin5">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header" data-logobg="skin5">
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        <a class="navbar-brand" href="index.html">
                            <!--<b class="logo-icon p-l-10">-->
                            <!--    <img src="<?php echo base_url(); ?>assets/admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" />-->

                            <!--</b>-->
                            <span class="logo-text">
                                <img src="<?php echo base_url(); ?>assets/profil/logo.png" alt="homepage" class="img img-fluid mt-2" />
                                <!--MISHOP ADMIN-->

                            </span>
                        </a>
<!--                        <a class="navbar-brand" href="index.html">
                            <span class="logo-text">
                                <img src="<?php echo base_url(); ?>assets/profil/admin4.png" alt="homepage" class="img img-fluid mt-2" />
                                MISHOP ADMIN

                            </span>
                        </a>-->
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                        <ul class="navbar-nav float-left mr-auto">
                            <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                            <!--<li class="nav-item dropdown">-->
                            <!--    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                            <!--        <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>-->
                            <!--        <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   -->
                            <!--    </a>-->
                            <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                            <!--        <a class="dropdown-item" href="#">Action</a>-->
                            <!--        <a class="dropdown-item" href="#">Another action</a>-->
                            <!--        <div class="dropdown-divider"></div>-->
                            <!--        <a class="dropdown-item" href="#">Something else here</a>-->
                            <!--    </div>-->
                            <!--</li>-->

                            <!--<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>-->
                            <!--    <form class="app-search position-absolute">-->
                            <!--        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>-->
                            <!--    </form>-->
                            <!--</li>-->
                        </ul>

                        <ul class="navbar-nav float-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">

                                    <a class="dropdown-item" href="<?php echo site_url("Logout") ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav" class="p-t-30">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('A_dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i></i><span class="hide-menu">Manajemen Data </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="<?php echo site_url('tarif'); ?>" class="sidebar-link"><i class="mdi mdi-blur-linear"></i><span class="hide-menu"> Tarif </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('customer'); ?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Customer </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('mitra'); ?>" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Mitra </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('kritik-saran'); ?>" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Kritik & Saran </span></a></li>
                                    <!--<li class="sidebar-item"><a href="<?php echo site_url('registrasi-mitra'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrasi Mitra </span></a></li>-->
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Dompet </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="<?php echo site_url('topup'); ?>" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Topup oleh Admin </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('topup-mitra'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Topup oleh Mitra </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('tarik-mitra'); ?>" class="sidebar-link"><i class="mdi mdi-border-inside"></i></i><span class="hide-menu"> Penarikan Mitra </span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('notifikasi'); ?>" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Notifikasi</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-message-outline"></i><span class="hide-menu">Kritik & Saran </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="<?php echo site_url('saran-customer'); ?>" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Customer </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url('saran-mitra'); ?>" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Mitra </span></a></li>
                                </ul>
                            </li>                         
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="<?php echo site_url('laporan-pendapatan'); ?>" class="sidebar-link"><i class="mdi mdi-eye"></i><span class="hide-menu"> Laporan Pedapatan </span></a></li>
                                    <!--<li class="sidebar-item"><a href="<?php echo site_url('laporan-mitra'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Laporan Mitra </span></a></li>-->
                                </ul>
                            </li>                         
<!--                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Dropdown </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="<?php echo site_url(''); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> List 1 </span></a></li>
                                    <li class="sidebar-item"><a href="<?php echo site_url(''); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> List 2 </span></a></li>
                                </ul>
                            </li>                            
                            <li class="sidebar-item"> 
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-face"></i>
                                    <span class="hide-menu">Order </span>
                                    <span class="badge badge-danger ml-2 badgeNotif">
                                        2
                                        <div class="load_content" ></div>
                                    </span>
                                </a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item">
                                        <a href="<?php echo site_url(''); ?>" class="sidebar-link">
                                            <i class="mdi mdi-emoticon"></i>
                                            <span class="hide-menu"> Order Masuk</span>
                                            <span class="badge badge-danger ml-2 badgeNotif"> 2
                                                <div class="load_content" ></div>
                                            </span>
                                        </a>
                                    </li>                                    
                                </ul>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url(''); ?>" aria-expanded="false">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span class="hide-menu">Komplain</span>
                                    <span class="badge badge-danger ml-2 badgeKomplain">2
                                        <div class="load_komplain" ></div>
                                    </span>
                                </a>
                            </li>-->
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">