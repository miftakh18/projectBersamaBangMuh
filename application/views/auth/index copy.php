<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="<?= assets_url(); ?>img/icons/icon-48x48.png" />

    <title>Sign In | AdminKit Demo</title>
    <link rel="stylesheet" href="<?= assets_url() ?>bootstrap5/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= assets_url() ?>css/login.css"> -->
    <link href="<?= assets_url(); ?>css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets_url(); ?>libs/sweetalert2/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
   
</style>

</head>

<body >
 <main class="d-flex w-100 ">
        <div class="container d-flex flex-column ">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle ">

                      

                        <div class="card  box-s tinggi">
                            <div class="card-body">
                                  <div class="text-center mt-4">
                                        <h1 class="h2">Login</h1>
                                      <!-- <div class="lines"></div> -->
                                    </div>
                                <div class="m-sm-3">
                                    <form method="POST" action="<?= base_url('authentication/login'); ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" type="text" name="login_name" placeholder="Enter your username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="login_pass" placeholder="Enter your password" />
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                                <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                        </div>
                                    </form>
                                </div>
                                  <div class="text-center mb-3">
                                        Don't have an account? <a href="pages-sign-up.html">Sign up</a>
                                    </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?= assets_url(); ?>js/app.js"></script>
    <script src="<?= assets_url(); ?>libs/sweetalert2/sweetalert2.min.js"></script>

    <?php
    $userdata = $this->session->flashdata('msg');
    // var_dump($userdata);
    // var_dump($_SESSION);
    if (!empty($userdata)) :
    ?>
        <script type="text/javascript">
            swal.fire({
                title: '<?= $userdata['pesan'] ?>',
                icon: '<?= $userdata['scode'] ?>',
                showConfirmButton: 'true'
            }).then(function() {

            });
        </script>
    <?php else : ?>
    <?php endif; ?>
</body>

</html>