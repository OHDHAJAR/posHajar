<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tableau de Bord</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Tableau de Bord</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Flash message -->
        <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <!-- Info Boxes -->
        <div class="row">
            <!-- Articles -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon  bg-warning"><i class="fas fa-box"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Articles</span>
                        <span class="info-box-number"><?= $item; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-industry"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Fournisseurs</span>
            <span class="info-box-number"><?= $supplier; ?></span>
        </div>
    </div>
</div>
<!-- Clients -->
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon  bg-danger"><i class="fas fa-user-friends"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Clients</span>
            <span class="info-box-number"><?= $customer; ?></span>
        </div>
    </div>
</div>
<!-- Utilisateurs -->
<?php if ($this->fungsi->user_login()->level == 1): ?>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-user-shield"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Utilisateurs</span>
                <span class="info-box-number"><?= $user; ?></span>
            </div>
        </div>
    </div>
<?php endif; ?>

        </div>

        <!-- Product Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Produits Demandés</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Ventes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($product)): ?>
                                    <?php foreach ($product as $p): ?>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url('/uploads/product/' . $p->gambar); ?>" class="img-circle img-size-32">
                                                <?= htmlspecialchars($p->name); ?>
                                            </td>
                                            <td><?= indo_currency($p->price); ?></td>
                                            <td><?= htmlspecialchars($p->qty) . ' Article(s) Vendu(s)'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" style="text-align:center;">Aucun produit demandé</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
        $(function() {
            window.setTimeout(function() {
                $('.alert-success').hide(300);
            }, 3000);
        });
    </script>