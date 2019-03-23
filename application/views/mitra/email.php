<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php 
    $profile = $this->Crud_m->select('profile');
    foreach ($profile as $p) { ?>
    <body style="margin: 20px">
        <div style="
             margin: 5px;
             border: 1px solid #ccc;
             float: left;
             width: 100%;
             ">
            <img style="
                 width: 100%;
                 height: auto;
                 padding-top: 50px;
                 "            
                 src="<?php echo base_url('assets/profil/logo.png'); ?>">
            <hr>

            <div style="
                 width: 100%; 
                 padding: 25px;
                 float: left;
                 "> 
                <h1>Hai <?php echo $nama; ?>,</h1>
                <p>Selamat bergabung di Mishop! Sekarang kamu adalah bagian dari komunitas mitra dari Mishop App </p>

            </div>
            <hr>
            <div style="
                 width: 100%; 
                 padding: 25px;
                 float: left;
                 "> 
                <h1>Langkah berikutnya,</h1>
                <p>Untuk mengaktifkan akun mitra pada mishop app anda, silahkan laukan pengisian dompet mishop anda.</p>
                <p>Lakukan transfer ke rekening Mishop</p>
                <p><?php echo $p->bank; ?> atas nama <strong><?php echo $p->atas_nama; ?></strong></p>
                <p><h3><?php echo $p->no_rek; ?></h3></p>
                <p>sebesar</p>
                <h1>Rp 250.<?php echo $unik; ?></h1>

            </div>

        </div>
    </body>
    <?php } ?>
</html>
