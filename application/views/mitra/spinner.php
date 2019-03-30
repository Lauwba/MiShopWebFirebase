<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="UTF-8">
        <title>Title</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="<?php echo base_url() ?>assets/mitra/complete/js/jquery-3.3.1.min.js"></script>
        <!--/swal/-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.32.4/dist/sweetalert2.all.min.js"></script>
        <?php $this->load->view('firebase_db'); ?>
    </head>
    <body>
        <canvas id="canvas" width="500" height="500" ></canvas>
        <input type="button" value="spin" onclick="spin();" style="float:left;" class="btn btn-dark" id="btnSpin">
        <span id="result"></span>
        <input type="hidden" id="idMitra" value="<?php echo $id_mitra ?>">
        <input type="hidden" id="saldoAkhir">
        <input type="hidden" id="saldoSkr">
        <script>
            var id_mitra = $("#idMitra").val();

            //change the color
            var colors = ["#D50000", "#6200EA", "#FFC400", "#6200EA",
                "#FFC400", "#6200EA", "#FFC400", "#2962FF",
                "#FF3D00", "#2962FF", "#049C00", "#2962FF", "#FF3D00", "#6200EA", "#FF3D00"];
            var numbers = ["1.000", "10.000", "8.000", "2.000",
                "9.000", "3.000", "10.000", "4.000",
                "11.000", "5.000", "50.000", "6.000", "13.000", "7.000", "14.0000"];

            var startAngle = 0;
            var arc = Math.PI / 6;
            var spinTimeout = null;

            var spinArcStart = 10;
            var spinTime = 0;
            var spinTimeTotal = 0;

            var ctx;
            function drawRouletteWheel() {
                var canvas = document.getElementById("canvas");
                if (canvas.getContext) {
                    var outsideRadius = 200;
                    var textRadius = 160;
                    var insideRadius = 125;

                    ctx = canvas.getContext("2d");
                    ctx.clearRect(0, 0, 500, 500);


                    ctx.strokeStyle = "white";
                    ctx.lineWidth = 2;
                    ctx.font = 'bold 18px Helvetica, Arial';

                    for (var i = 0; i < 12; i++) {
                        var angle = startAngle + i * arc;
                        ctx.fillStyle = colors[i];

                        ctx.beginPath();
                        ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
                        ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
                        ctx.stroke();
                        ctx.fill();

                        ctx.save();
                        ctx.shadowOffsetX = -1;
                        ctx.shadowOffsetY = -1;
                        ctx.shadowBlur = 0;
                        ctx.shadowColor = "rgb(220,220,220)";
                        ctx.fillStyle = "white";
                        ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius,
                                250 + Math.sin(angle + arc / 2) * textRadius);
                        ctx.rotate(angle + arc / 2 + Math.PI / 2);
                        var text = numbers[i];
                        ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
                        ctx.restore();
                    }

                    //Arrow
                    ctx.fillStyle = "black";
                    ctx.beginPath();
                    ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
                    ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
                    ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
                    ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
                    ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
                    ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
                    ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
                    ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
                    ctx.fill();
                }
            }

            function spin() {
                spinAngleStart = Math.random() * 10 + 10;
                spinTime = 0;
                spinTimeTotal = Math.random() * 3 + 4 * 2500;
                rotateWheel();
                document.getElementById("btnSpin").style.visibility = "hidden";
            }

            function rotateWheel() {
                spinTime += 30;
                if (spinTime >= spinTimeTotal) {
                    stopRotateWheel();
                    return;
                }
                var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
                startAngle += (spinAngle * Math.PI / 180);
                drawRouletteWheel();
                spinTimeout = setTimeout('rotateWheel()', 30);
            }

            function stopRotateWheel() {
                clearTimeout(spinTimeout);
                var degrees = startAngle * 180 / Math.PI + 90;
                var arcd = arc * 180 / Math.PI;
                var index = Math.floor((360 - degrees % 360) / arcd);
                ctx.save();
                ctx.font = 'bold 30px Helvetica, Arial';
                ctx.textAlign = "center";
                var text = numbers[index]
                ctx.fillStyle = colors[index];
                Swal.fire(
                        text,
                        'Selamat!!',
                        'success'
                        );
                addToSaldo(text);

                ctx.restore();
            }

            function easeOut(t, b, c, d) {
                var ts = (t /= d) * t;
                var tc = ts * t;
                return b + c * (tc + -3 * ts + 3 * t);
            }
            function addToSaldo(text) {
                console.log(text);
                var debit = text.replace(".", "");
                var skr = $("#saldoSkr").val();
                var akhir = parseInt(skr) + parseInt(debit);
                $("#saldoAkhir").val(akhir);
                $("#saldoSkr").val(akhir);

                insertSaldo(debit);

                firebase.database().ref("mitra").orderByChild("id_mitra").equalTo(id_mitra).once("value", function (snapshot) {
                    snapshot.forEach(function (user) {
                        user.ref.child("saldo").set(akhir);
                    });
                });
            }
            function insertSaldo(debit) {
                var d = new Date();
                var tgl = d.setHours(d.getHours());

                var ket = "Spinner";
                var id;

                id = firebase.database().ref().child('transaksi_saldo').push().key;

                var data = {
                    id_trans_saldo: id,
                    id_mitra: id_mitra,
                    jumlah: debit,
                    status: "Debit",
                    ket_trans: ket,
                    stat_deliver: 1,
                    tgl_trans: tgl
                };

                var updates = {};
                updates['/transaksi_saldo/' + id] = data;
                firebase.database().ref().update(updates);
            }


            firebase.database().ref("mitra").orderByChild("id_mitra").equalTo(id_mitra).once("value", function (snapshot) {
                snapshot.forEach(function (user) {

                    var saldo_sekarang = (user.val() && user.val().saldo);
                    drawRouletteWheel();
                    $("#saldoSkr").val(saldo_sekarang);
                });
            });


        </script>

    </body></html>