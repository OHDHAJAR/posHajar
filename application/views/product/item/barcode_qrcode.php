<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 style="font-size: 2em; color: #333;">Articles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="background: none; padding: 0; margin: 0; list-style: none;">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>" style="color: #007bff; text-decoration: none;">Accueil</a></li>
                    <li class="breadcrumb-item active" style="color: #6c757d;">Générer le code-barres</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Contenu principal -->
<section class="content">
    <div class="container-fluid">
        <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success" style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px;">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); background-color: #fff;">
                    <div class="card-header" style="background-color: #007bff; color: #fff; padding: 15px; font-size: 1.2em; border-bottom: 1px solid #ddd;">
                        <h3 class="card-title" style="margin: 0;">Générateur de Code-barres <i class="fa fa-barcode"></i></h3>
                        <div class="float-sm-right">
                            <a href="<?= site_url('item') ?>" class="btn btn-info btn-sm" style="background-color: #17a2b8; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                                <i class="fa fa-undo"></i> Retour
                            </a>
                        </div>
                    </div>

                    <div class="card-body" style="padding: 20px; text-align: center;">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) . '" style="max-width: 100%; height: auto; margin-bottom: 20px;">';
                        ?>
                        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">
                        <b style="font-size: 1.3em; color: #333;"><?= $item->barcode ?></b>
                        <br><br>
                        <a href="<?= site_url('item/barcode_print/' . $item->item_id); ?>" target="_blank" class="btn btn-default btn-sm" style="background-color: #6c757d; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                            <i class="fa fa-print"></i> Imprimer
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
