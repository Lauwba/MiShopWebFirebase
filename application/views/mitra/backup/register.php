<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="<?php echo base_url() ?>/assets/mitra/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->
        <!-- web font -->
        <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
        <!-- //web font -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

        <!-- loading: http://carlosbonetti.github.io/jquery-loading/ -->
        <link rel="stylesheet" href="<?php echo MITRA; ?>css/loading.css">

        <!--/*swal*/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>

        <link href="<?php echo base_url() ?>assets/mitra/css/form_wizard.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>assets/mitra/js/form_wizard.js"></script>

    </head>
    <body>
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>Form Registrasi Mitra</h1>    
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Step 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Step 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Step 3</p>
                            </div>
                        </div>
                    </div>
                    <form id="form_registrasi_mitra" role="form">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <h3> Step 1</h3>
                                    <div class="form-group">
                                        <p>Username</p>
                                        <input class="text" placeholder="What is your full name?" name="nama_mitra" type="text" tabindex="1" required required="">
                                    </div>
                                    <div class="form-group">
                                        <p>Email</p>
                                        <input type="text" placeholder="What is your e-mail address?" name="mail_mitra" tabindex="2" class="text" required>
                                    </div>
                                    <div class="form-group">
                                        <p>Alamat</p>
                                        <input type="text" class="text" placeholder="Where do you live?" name="alamat_mitra" tabindex="3" required>
                                    </div>
                                    <div class="form-group">
                                        <p>Nomor Telepon</p>
                                        <input type="text" class="text" placeholder="What is the best # to reach you?" name="phone_mitra" tabindex="3" required>
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="text" class="text" placeholder="What is your ID number?" name="nik_mitra" tabindex="4" required>
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir</p>                            
                            <input class="text" name="tgl_lahir" type="date" required tabindex="4">
                        </div>
                        <div class="form-group">
                            <p>Foto Scan KTP</p>                            
                            <input type="file" name="ktp" class="text" required="">
                        </div>
                        <div class="form-group">
                            <p>Foto Diri</p>                            
                            <input type="file" name="diri" class="text" required="">
                        </div>
                        <div class="form-group">
                            <p>Foto Stiker Mishop Di Kendaraan</p>                            
                            <input type="file" name="stiker" class="text">
                        </div>
                        <div class="form-group">
                            <p>Password</p>                            
                            <input placeholder="Type Password Here...." name="pass_mitra" type="password" required class="text">
                        </div>
                        <div class="form-group">
                            <p>Konfirmasi Password</p>                            
                            <input placeholder="Re-type password here...." name="repass_mitra" type="password" required class="text">
                        </div>
                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>I Agree To The Terms & Conditions</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="REGISTER">
                        <!--</section>-->
                        </div>
                    </form>
                </div>
            </div>
            <!-- copyright -->
            <!--<div class="colorlibcopy-agile">-->
            <!--    <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>-->
            <!--</div>-->
            <!-- //copyright -->
            <ul class="colorlib-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- //main -->
    </body>
</html>
<script src="<?php echo MITRA; ?>js/loading.js"></script>
<script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function (html) {
        var switchery = new Switchery(html);
    });

    $("#form_registrasi_mitra").submit(function (e) {
        e.preventDefault();

        var pass = $('[name="pass_mitra"]').val();
        var repass = $('[name="repass_mitra"]').val();
        if (pass !== repass) {
            Swal({
                type: 'error',
                title: 'Oops...',
                text: 'Incorrect Retype Password!',
            });
        } else {
            $('body').loading({
                stoppable: false
            });
            var data = new FormData($('#form_registrasi_mitra')[0]);
            $.ajax({
                url: "<?php echo site_url(); ?>/M_acc/registrasi",
                type: "POST",
                data: data,
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                success: function (data)
                {
                    $('body').loading('stop');
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Registrasi Berhasil!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();
                },
                error: function (data)
                {
                    alert('Gagal registrasi, silahkan cek koneksi');
                    $('body').loading('stop');
                    alert(data.status);
                    return false;
                }
            });
        }
    });
</script>
</body>
</html>