<?php $this->load->view('admin/h_admin'); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('A_dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Spinner/list_spinner'); ?>">Data Spinner</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <p>Spinner untuk Mitra dengan jumlah transaksi <?php if($spin->tipe == 0){ echo "Mi-Bike dan Mi-Express"; } else { echo "Mi-Car"; } ?>
                        mencapai <?php echo $spin->jml_transaksi; ?> transaksi dalam 1 hari.
                    </p>
                    <p><button type="button" class="btn btn-dark btn-lg" onclick="del_arr()" id="btnEdit">Do Edit</button></p>
                    <div id="formEditRolet" class="collapse">
                        <div class="form-group m-t-20">
                            <label>Nominal Spin</label>
                            <input type="text" class="form-control maskMoney" name="nominal" id="nominal">
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" class="btn btn-success" onclick="myFunction()" id="btnPush">Simpan</button>
                                <button type="button" class="btn btn-danger" onclick="popArr()" id="btnPop">Batal</button>
                                <button type="button" class="btn btn-cyan" onclick="del_arr()">Kosongkan Rolet</button>
                            </div>
                        </div>                    
                        <p><button type="button" class="btn btn-primary btn-lg" onclick="saveEdit()" id="btnSelesai">Selesai</button></p>
                    </div>
                    <!--<p id="demo"></p>-->
                    <form id="formSpin">
                        <input type="hidden" name="id_spinner" value="<?php echo $spin->id_spinner; ?>">
                        <input type="hidden" id="arr" name="arr_spinner">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="canvas" width="500" height="500" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>        
<?php $this->load->view('admin/f_admin'); ?>
<script>
    $('[name="nominal"]').keypress(function (e) {
        var keycode = (e.keyCode ? e.keyCode : e.which);
        if (keycode == '13') {
            myFunction();
        }
    });

    function saveEdit() {
        $.ajax({
            url: "<?php echo site_url('Spinner/proses_edit/') ?>",
            data: $("#formSpin").serialize(),
            type: "POST",
            success: function (data)
            {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }

    var colors = ["#D50000", "#6200EA", "#FFC400", "#6200EA",
        "#FFC400", "#6200EA", "#FFC400", "#2962FF",
        "#FF3D00", "#2962FF", "#049C00", "#2962FF", "#FF3D00", "#6200EA", "#FF3D00"];
    var numbers = <?php echo $spin->arr_spinner; ?>;

    function myFunction() {
        nominal = $('[name="nominal"]').val();
        if (nominal === "") {
            nominal = 0;
        }
        numbers.push(nominal);
        document.getElementById("arr").value = JSON.stringify(numbers);
        drawRouletteWheel();
        $('[name="nominal"]').val("");
        $('[name="nominal"]').focus();
    }
    function popArr() {
        numbers.pop();
        document.getElementById("arr").value = JSON.stringify(numbers);
        drawRouletteWheel();
    }
    function maArr(size) {
        if (size === 12) {
            document.getElementById("btnPush").setAttribute("disabled", "disabled");
            document.getElementById("nominal").setAttribute("disabled", "disabled");
            document.getElementById("btnSelesai").removeAttribute("disabled", "disabled");
        } else if (size < 12) {
            document.getElementById("btnPush").removeAttribute("disabled", "disabled");
            document.getElementById("nominal").removeAttribute("disabled", "disabled");
            document.getElementById("btnSelesai").setAttribute("disabled", "disabled");
        }
    }

    function del_arr() {
        $('#formEditRolet').collapse();
        numbers = [];
        drawRouletteWheel();
    }

    var startAngle = 0;
    var arc = Math.PI / 6;
    var spinTimeout = null;

    var spinArcStart = 10;
    var spinTime = 0;
    var spinTimeTotal = 0;

    var ctx;
    function drawRouletteWheel() {
        maArr(numbers.length);
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
    drawRouletteWheel();
</script>
