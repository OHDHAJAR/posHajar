<section class="content-header">
    <div class="container-fluid">
    <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rapport de Vente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
                    <li class="breadcrumb-item active">Historique des Ventes</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <!-- <div class="float-sm-right">
                    <a href="<?= site_url('in/add') ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"> Ajouter Stock Entrant</i></a>
                </div> -->
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">N°</th>
                            <th>Facture</th>
                            <th>Nom du Client</th>
                            <th>Remise</th>
                            <th>Note</th>
                            <th>Date</th>
                            <th>Responsable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sale as $s) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td id="invoice"><?= $s->invoice; ?></td>
                                <td style="text-align: center;"><?= $s->customer_name != null ? $s->customer_name : "Général"; ?></td>
                                <td><?= indo_currency($s->discount) ?></td>
                                <td><?= $s->note; ?></td>
                                <td style="text-align: center;"><?= indo_date($s->date) ?></td>
                                <td align="center">
                                    <h5><span class="badge badge-secondary"><?= $s->user_name; ?></span></h5>
                                </td>
                                <td align="center">
                                    <a class="btn btn-default btn-sm" onclick="showDetail(<?= $s->sale_id; ?>)"><i class=" fa fa-eye"></i>
                                    </a>
                                    <!-- <a href="javascript:;" onclick="printSale(<?= $s->sale_id; ?>)" style="text-decoration: none;" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a> -->
                                    <a href="<?= site_url('reports/print_report/' . $s->sale_id); ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Détail du Stock</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nom de l'Article</th>
                                <td>:</td>
                                <td>
                                    <span id="item_name">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Prix</th>
                                <td>:</td>
                                <td>
                                    <span id="price">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Quantité</th>
                                <td>:</td>
                                <td>
                                    <span id="qty">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Remise sur Article</th>
                                <td>:</td>
                                <td>
                                    <span id="disc">&nbsp;</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>:</td>
                                <td>
                                    <span id="total">&nbsp;</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showDetail(sale_id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('reports/detail'); ?>",
            data: {
                sale_id: sale_id
            },
            dataType: "json",
            success: function(result) {
                // console.log(result)
                $('#item_name').text(result['item_name']);
                $('#price').text(result['price']);
                $('#qty').text(result['qty']);
                $('#disc').text(result['discount_item']);
                $('#total').text(result['total']);
                $('#sale_id').val(result['sale_id']);

                $('#modal-detail').modal('show')
            }
        });
    }

    function printSale(sale_id) {

    }
</script>
