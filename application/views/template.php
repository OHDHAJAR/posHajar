

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Application de Point de Vente | Tableau de bord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/template/admin') ?>/plugins/fontawesome-free/css/all.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/template/admin') ?>/dist/css/adminlte.min.css">
 
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('assets/template/admin') ?>/plugins/daterangepicker/daterangepicker.css">
   
    <link rel="stylesheet" href="<?= base_url('assets/template/admin'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/admin'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   
    <script src="<?= base_url('assets/template/admin') ?>/plugins/jquery/jquery.min.js"></script>
    

    <style>
        /* Sidebar Styles */
        .main-sidebar {
            background-color: #6A1B9A;
            color: #fff !important;
        }

        .brand-link {
            color: #fff !important;
        }

        /* Sidebar text color */
        .nav-sidebar .nav-link {
            color: #fff;
        }

        /* Active link background color */
        .nav-sidebar .nav-link.active {
            background-color: #B39DDB; /* Light purple */
            color: #fff;
        }

        /* Hover effect */
        .nav-sidebar .nav-link:hover {
            background-color: #9575CD; /* Slightly darker purple */
            color: #fff;
        }
    </style>
    <script src="<?= base_url('assets/template/admin') ?>/plugins/jquery/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?= site_url('auth/logout') ?>" class="dropdown-item dropdown-footer tombol-logout">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar elevation-4">
            <a href="<?= site_url('home') ?>" class="brand-link">
                <span class="brand-text font-weight-light">Application de Point de Vente</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/') ?>userav.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" style="            color: #fff" class="d-block"><?= ucfirst($this->fungsi->user_login()->username); ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">NAVIGATION PRINCIPALE</li>
                        <li class="nav-item">
                            <a href="<?= site_url('home') ?>" class="nav-link <?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
                                <i class="fas fa-home nav-icon"></i>
                                <p>Tableau de bord</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('customer') ?>" class="nav-link <?= $this->uri->segment(1) == 'customer' ? 'active' : '' ?>">
                                <i class="fas fa-address-book nav-icon"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('supplier') ?>" class="nav-link <?= $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
                                <i class="fas fa-industry nav-icon"></i>
                                <p>fournisseur</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Produits
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('category') ?>" class="nav-link <?= $this->uri->segment(1) == 'category' ? 'active' : '' ?>">
                                        <i class="fas fa-circle-notch nav-icon"></i>
                                        <p>Catégories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('unit') ?>" class="nav-link <?= $this->uri->segment(1) == 'unit' ? 'active' : '' ?>">
                                    <!-- <i class="fa-regular fa-circle nav-icon"></i> -->
                                    <i class="fas fa-circle-notch nav-icon"></i>
                                        <p>Unités</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('item') ?>" class="nav-link <?= $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
                                        <i class="fas fa-circle-notch nav-icon"></i>
                                        <p>Articles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'sales' || $this->uri->segment(2) == 'in' || $this->uri->segment(2) == 'out' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= $this->uri->segment(1) == 'sales' || $this->uri->segment(2) == 'in' || $this->uri->segment(2) == 'out' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>
            Transactions
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('sales') ?>" class="nav-link <?= $this->uri->segment(1) == 'sales' ? 'active' : '' ?>">
                <i class="fas fa-circle-notch nav-icon"></i>
                <p>Ventes</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('stock/in') ?>" class="nav-link <?= $this->uri->segment(2) == 'in' ? 'active' : '' ?>">
                <i class="fas fa-circle-notch nav-icon"></i>
                <p>Entrée de Stock</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= site_url('stock/out') ?>" class="nav-link <?= $this->uri->segment(2) == 'out' ? 'active' : '' ?>">
                <i class="fas fa-circle-notch nav-icon"></i>
                <p>Sortie de Stock</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview <?= $this->uri->segment(1) == 'reports' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= $this->uri->segment(1) == 'reports' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
            Rapports
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= site_url('reports/sale_report') ?>" class="nav-link <?= $this->uri->segment(2) == 'sale_report' ? 'active' : '' ?>">
                <i class="fas fa-circle-notch nav-icon"></i>
                <p>Rapports de Ventes</p>
            </a>
        </li>
   
    </ul>
</li>
<?php if ($this->fungsi->user_login()->level == 1): ?>

                        <li class="nav-item">
                            <a href="<?= site_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
                                <i class="fas fa-user-cog nav-icon"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content-wrapper">
            <?= $contents ?>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">Hajar Ou-hida</a>.</strong> Tous droits réservés.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/template/admin') ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/template/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/template/admin') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>
