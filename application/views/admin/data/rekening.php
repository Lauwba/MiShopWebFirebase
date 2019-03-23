<?php $this->load->view('admin/h_admin'); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title"><?php echo $title; ?></h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('admin/data/rekening_modal'); ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!--content here-->
                    <!--<p><button type="button" class="btn btn-info btn-lg" onclick="add_tarif()">Tambah</button></p>-->

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Rekening</th>
                                    <th>Bank</th>
                                    <th>Atas Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tarif = $this->Crud_m->select('profile');
                                foreach ($tarif as $t) {
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $t->no_rek; ?></strong></td>
                                        <td><?php echo $t->bank; ?></td>
                                        <td><?php echo $t->atas_nama; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-md" onclick="edit('<?php echo $t->id_profile; ?>')">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            <!--<button type="button" class="btn btn-danger btn-sm" onclick="del('<?php echo $t->id_profile; ?>')">-->
<!--                                                    <i class="fas fa-cut"></i> Hapus
                                            </button>-->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/f_admin'); ?>
<script>
    function add_tarif()
    {
        save_method = 'add';
        $('#form_tarif')[0].reset(); // reset form on modals
        $('#modal_tarif').modal('show'); // show bootstrap modal
    }
    function del(id)
    {
        if (confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url: "<?php echo site_url('A_data/del_rekening/') ?>/" + id,
                type: "POST",
                dataType: "JSON",
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
    }
    function edit(id)
    {
        save_method = 'update';
        $('#form_tarif')[0].reset(); // reset form on modals
        $('#modal_tarif').modal('show')

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('A_data/rekening_by/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_profile"]').val(data.id_profile);
                $('[name="atas_nama"]').val(data.atas_nama);
                $('[name="no_rek"]').val(data.no_rek);
                $('[name="bank"]').val(data.bank);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>