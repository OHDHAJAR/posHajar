<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Unités</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
                    <li class="breadcrumb-item active">Données des unités</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Contenu principal -->
<section class="content">
    <div class="container-fluid">
    <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>
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
                                            <label for="name" class="col-form-label">Nom de l'unité <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <input type="hidden" name="unit_id" id="unit_id">
                                            <div class="invalid-feedback nama-ada inv-nama">
                                                &nbsp;
                                            </div>
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
                                    <th style="width: 10px">N°</th>
                                    <th>Nom</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($unit as $cat) { ?>
                                    <tr>
                                        <td><?= $no++ . '.'; ?></td>
                                        <td><?= $cat->name; ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="editData(<?= $cat->unit_id; ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="<?= site_url('unit/delete') ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="unit_id" value="<?= $cat->unit_id; ?>">
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
        $('#unit_id').val('');
        $('#name').val('');
        dsState = "Saisie";

        $("#myModal").find('.modal-title').text('Ajouter une unité');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });

    }

    function simpandata() {
        if ($.trim($("#name").val()) == "") {
            $(".inv-nama").html("Le nom ne peut pas être vide !");
            $('#name').addClass('is-invalid');
            window.setTimeout(function() {
                $('.inv-nama').hide(300);
            }, 3000);
        } else {
            if (dsState == "Saisie") {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('unit/cek_unit') ?>",
                    data: {
                        data: $("#name").val()
                    },
                    success: function(result) {
                        if (result == "ADA") {
                            $('.nama-ada').html("Le nom de l'unité existe déjà !");
                            $('.nama-ada').show();
                        } else {
                            $('#message').html("");
                            $('.nama-ada').hide();
                            $('#formku').attr("action", "<?= site_url('unit/save') ?>");
                            $('#formku').submit();
                        }
                    }
                });
            } else {
                $('#formku').attr("action", "<?= site_url('unit/update') ?>");
                $('#formku').submit();
            }
        };
    };


    function editData(unit_id) {
        dsState = "Modification";
        $.ajax({
            type: "POST",
            url: "<?= site_url('unit/edit'); ?>",
            data: {
                unit_id: unit_id
            },
            success: function(result) {
                $('#name').val(result['name']);
                $('#unit_id').val(result['unit_id']);

                $("#myModal").find('.modal-title').text('Modifier une unité');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        })
    } 
</script>
