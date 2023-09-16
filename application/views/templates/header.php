<?php
$ci = &get_instance();
$ci->load->model('Master_model', 'master');

$angka = strlen(base_url()) - 16;
$nama = $_SERVER['REQUEST_URI'];

$active = substr($nama, $angka);

?>

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

    <title><?= (!empty($title) ? $title : 'Halaman Blank'); ?></title>
    <link href="<?= assets_url(); ?>css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets_url(); ?>css/template_custom.css">
    <link rel="stylesheet" href="<?= assets_url(); ?>fonts/fontawesome6.4.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="<?= assets_url(); ?>libs/datatables/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?= assets_url(); ?>bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= assets_url(); ?>datatable/dataTable/css/dataTables.bootstrap5.min.css">

    <!-- <link rel="stylesheet" href="<?= assets_url(); ?>libs/datatables/dataTables.bootstrap4.css"> -->
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar  js-sidebar bg-light">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Project Contoh</span>
                </a>

                <ul class="sidebar-nav">
                    <?php
                    $header =  $ci->master->get_header();

                    foreach ($header as $no => $hdr) :
                    ?>

                        <?php $menu = $ci->master->get_menuByHeader($hdr->hid); ?>
                        <?php foreach ($menu as $no => $mn) : ?>
                            <li class="sidebar-header">
                                <?= $hdr->nama_header; ?>
                            </li>

                            <?php if ($mn->url == '#') : ?>

                                <?php $smenu = $ci->master->get_smenuBymenudanHeader($hdr->hid, $mn->mid);
                                $urlcari = array_column($smenu, 'url');
                                //  var_dump($urlcari); 
                                ?>

                                <li class="sidebar-item  <?php if ($mn->url == $active) echo 'active'; ?>">
                                    <a data-bs-target="#mstr<?= $no . $mn->mid; ?>" data-bs-toggle="collapse" class="sidebar-link  <?php if (in_array($active, $urlcari)) echo 'active'; ?>" href="pages-profile.html">
                                        <?= $mn->icon; ?> <span class="align-middle"><?= $mn->nama_menu; ?></span>
                                    </a>
                                    <ul id="mstr<?= $no . $mn->mid; ?>" class="sidebar-dropdown list-unstyled collapse show " data-bs-parent="#sidebar">
                                        <?php foreach ($smenu as $no => $smn) : ?>
                                            <li class="sidebar-item <?php if ($smn->url == $active) echo 'active'; ?>">
                                                <a class="sidebar-link" href="<?= base_url($smn->url); ?>"><i class=" fa-solid fa-arrow-right mx-4"></i><?= $smn->nama_submenu; ?></a>

                                            </li>


                                        <?php endforeach ?>

                                    </ul>
                                </li>

                            <?php else : ?>
                                <li class="sidebar-item  <?php if ($mn->url == $active) echo 'active'; ?>">

                                    <a class="sidebar-link <?php if ($mn->url == $active) echo 'active'; ?>" href="<?= base_url($mn->url); ?>">
                                        <?= $mn->icon; ?> <span class="align-middle"><?= $mn->nama_menu; ?></span>
                                    </a>

                                </li>
                            <?php endif; ?>
                        <?php endforeach ?>
                    <?php endforeach   ?>


                </ul>

                <!-- <div class="sidebar-cta">
                    <div class="sidebar-cta-content">
                        <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                        <div class="mb-3 text-sm">
                            Are you looking for more components? Check out our premium version.
                        </div>
                        <div class="d-grid">
                            <a href="upgrade-to-pro.html" class="btn btn-success">Upgrade to Pro</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </nav>
        <div class="main">
            <div class="main">
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <i class="align-middle" data-feather="bell"></i>
                                        <span class="indicator">4</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                    <div class="dropdown-menu-header">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-danger" data-feather="alert-circle"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Update completed</div>
                                                    <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                    <div class="text-muted small mt-1">30m ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-warning" data-feather="bell"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Lorem ipsum</div>
                                                    <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                                                    <div class="text-muted small mt-1">2h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-primary" data-feather="home"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">Login from 192.186.1.8</div>
                                                    <div class="text-muted small mt-1">5h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <i class="text-success" data-feather="user-plus"></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">New connection</div>
                                                    <div class="text-muted small mt-1">Christina accepted your request.</div>
                                                    <div class="text-muted small mt-1">14h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted">Show all notifications</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                                    <div class="position-relative">
                                        <i class="align-middle" data-feather="message-square"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                                    <div class="dropdown-menu-header">
                                        <div class="position-relative">
                                            4 New Messages
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <img src="<?= assets_url(); ?>img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                                </div>
                                                <div class="col-10 ps-2">
                                                    <div class="text-dark">Vanessa Tucker</div>
                                                    <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                                    <div class="text-muted small mt-1">15m ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <img src="<?= assets_url(); ?>img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
                                                </div>
                                                <div class="col-10 ps-2">
                                                    <div class="text-dark">William Harris</div>
                                                    <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                                                    <div class="text-muted small mt-1">2h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <img src="<?= assets_url(); ?>img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                                </div>
                                                <div class="col-10 ps-2">
                                                    <div class="text-dark">Christina Mason</div>
                                                    <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                                                    <div class="text-muted small mt-1">4h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <img src="<?= assets_url(); ?>img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                                </div>
                                                <div class="col-10 ps-2">
                                                    <div class="text-dark">Sharon Lessman</div>
                                                    <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                                                    <div class="text-muted small mt-1">5h ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted">Show all messages</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a> -->

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block prof" href="#" data-bs-toggle="dropdown">
                                    <img src="<?= assets_url(); ?>img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt=" img Charles Hall" /> <span class="text-dark">Charles Hall</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('authentication/logout'); ?>">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>