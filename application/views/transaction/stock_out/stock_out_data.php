<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sortie de Stock</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
                    <li class="breadcrumb-item active">Historique des Sorties de Stock</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
    <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <div class="float-sm-right">
                    <a href="<?= site_url('out/add') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"> Ajouter une Sortie de Stock</i></a>
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
                            <th>Code-barres</th>
                            <th>Nom de l'Article</th>
                            <th>Informations</th>
                            <th>Quantité</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($stock as $s) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s->barcode; ?></td>
                                <td><?= $s->item_name ?></td>
                                <td><?= $s->detail; ?></td>
                                <td style="text-align: right;"><?= $s->qty ?></td>
                                <td style="text-align: center;"><?= indo_date($s->date) ?></td>
                                <td align="center">
                                    <form action="<?= site_url('stock/stock_out_del') ?>" method="post" class="d-inline">
                                        <input type="hidden" name="stock_id" value="<?= $s->stock_id; ?>">
                                        <input type="hidden" name="item_id" value="<?= $s->item_id; ?>">
                                        <button class="btn btn-danger btn-sm tombol-hapus" type="submit">
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
</section>
