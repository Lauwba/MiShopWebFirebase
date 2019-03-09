<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title?></title>
        <link rel="icon" type="image/png"  href="<?php echo base_url(); ?>assets/profil/logo.png">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Font-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/mitra/complete/css/opensans-font.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/mitra/complete/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <!-- Main Style Css -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/mitra/complete/css/style.css"/>
    </head>
    <body>
        <div class="page-content">
            <div class="form-v1-content">
                <div class="wizard-form">
                    <form class="form-register" action="#" method="post">
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
                                                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Sesuai KTP" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Email</legend>
                                                <input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Nomor Telepon</legend>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+62 888-999-7777" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Tanggal Lahir <small>sesuai KTP</small>:</legend>
                                                <input type="date" class="form-control" id="ssn" name="ssn" placeholder="NIK" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <label class="special-label">Alamat:</label>
                                            <select name="month" id="month">
                                                <option value="MM" disabled selected>Provinsi</option>
                                                <option value="16">Bali</option>
                                            </select>
                                        </div>
                                        <div class="form-holder">
                                            <label class="special-label">&nbsp</label>
                                            <select name="date" id="date">
                                                <option value="DD" disabled selected>Kabupaten</option>
                                                <option value="Feb">Denpasar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="NIK" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Foto Scan KTP</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                        <div class="form-holder">
                                            <fieldset>
                                                <legend>Foto Diri</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="Konfirmasi Password" required>
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
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan SKCK</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan STNK</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Scan SIM C</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <fieldset>
                                                <legend>Foto Kendaraan dengan stiker Mishop</legend>
                                                <input type="file" class="form-control" name="phone" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
                                            <label class="plan-icon plan-1-label" for="plan-1">
                                                <img src="<?php echo base_url()?>assets/mitra/complete/images/form-v1-icon-2.png" alt="pay-1">
                                            </label>
                                            <div class="plan-total">
                                                <span class="plan-title">Rp 250.089,-</span>
                                                <p class="plan-text">Silahkan Transfer sejumlah diatas ke Rekening Mishop(Mandiri) 05458245521.</p>
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
        <script src="<?php echo base_url()?>assets/mitra/complete/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/mitra/complete/js/jquery.steps.js"></script>
        <script src="<?php echo base_url()?>assets/mitra/complete/js/main.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>