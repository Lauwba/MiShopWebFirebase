$(function () {
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
        onFinished: function (event, currentIndex) {
            daftar();
        }
    })
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
    const nmDiri = "images_mitra/" + tgl + "/" +  kode + "_" + "diri";
    const fileKtp = document.querySelector('#ktp').files[0];
    const nmKtp = "images_mitra/" + tgl + "/" +  kode + "_" + "ktp";
    const filePlat = document.querySelector('#plat').files[0];
    const nmPlat = "images_mitra/" + tgl + "/" + kode + "_" + "plat";
    const fileSkck = document.querySelector('#skck').files[0];
    const nmSkck = "images_mitra/" + tgl + "/" + kode + "_" + "skck";
    const fileStnk = document.querySelector('#stnk').files[0];
    const nmStnk = "images_mitra/" + tgl + "/" +  kode + "_" + "stnk";
    const fileSim = document.querySelector('#sim').files[0];
    const nmSim = "images_mitra/" + tgl + "/" +  kode + "_" + "sim";
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
        nama_mitra:nama,
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
        provinsi : prov,
        uid:"",
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
    location.reload();
}
