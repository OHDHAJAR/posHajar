<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS-Hajar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/template/admin') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template/admin') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- <link rel="stylesheet" href="
     
    //  base_url('assets/template/admin') 
    //  ?>
     /dist/css/adminlte.min.css">d -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="font-family: Arial, sans-serif; background-color: #e9f5fc; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

<div class="login-box"  style=" width: 100%; max-width: 400px; background-color: #fff; padding: 40px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05); box-sizing: border-box;">
<!-- <center><h2 style="color: #00a2ed;" >Application de Point de Vente</h2></center> -->
        
<div class="card">
            <div class="card-body login-card-body" style="padding:0 10px;">

                

                <?php if ($this->session->flashdata('pesan')) { ?>
                    <div class="container-fluid">
                        <div class="alert alert-success"  style="margin-bottom: 20px; border: 1px solid red; padding: 10px; background-color: #f8d7da; border-radius: 5px; color: #721c24;">
                            <span><?= $this->session->flashdata('pesan'); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <h2 style="font-size: 24px; color: #333; margin-bottom: 20px; text-align: center;">Log In</h2>

                <form action="<?= site_url('auth/proses') ?>" method="post">
                    <div class="input-group mb-3">
                        <input style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;" type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                       
                    </div>
                    <BR>
                    <div class="input-group mb-3">
                        <input style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;" type="password" class="form-control" placeholder="Password" name="password" required>
                       
                    </div>
                    <BR>
    
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button style="background-color: #00a2ed; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; border-radius: 5px; font-size: 16px;" type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/template/admin') ?>/plugins/jquery/jquery.min.js"></script>
    <script>
        $(function() {
            window.setTimeout(function() {
                $('.alert-success').hide(300);
            }, 3000);
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template/admin') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/admin') ?>/dist/js/adminlte.min.js"></script>

</body>

</html>