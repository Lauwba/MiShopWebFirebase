<!DOCTYPE html>
<html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/admin/assets/images/favicon.png">
        <title><?php echo $title;?></title>
        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/admin/dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <style type="text/css">
            .gone{
                visibility: hidden;
            }
            .visib{
                visibility: visible;
            }
        </style>
    </head>

    <body>
        <div class="main-wrapper">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->

            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                <div class="auth-box bg-dark border-top border-secondary">
                    <div id="loginform">
                        <div class="text-center p-t-20 p-b-20">
                            <span class="db"><img src="<?php echo base_url() ?>assets/profil/logo.png" alt="logo" class="img img-fluid"/></span>
                        </div>
                        <div class="gone" id="logerror">
                            <div class="alert alert-danger" role="alert" >
                                <h4 class="alert-heading">Login Failed Succesfully!</h4>                            
                            </div>
                        </div>
                        <!-- Form -->
                        <form class="form-horizontal m-t-20" id="login-form" method="post">
                            <div class="row p-b-30">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" name="user" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                        </div>
                                        <input id="user-password" name="pass" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-cyan text-white btn" id="show-password"><i class="mdi mdi-eye" id="icon-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="p-t-20">
                                            <!--<button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>-->
                                            <button class="btn btn-success float-right" type="button" id="btnLogin" onclick="login()">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        <script src="<?php echo base_url() ?>assets/admin/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?php echo base_url() ?>assets/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ============================================================== -->
        <!-- This page plugin js -->
        <!-- ============================================================== -->
        <script>

                                                $('[data-toggle="tooltip"]').tooltip();
                                                $(".preloader").fadeOut();
                                                // ============================================================== 
                                                // Login and Recover Password 
                                                // ============================================================== 
                                                function login() {
                                                    $.ajax({
                                                        url: "<?php echo site_url(); ?>A_acc/login",
                                                        type: "POST",
                                                        data: $('#login-form').serialize(),
                                                        success: function (data)
                                                        {
                                                            if (data == 1)
                                                                window.location.assign("<?php echo site_url('A_dashboard'); ?>");
                                                            else
                                                                $('#logerror').addClass("visib");
                                                            $('#login-form')[0].reset();
                                                        },
                                                        error: function (jqXHR, textStatus, errorThrown)
                                                        {
                                                            alert('Error adding / update data');
                                                        }
                                                    });

                                                }
                                                $("#show-password").click(function () {
                                                    var type = $("#user-password").attr('type');
                                                    var eye = $("#icon-eye").attr('class');
                                                    if ((type == 'password')) {
                                                        $("#user-password").attr('type', 'text');
                                                    } else {
                                                        $("#user-password").attr('type', 'password');
                                                    }
                                                    if (eye == 'fa fa-eye-slash') {
                                                        $("#icon-eye").removeClass('fa fa-eye-slash');
                                                        $("#icon-eye").addClass('fa fa-eye');
                                                    } else {
                                                        $("#icon-eye").removeClass('fa fa-eye');
                                                        $("#icon-eye").addClass('fa fa-eye-slash');
                                                    }
                                                });
        </script>

    </body>

</html>