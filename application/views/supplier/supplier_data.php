<section class="content-header">
    <div class="container-fluid">
    <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Fournisseurs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
                    <li class="breadcrumb-item active">Données des Fournisseurs</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm">
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="name" class="col-form-label">Nom  <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <input type="hidden" name="supplier_id" id="supplier_id">
                                            <div class="invalid-feedback nama-ada inv-nama">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="phone" class="col-form-label">Téléphone  <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="number" name="phone" id="phone" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <div class="invalid-feedback inv-phone">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="address" class="col-form-label">Address <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col md-8 col-xs-8">
                                            <input type="text" name="address" id="address" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-address">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="desc" class="col-form-label">Description</label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
                                <button type="button" class="btn btn-primary" onclick="simpandata()"><i class="fa fa-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-right">
                            <a onclick="tambahData()" class="btn btn-success btn-sm" style="color: aliceblue;"><i class="fa fa-plus"> Ajouter</i></a>
                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Nom</th>
                                    <th>Téléphone</th>
                                    <th>Adress</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($supplier as $sup) { ?>
                                    <tr>
                                        <td><?= $no++ . '.'; ?></td>
                                        <td><?= $sup->name; ?></td>
                                        <td><?= $sup->phone; ?></td>
                                        <td><?= $sup->address; ?></td>
                                        <td><?= $sup->desc; ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="editData(<?= $sup->supplier_id; ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="<?= site_url('supplier/delete') ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="supplier_id" value="<?= $sup->supplier_id; ?>">
                                                <button class="btn btn-danger btn-sm tombol-hapus" style="margin-bottom:4px;" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
</section>
<script>
    var dsState;

    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    $(function() {
        window.setTimeout(function() {
            $('.alert-success').hide(300);
        }, 5000);
    });

    $(function() {
        window.setTimeout(function() {
            $('.invalid-feedback').hide(300);
        }, 3000);
    });

    function tambahData() {
        $('#supplier_id').val('');
        $('#name').val('');
        $('#address').val('');
        $('#phone').val('');
        $('#desc').val('');
        dsState = "Input";

        $("#myModal").find('.modal-title').text('Ajouter un fournisseur');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });

    }

    function simpandata() {
        if ($.trim($("#name").val()) == "") {
            $(".inv-nama").html("Le nom ne peut pas être vide!");
            $('#name').addClass('is-invalid');
            window.setTimeout(function() {
                $('.inv-nama').hide(300);
            }, 3000);
        } else if ($.trim($("#phone").val()) == "") {
            $(".inv-phone").html("Le numéro de téléphone ne peut pas être vide!");
            $('#phone').addClass('is-invalid');
        } else if ($.trim($("#address").val()) == "") {
            $(".inv-address").html("L'adresse ne peut pas être vide!");
            $('#address').addClass('is-invalid');
        } else {
            if (dsState == "Input") {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('supplier/cek_supplier') ?>",
                    data: {
                        data: $("#name").val()
                    },
                    success: function(result) {
                        if (result == "ADA") {
                            //console.log(result);
                            $('.nama-ada').html("Le nom du fournisseur est déjà utilisé!");
                            $('.nama-ada').show();
                        } else {
                            // console.log(result);
                            $('#message').html("");
                            $('.nama-ada').hide();
                            $('#formku').attr("action", "<?= site_url('supplier/save') ?>");
                            $('#formku').submit();
                        }
                    }
                });
            } else {
                $('#formku').attr("action", "<?= site_url('supplier/update') ?>");
                $('#formku').submit();
            }
        };
    };


    function editData(supplier_id) {
        dsState = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= site_url('supplier/edit'); ?>",
            data: {
                supplier_id: supplier_id
            },
            success: function(result) {
                $('#name').val(result['name']);
                $('#address').val(result['address']);
                $('#phone').val(result['phone']);
                $('#desc').val(result['desc']);
                $('#supplier_id').val(result['supplier_id']);

                $("#myModal").find('.modal-title').text('Modifier un fournisseur');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        })
    }
</script>