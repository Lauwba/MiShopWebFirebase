<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <?php $this->load->view('firebase_db'); ?>
    </head>
    <body>

        <div class="container">
            <h2>Inline form</h2>
            <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p>
            <form class="form-inline" action="" method="post" id="form_registrasi_mitra">
                <input class="text" name="tgl_daftar" value="<?php echo $this->Id_m->id_mitra(); ?>">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    <input type="text" class="form-control" id="kode">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Foto:</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <label for="pwd">Foto Stiker:</label>
                    <input type="file" class="form-control" id="stiker" name="stiker">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </body>
</html>
<script>

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
                $('#kode').val(kode);
            });


    $("#form_registrasi_mitra").submit(function (e) {
        e.preventDefault();
//        var email = $('#email').val();
//        var password = $('#pwd').val();
//
//        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
//            var errorCode = error.code;
//            var errorMessage = error.message;
//        });
        upload();
    });
    function register(id, email) {
        var d = new Date();
        var tgl_daftar = d.setHours(d.getHours());

        var data = {
            id_mitra: id,
            email: email,
            tgl_daftar: tgl_daftar
        };

        var updates = {};
        updates['/mitra/' + id] = data;
        firebase.database().ref().update(updates);

        location.reload();
    }

    function upload() {
        //https://time2hack.com/2017/10/upload-files-to-firebase-storage-with-javascript/
        const ref = firebase.storage().ref();

        const file = document.querySelector('#photo').files[0];
        const name = "images_mitra/" + (+new Date()) + '-' + "halo";
        const files = document.querySelector('#stiker').files[0];
        const names = "images_mitra/" + (+new Date()) + '-' + "stiker";

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
            }).catch(console.error);
            
        }).catch(console.error);
    }

</script>
