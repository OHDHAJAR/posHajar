<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ventes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Transaction</a></li>
                    <li class="breadcrumb-item active">Ventes</li>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <table>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="user">Caissier</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" name="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="user">Client</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="customer" id="customer_id" class="form-control">
                                            <option value="" selected>Général</option>
                                            <?php foreach ($customer as $c) { ?>
                                                <option value="<?= $c->customer_id; ?>"><?= $c->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="barcode">Code-barres</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="item_id">
                                        <input type="hidden" id="price">
                                        <input type="hidden" id="stock">
                                        <input type="text" name="barcode" id="barcode" class="form-control" aria-describedby="basic">
                                        <div class="input-group-append">
                                            <span>
                                                <button type="button" class="input-group-text btn btn-info btn-flat form-control" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search" id="basic"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="qty">Qté</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="qty" value="1" min="1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"> Ajouter</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <div align="right">
                            <h4>Facture <b><span id="invoice"><?= $invoice; ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size:50pt;">0</span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code-barres</th>
                                        <th>Article</th>
                                        <th>Prix</th>
                                        <th>Qté</th>
                                        <th width="10%">Réduction Article</th>
                                        <th width="15%">Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="cart_tabel">
                                    <?php $this->view('transaction/sales/cart_data') ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width:30%;">
                                    <label for="sub_total">Sous-total</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="sub_total" value="" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="discount">Réduction</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="discount" value="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="grand_total">Total général</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="grand_total" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body" style="height: 145px;">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width:30%;">
                                    <label for="cash">Espèces</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="cash" value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="change">Rendu</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="change" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="note">Note</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea id="note" rows="3" class="form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div>
                    <button id="cancel_payment" class="btn btn-flat btn-warning" style="color: white;">
                        <i class="fa fa-recycle"></i> Annuler
                    </button><br><br>
                    <button id="process_payment" name="process_payment" class="btn btn-flat btn-lg btn-success">
                        <i class="fa fa-paper-plane"></i> Process Payment
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>Code-barres</th>
                                <th>Nom</th>
                                <th>Unité</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblItem">
                           <!--  <?php foreach ($item as $i) { ?>
                                <tr>
                                    <td><?= $i->barcode; ?></td>
                                    <td><?= $i->name; ?></td>
                                    <td style="text-align: center;"><?= $i->name_unit; ?></td>
                                    <td style="text-align: center;"><?= indo_currency($i->price); ?></td>
                                    <td><?= $i->stock; ?></td>
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $i->item_id; ?>" data-barcode="<?= $i->barcode; ?>" data-price="<?= $i->price; ?>" data-stock="<?= $i->stock; ?>">
                                            <i class="fa fa-check"></i> Sélectionner
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        calculate()
        loadItem()
    });

    $(document).on('click', '#select', function() {
        $('#item_id').val($(this).data('id'))
        $('#barcode').val($(this).data('barcode'))
        $('#price').val($(this).data('price'))
        $('#stock').val($(this).data('stock'))
        $('#modal-item').modal('hide')
    });

    function cek_qty(val)
    {
        if(val > $('#stock').val()){
            alert('le stock est insuffisant');
            $('#item_id').val('');
            $('#barcode').val('');
            $('#barcode').focus();
            $('#qty').val(1);
        }
    }

    $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val();
        var price = $('#price').val();
        var stock = $('#stock').val();
        var qty = $('#qty').val();
        if (item_id == '') {
            alert('Le produit n\'a pas été sélectionné');
            $('#barcode').focus();
        } else if (parseInt(qty) > parseInt(stock)) {
            alert('Stock insuffisant');
            $('#item_id').val('');
            $('#barcode').val('');
            $('#barcode').focus();
        } else {
            $.ajax({
                type: "POST",
                url: "<?= site_url('sales/process') ?>",
                data: {
                    'add_cart': true,
                    'item_id': item_id,
                    'price': price,
                    'qty': qty
                },
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_tabel').load('<?= site_url('sales/cart_data'); ?>', function() {
                            calculate()
                        });
                        $('#item_id').val('');
                        $('#barcode').val('');
                        $('#qty').val(1);
                        $('#barcode').focus();
                        loadItem()
                    } else {
                        alert('Échec de l\'ajout d\'un article au panier');
                    }
                }
            });
        }
    })

    $(document).on('click', '#del_cart', function() {
        if (confirm('Es-tu sûr?')) {
            var cart_id = $(this).data('cartid');
            $.ajax({
                type: "POST",
                url: "<?= site_url('sales/cart_del') ?>",
                data: {
                    'cart_id': cart_id
                },
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_tabel').load('<?= site_url('sales/cart_data'); ?>', function() {

                        });
                    } else {
                        alert('Échec de la suppression de l\'article du panier');
                    }
                }
            });

        }
    });

    $(document).on('click', '#process_payment', function() {
        var subtotal = $('#sub_total').val();
        var customer = $('#customer_id').val();
        var discount = $('#discount').val();
        var grandtotal = $('#grand_total').val();
        var cash = $('#cash').val();
        var change = $('#change').val();
        var note = $('#note').val();
        var date = $('#date').val();

        if (subtotal < 1) {
            alert('Le produit n\'a pas été sélectionné');
            $('#barcode').focus();
        } else if (cash < grandtotal ) {
            alert(' cash puls que le total genrale');
            $('#cash').focus();
        } else {
            if (confirm('Vous souhaitez traiter cette transaction ?')) {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('sales/process') ?>",
                    data: {
                        'process_payment': true,
                        'customer_id': customer,
                        'sub_total': subtotal,
                        'discount': discount,
                        'grand_total': grandtotal,
                        'cash': cash,
                        'change': change,
                        'note': note,
                        'date': date
                    },
                    dataType: "json",
                    success: function(result) {
                        if (result.success == true) {
                            console.log('Print.......')

                            alert('Transaction réussie')
                            window.open('<?= site_url('sales/cetak/') ?>' + result.sale_id,
                                '_blank')
                            location.reload();
                        } else {
                            alert('la transaction a échoué');
                        }
                    }
                });
            }
        }
    });

    $(document).on('click', '#cancel_payment', function() {
        if (confirm('Vous souhaitez annuler une commande ?')) {
            $.ajax({
                type: "POST",
                url: "<?= site_url('sales/reset') ?>",
                data: {
                    'cancel_payment': true
                },
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        console.log('terhapus')
                        $('#cart_tabel').load('<?= site_url('sales/cart_data'); ?>', function() {
                            calculate()
                        });
                    }
                }
            })
            $('#discount').val(0)
            $('#cash').val(0)
            $('#customer').val(0).change()
            $('#barcode').val('')
            $('#barcode').focus()

        }
    });

    function loadItem()
    {
         $.ajax({
            url: "<?= site_url('item/get_data')?>",
            type: "GET",
            dataType: "json",
            success: function(result) {
                console.log(result)
                // var final = JSON.parse(result);
                $("#tblItem").html(result)
            }
        })
    }

    function calculate() {
        var subtotal = 0;
        $('#cart_tabel tr').each(function() {
            subtotal += parseInt($(this).find('#total').text(), 10)
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var discount = $('#discount').val()
        var grand_total = subtotal - discount
        //console.log(subtotal);
        if (isNaN(grand_total)) {
            $('#grand_total').val(0)
            $('#grand_total2').text(0)
        } else {
            $('#grand_total').val(grand_total)
            $('#grand_total2').text(grand_total)
        }

        //hitung kembalian
        var cash = $('#cash').val();
        cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0);
    }

    $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
    })
</script>