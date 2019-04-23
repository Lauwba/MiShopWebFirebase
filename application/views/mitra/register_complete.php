<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <link rel="icon" type="image/png"  href="<?php echo base_url(); ?>assets/profil/logo.png">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Font-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/mitra/complete/css/opensans-font.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/mitra/complete/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <!-- Main Style Css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/mitra/complete/css/style.css"/>

        <!-- loading: http://carlosbonetti.github.io/jquery-loading/ -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/mitra/css/loading.css">        

        <!--/swal/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>
        <?php $this->load->view('firebase_db'); ?>

        <link href="<?php echo base_url() ?>assets/mitra/complete/css/jquery.steps.css" rel="stylesheet">
    </head>
    <body>
        <div class="page-content">
            <div class="form-v1-content">
                <div class="wizard-form">
                    <form class="form-register" action="#" method="post">
                        <input class="text" type="hidden" name="tgl_daftar" value="<?php echo $this->Id_m->id_mitra(); ?>">
                        <div id="form-total">
                            <!-- SECTION 1 -->
                            <h2>
                                <p class="step-icon"><span>01</span></p>
                                <span class="step-text">Biodata Mitra</span>
                            </h2>
                            <section>
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">Data Personal</h3>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Nama Lengkap</legend>
                                                <input type="text" class="form-control" name="nama_mitra" placeholder="Sesuai KTP" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Email</legend>
                                                <input type="text" name="mail_mitra" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Nomor Telepon</legend>
                                                <input type="text" class="form-control" name="phone_mitra" placeholder="+62 888-999-7777" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Tanggal Lahir <small>sesuai KTP</small>:</legend>
                                                <input type="date" class="form-control" name="tgl_lahir" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <label class="special-label">Alamat:</label>
                                            <select name="provinsi" id="provinsi" required="">
                                                <option value="" disabled selected>Provinsi</option>
                                                <?php
                                                $provinsi = $this->Etc->prov();
                                                foreach ($provinsi as $p) {
                                                    ?>
                                                    <option value="<?php echo $p->id; ?>" data-nama="<?php echo $p->name; ?>"><?php echo $p->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="hidden" name="nama_provinsi">
                                        </div>
                                        <div class="form-holder">
                                            <label class="special-label">&nbsp</label>
                                            <select name="kabupaten" id="kabupaten" required="">
                                                <option value="" disabled selected>Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <textarea class="form-control input-border" name="alamat_mitra" placeholder="Alamat Lengkap" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="text" class="form-control input-border" name="nik_mitra" placeholder="NIK" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Foto Scan KTP</legend>
                                                <input type="file" class="form-control" name="ktp" id="ktp" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Foto Diri</legend>
                                                <input type="file" class="form-control" name="diri" id="diri" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="password" class="form-control input-border" name="pass_mitra" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="password" class="form-control input-border" name="repass_mitra" placeholder="Konfirmasi Password" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- SECTION 2 -->
                            <h2>
                                <p class="step-icon"><span>02</span></p>
                                <span class="step-text">Video</span>
                            </h2>
                            <section>
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">MISHOP VIDEO</h3>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/Rc2dG7uMlhA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- SECTION 3 -->
                            <h2>
                                <p class="step-icon"><span>03</span></p>
                                <span class="step-text">Syarat Dokumen</span>
                            </h2>
                            <section>
                                <div class="inner">
                                    <div class="wizard-header">
                                        <h3 class="heading">Syarat Kelengkapan Dokumen</h3>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Foto Plat Nomor Kendaraan</legend>
                                                <input type="file" class="form-control" name="plat" id="plat" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan SKCK</legend>
                                                <input type="file" class="form-control" name="skck" id="skck" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan STNK</legend>
                                                <input type="file" class="form-control" name="stnk" id="stnk" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan SIM C</legend>
                                                <input type="file" class="form-control" name="sim" id="sim" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Foto Kendaraan dengan stiker Mishop</legend>
                                                <input type="file" class="form-control" name="stiker" id="stiker" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
                                            <label class="plan-icon plan-1-label" for="plan-1">
                                                <img src="<?php echo base_url() ?>assets/mitra/complete/images/form-v1-icon-2.png" alt="pay-1">
                                            </label>
                                            <div class="plan-total">
                                                <input type="hidden" name="unik" value="<?php echo $rand = rand(111, 999); ?>"> 
                                                <span class="plan-title">Rp 250.<?php echo $rand; ?>,-</span>
                                                <?php
                                                $profile = $this->Crud_m->select('profile');
                                                foreach ($profile as $p) {
                                                    ?>
                                                    <p class="plan-text">Silahkan Transfer sejumlah diatas ke Rekening <?php echo $p->bank; ?> 
                                                        atas nama <?php echo $p->atas_nama; ?> <strong><?php echo $p->no_rek; ?></strong>.</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url() ?>assets/mitra/complete/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/mitra/complete/js/jquery.steps.js"></script>
        <script src="<?php echo base_url() ?>assets/mitra/complete/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>

<!--<script src="<?php echo base_url() ?>assets/mitra/complete/js/main2.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/mitra/js/loading.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<script>
    $(document).ready(function () {
        var form = $(".form-register");
        $("#form-total").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: true,
            stepsOrientation: "vertical",
            autoFocus: true,
            transitionEffectSpeed: 500,
            titleTemplate: '<div class="title">#title#</div>',
            labels: {
                previous: 'Back Step',
                next: '<i class="zmdi zmdi-arrow-right"></i>',
                finish: '<i class="zmdi zmdi-check"></i>',
                current: ''
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                daftar();
            }
        });

        $('[name="provinsi"]').change(function () {
            var cntrol = $(this);
            var Prov = cntrol.find(':selected').data('nama');
            $('[name="nama_provinsi"]').val(Prov);


            var url = "<?php echo site_url('Welcome/kabupaten'); ?>/" + $(this).val();
            // alert(url);
            $('[name="kabupaten"]').load(url);
            return false;
        });

    });
    function daftar() {
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
                        upload(kode);

                    });
        }
    }
    function upload(kode) {
        const ref = firebase.storage().ref();
        const tgl = (+new Date());

        const fileDiri = document.querySelector('#diri').files[0];
        const nmDiri = "images_mitra/" + tgl + "/" + kode + "_" + "diri";
        const fileKtp = document.querySelector('#ktp').files[0];
        const nmKtp = "images_mitra/" + tgl + "/" + kode + "_" + "ktp";
        const filePlat = document.querySelector('#plat').files[0];
        const nmPlat = "images_mitra/" + tgl + "/" + kode + "_" + "plat";
        const fileSkck = document.querySelector('#skck').files[0];
        const nmSkck = "images_mitra/" + tgl + "/" + kode + "_" + "skck";
        const fileStnk = document.querySelector('#stnk').files[0];
        const nmStnk = "images_mitra/" + tgl + "/" + kode + "_" + "stnk";
        const fileSim = document.querySelector('#sim').files[0];
        const nmSim = "images_mitra/" + tgl + "/" + kode + "_" + "sim";
        const fileStiker = document.querySelector('#stiker').files[0];
        const nmStiker = "images_mitra/" + tgl + "/" + kode + "_" + "stiker";

        const metadata = {
            contentType: fileDiri.type
        };

        const task = ref.child(nmDiri).put(fileDiri, metadata);
        task.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
            var diri = url;

            const tasks = ref.child(nmKtp).put(fileKtp, metadata);
            tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                var ktp = url;

                const tasks = ref.child(nmPlat).put(filePlat, metadata);
                tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                    var plat = url;

                    const tasks = ref.child(nmSkck).put(fileSkck, metadata);
                    tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                        var skck = url;

                        const tasks = ref.child(nmStnk).put(fileStnk, metadata);
                        tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                            var stnk = url;

                            const tasks = ref.child(nmSim).put(fileSim, metadata);
                            tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                                var sim = url;

                                const tasks = ref.child(nmStiker).put(fileStiker, metadata);
                                tasks.then(snapshot => snapshot.ref.getDownloadURL()).then((url) => {
                                    var stiker = url;

                                    register(kode, diri, ktp, plat, skck, stnk, sim, stiker, tgl);

                                }).catch(console.error);

                            }).catch(console.error);

                        }).catch(console.error);

                    }).catch(console.error);

                }).catch(console.error);

            }).catch(console.error);

        }).catch(console.error);
    }
    function register(id, foto, ktp, plat, skck, stnk, sim, stiker, tgl_daftar) {

        var email = $('[name="mail_mitra"]').val();
        var alamat = $('[name="alamat_mitra"]').val();
        var notelp = $('[name="phone_mitra"]').val();
        var tgl_lahir = $('[name="tgl_lahir"]').val();
        var nik = $('[name="nik_mitra"]').val();
        var kab = $('[name="kabupaten"]').val();
        var prov = $('[name="nama_provinsi"]').val();
        var nama = $('[name="nama_mitra"]').val();
        var unik = $('[name="unik"]').val();

        var data = {
            id_mitra: id,
            tgl_daftar: tgl_daftar,
            email_mitra: email,
            nama_mitra: nama,
            alamat_mitra: alamat,
            no_tel: notelp,
            tgl_lahir: tgl_lahir,
            nik_mitra: nik,
            statusAktif: 0,
            saldo: 0,
            regid: "",
            foto: foto,
            ktp: ktp,
            plat: plat,
            skck: skck,
            stnk: stnk,
            sim: sim,
            stiker: stiker,
            masaSuspend: 0,
            kabupaten: kab,
            provinsi: prov,
            uid: "",
            unik: unik
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
        sendemail(email, nama, unik);
        location.reload();
    }
    function sendemail(email, nama, unik) {
        // var url= "http://lauwba.com/mishop/Mitra/email";
        // var url= "http://mishop.server411.tech/Mitra/email";
        var url = "<?php echo base_url('Mitra/email'); ?>";
        // console.log(url);
        $.ajax({
            url: url,
            type: "POST",
            data: {email: email, nama: nama, unik: unik},
            success: function (data) {
                console.log(data);

            }
        })
    }


</script>