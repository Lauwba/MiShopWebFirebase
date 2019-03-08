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

        <!--/swal/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>
        <?php $this->load->view('firebase_db'); ?>

    </head>
    <body>
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>Form Registrasi Mitra</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <form id="form_registrasi_mitra">
                        <div class="form-group">
                            <p>Nama Lengkap</p>                           
                            <input class="text" type="hidden" name="tgl_daftar" value="<?php echo $this->Id_m->id_mitra(); ?>">
                            <input class="text" placeholder="Nama Lengkap sesuai KTP" name="nama_mitra" type="text" tabindex="1" required="">
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" placeholder="Masukkan Email yang Valid" name="mail_mitra" tabindex="2" class="text" required>
                        </div>
                        <div class="form-group">
                            <p>Alamat</p>
                            <input type="text" class="text" placeholder="Alamat sesuai KTP" name="alamat_mitra" tabindex="3" required>
                        </div>
                        <div class="form-group">
                            <p>Nomor Telepon</p>
                            <input type="text" class="text" placeholder="Nomor telepon yang aktif dan bisa dihubungi" name="phone_mitra" tabindex="3" required>
                        </div>
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="text" class="text" placeholder="Nomor ID pada KTP" name="nik_mitra" tabindex="4" required>
                        </div>
                        <div class="form-group">
                            <p>Tanggal Lahir Sesuai KTP</p>                            
                            <input class="text" name="tgl_lahir" type="date" required tabindex="4">
                        </div>
                        <div class="form-group">
                            <p>Foto Scan KTP</p>                            
                            <input type="file" name="ktp" id="ktp" class="text" required="">
                        </div>
                        <div class="form-group">
                            <p>Foto Diri</p>                            
                            <input type="file" name="diri" id="diri" class="text" required="">
                        </div><!--
                        <div class="form-group">
                            <p>Foto Stiker Mishop Di Kendaraan</p>                            
                            <input type="file" name="stiker" class="text">
                        </div>-->                        
                        <div class="form-group">
                            <p>Password</p>                            
                            <input placeholder="Masukkan password" name="pass_mitra" type="password" required class="text">
                        </div>
                        <div class="form-group">
                            <p>Konfirmasi Password</p>                            
                            <input placeholder="Masukkan ulang password" name="repass_mitra" type="password" required class="text">
                        </div>


                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>Saya setuju dengan syarat dan ketentuan yang berlaku</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="PROSES REGISTRASI">
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
        var email = $('[name="mail_mitra"]').val();

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

            firebase.auth().createUserWithEmailAndPassword(email, pass).catch(function (error) {
                var errorCode = error.code;
                var errorMessage = error.message;
                console.log(errorCode + ":" + errorMessage);
            });
            var a = new Date();
            startOfDay = a.setHours(0, 0, 0, 0);

            var b = new Date();
            endOfDay = b.setHours(23, 59, 59, 999);

            firebase.database()
                    .ref('/mitra')
                    .orderByChild('tgl_daftar')
                    .startAt(startOfDay)
                    .endAt(endOfDay)
                    .once('value')
                    .then(snapshot => {
                        var row;
                        var id = $('[name="tgl_daftar"]').val();
                        var list = snapshot.numChildren();
                        if (list == 0) {
                            row = 1;
                        } else {
                            row = list + 1;
                        }
                        var str = "" + row;
                        var pad = "0000";
                        var ans = pad.substring(0, pad.length - str.length) + str;

                        var kode = id + ans;
                        console.log(kode);
//                        register(kode);
                        const ref = firebase.storage().ref();
                        const tgl = (+new Date());

                        const file = document.querySelector('#diri').files[0];
                        const name = "images_mitra/" + tgl + "/" + kode + "_" + "diri";
                        const files = document.querySelector('#ktp').files[0];
                        const names = "images_mitra/" + tgl + "/" + kode + "_" + "ktp";

                        const metadata = {
                            contentType: file.type
                        };
                        const task = ref.child(name).put(file, metadata);

                        task.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                            var a = url;

                            const tasks = ref.child(names).put(files, metadata);
                            tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                                console.log('url1-->' + a);
                                console.log('url2-->' + url);
                                register(kode, a, url, tgl);
                            }).catch(console.error);

                        }).catch(console.error);


                    });
        }
    });
    function register(id, foto, ktp, tgl_daftar) {
//        var d = new Date();
//        var tgl_daftar = d.setHours(d.getHours());

        var email = $('[name="mail_mitra"]').val();
        var alamat = $('[name="alamat_mitra"]').val();
        var notelp = $('[name="phone_mitra"]').val();
        var tgl_lahir = $('[name="tgl_lahir"]').val();
        var nik = $('[name="nik_mitra"]').val();

        var data = {
            id_mitra: id,
            tgl_daftar: tgl_daftar,
            email_mitra: email,
            alamat_mitra: alamat,
            no_tel: notelp,
            tgl_lahir: tgl_lahir,
            nik_mitra: nik,
            statusAktif: 0,
            saldo: 0,
            regid: "",
            foto: foto,
            ktp: ktp,
            masaSuspend: 0
        };

        var updates = {};
        updates['/mitra/' + id] = data;
        firebase.database().ref().update(updates);

        $('body').loading('stop');
        swal({
            position: 'top-end',
            type: 'success',
            title: 'Registrasi Berhasil!',
            showConfirmButton: false,
            timer: 1500
        });
        location.reload();
    }
</script>
</body>
</html>