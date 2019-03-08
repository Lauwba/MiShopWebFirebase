<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html">
        <title><?php echo $title; ?></title>
        <meta name="author" content="Jake Rocheleau">
                
        <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo MITRA; ?>css/styles.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo MITRA; ?>css/switchery.min.css">
        <script type="text/javascript" src="<?php echo MITRA; ?>js/switchery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- loading: http://carlosbonetti.github.io/jquery-loading/ -->
        <link rel="stylesheet" href="<?php echo MITRA; ?>css/loading.css">

        <!--/*swal*/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>
    </head>

    <body>
        <div id="wrapper">

            <h1>Form Registrasi Mitra</h1>

            <form id="form_registrasi_mitra" action="" method="POST">
                <div class="col-2">
                    <label>
                        Nama
                        <input placeholder="What is your full name?" name="nama_mitra" type="text" tabindex="1" required>
                    </label>
                </div>
                <div class="col-2">
                    <label>
                        Email
                        <input placeholder="What is your e-mail address?" name="mail_mitra" tabindex="2" required>
                    </label>
                </div>

                <div class="col-3">
                    <label>
                        Alamat
                        <input placeholder="Where do you live?" name="alamat_mitra" tabindex="3" required>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Nomor Telepon
                        <input placeholder="What is the best # to reach you?" name="phone_mitra" tabindex="3" required>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        NIK
                        <input placeholder="What is your ID number?" name="nik_mitra" tabindex="4" required>
                    </label>
                </div>
                <div class="col-4">
                    <label>
                        Tgl Lahir
                        <input name="tgl_lahir" type="date" required tabindex="4">
                    </label>
                </div>        
                <div class="col-4">
                    <label>
                        Foto Scan KTP
                        <input type="file" name="ktp" required="">
                    </label>
                </div>
                <div class="col-4">
                    <label>
                        Foto Diri
                        <input type="file" name="diri" required="">
                    </label>
                </div>
                <div class="col-4">
                    <label>
                        Foto Stiker Mishop Di Kendaraan
                        <input type="file" name="stiker">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Password
                        <input placeholder="Type Password Here...." name="pass_mitra" type="password" required>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Konfirmasi Password
                        <input placeholder="Re-type password here...." name="repass_mitra" type="password" required>
                    </label>
                </div>
<!--                <div class="col-3">
                    <label>
                        Availability
                        <select tabindex="5">
                            <option>5-15 hrs per week</option>
                            <option>15-30 hrs per week</option>
                            <option>30-40 hrs per week</option>
                        </select>
                    </label>
                </div>      

                <div class="col-4">
                    <label>Contact References?</label>
                    <center style="position:relative; margin-bottom:8px;"><input type="checkbox" class="js-switch"></center>
                </div>
                <div class="col-4 switch">
                    <label>E-mail Updates?</label>
                    <center style="position:relative;margin-bottom:8px;"><input type="checkbox" class="js-switch"></center>
                </div>
                <div class="col-4">
                    <label>
                        Skills
                        <input type="file" placeholder="List a few of your primary skills" id="skills" name="skills" tabindex="6">
                    </label>
                </div>-->

                <div class="col-submit">
                    <button class="submitbtn" type="submit">Submit Form</button>
                </div>

            </form>
        </div>
        <!--loading-->
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