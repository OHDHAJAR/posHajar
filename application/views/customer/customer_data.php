<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Clients</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
                    <li class="breadcrumb-item active">Données Clients</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Contenu Principal -->
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
                                <form method="post" target="_self" name="formulaire" id="formulaire" class="eventInsForm">
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="name" class="col-form-label">Nom <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <input type="hidden" name="customer_id" id="customer_id">
                                            <div class="invalid-feedback nom-existe inv-nom">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="gender" class="col-form-label">Genre <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <select name="gender" id="gender" autofocus class="form-control" style="margin-bottom: 5px;">
                                                <option value="" selected>Choisir</option>
                                                <option value="H">Homme</option>
                                                <option value="F">Femme</option>
                                            </select>
                                            <div class="invalid-feedback inv-genre">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="phone" class="col-form-label">Téléphone <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="number" name="phone" id="phone" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <div class="invalid-feedback inv-tel">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="address" class="col-form-label">Adresse <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="address" id="address" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-adresse">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
                                <button type="button" class="btn btn-primary" onclick="enregistrerDonnees()"><i class="fa fa-save"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-right">
                            <a onclick="ajouterDonnee()" class="btn btn-success btn-sm" style="color: aliceblue;"><i class="fa fa-plus"> Ajouter</i></a>
                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>">
                    </div>

                    <!-- Contenu de la carte -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">N°</th>
                                    <th>Nom</th>
                                
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($customer as $client) { ?>
                                    <tr>
                                        <td><?= $no++ . '.'; ?></td>
                                        <td><?= $client->name; ?></td>
                                     
                                        <td><?= $client->phone; ?></td>
                                        <td><?= $client->address; ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="modifierDonnee(<?= $client->customer_id; ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="<?= site_url('customer/delete') ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="customer_id" value="<?= $client->customer_id; ?>">
                                                <button class="btn btn-danger btn-sm supprimer" style="margin-bottom:4px;" type="submit">
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
    var etatDs;

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

    function ajouterDonnee() {
        $('#customer_id').val('');
        $('#name').val('');
        $('#address').val('');
        $('#gender').val('');
        $('#phone').val('');
        etatDs = "Ajout";

        $("#myModal").find('.modal-title').text('Ajouter un client');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });
    }

    function enregistrerDonnees() {
        if ($.trim($("#name").val()) == "") {
            $(".inv-nom").html("Le nom ne peut pas être vide!");
            $('#name').addClass('is-invalid');
        } else if ($.trim($("#gender").val()) == "") {
            $(".inv-genre").html("Le genre ne peut pas être vide!");
            $('#gender').addClass('is-invalid');
        } else if ($.trim($("#phone").val()) == "") {
            $(".inv-tel").html("Le téléphone ne peut pas être vide!");
            $('#phone').addClass('is-invalid');
        } else if ($.trim($("#address").val()) == "") {
            $(".inv-adresse").html("L'adresse ne peut pas être vide!");
            $('#address').addClass('is-invalid');
        } else {
            if (etatDs == "Ajout") {
                $('#formulaire').attr("action", "<?= site_url('customer/save') ?>");
                $('#formulaire').submit();
            } else {
                $('#formulaire').attr("action", "<?= site_url('customer/update') ?>");
                $('#formulaire').submit();
            }
        };
    };

    function modifierDonnee(customer_id) {
        etatDs = "Modifier";
        $.ajax({
            type: "POST",
            url: "<?= site_url('customer/edit'); ?>",
            data: { customer_id: customer_id },
            success: function(result) {
                $('#name').val(result['name']);
                $('#gender').val(result['gender']);
                $('#address').val(result['address']);
                $('#phone').val(result['phone']);
                $('#customer_id').val(result['customer_id']);

                $("#myModal").find('.modal-title').text('Modifier un client');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        })
    }
</script>
