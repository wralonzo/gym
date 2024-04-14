<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Gimnacio GT</title>
    <link href="<?php echo base_url() . 'assets/css/style-nav.css' ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . 'assets/css/stylewinds.css' ?>" rel="stylesheet" />

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/gridjs-jquery/dist/gridjs.production.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">

            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="<?php echo base_url() ?>images/logo.png" alt=""></i><a href="<?php echo base_url() ?>">Gimnacio GT
            </a>
        </div>

        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <a href="<?php echo base_url() ?>login/logout" class="nav_link">
                <span class="navlink_icon">
                    <i class="bx bxs-magic-wand"></i>
                </span>
                <span class="navlink">Cerrar sesion</span>
            </a>
        </div>
    </nav>
    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Inicio</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                </li>
                <!-- end -->
            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_editor"></div>
                <!-- duplicate these li tag if you want to add or remove navlink only -->
                <!-- Start -->
            <?php if(session()->get('type_user') != 'lead' ): ?>

                <li class="item">
                    <a href="<?php echo base_url() ?>client" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bxs-user-circle"></i>
                        </span>
                        <span class="navlink">Clientes</span>
                    </a>
                </li>
                <!-- End -->

                <li class="item">
                    <a href="<?php echo base_url() ?>payment" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-book-open"></i>
                        </span>
                        <span class="navlink">Pagos clientes</span>
                    </a>
                </li>


                <li class="item">
                    <a href="<?php echo base_url() ?>clase" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-book-open"></i>
                        </span>
                        <span class="navlink">Clases</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo base_url() ?>reservacion" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-list-ul"></i>
                        </span>
                        <span class="navlink">Reservaciones</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo base_url() ?>horario" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-tachometer"></i>
                        </span>
                        <span class="navlink">Horarios</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo base_url() ?>membresia" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-dollar"></i>
                        </span>
                        <span class="navlink">Membresias</span>
                    </a>
                </li>
                <li class="item">
                    <a href="<?php echo base_url() ?>user/list" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user-pin"></i>
                        </span>
                        <span class="navlink">Usuarios</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(session()->get('type_user') != 'lead' ): ?>
                <li class="item">
                    <a href="<?php echo base_url() ?>user/list" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user-pin"></i>
                        </span>
                        <span class="navlink">Usuarios</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(session()->get('type_user') == 'lead' ): ?>
                <li class="item">
                    <a href="<?php echo base_url() ?>payment/client" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user-pin"></i>
                        </span>
                        <span class="navlink">Pagos</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(session()->get('type_user') == 'lead' ): ?>
                <li class="item">
                    <a href="<?php echo base_url() ?>reservacion/client" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user-pin"></i>
                        </span>
                        <span class="navlink">Clases</span>
                    </a>
                </li>
            <?php endif; ?>

                <li class="item">
                    <a href="<?php echo base_url() ?>client/asistencia" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-child"></i>
                        </span>
                        <span class="navlink">Asistencias</span>
                    </a>
                </li>
            </ul>

            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Expandir</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Comprimir</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="content-work">
        <div class="child-content">