<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <?php
                        if (session()->get("id")) {
                            ?>
                            <!-- item-->
                            <a href="<?php echo baseUrl(); ?>/salir" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>
                            <?php
                        } else {
                            ?>
                            <!-- item-->
                            <a href="<?php echo baseUrl(); ?>/sigin" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Login</span>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?php echo baseUrl(); ?>/inicio" class="logo text-center">
                    <span class="logo-lg">
                        <img src="<?php echo baseUrl(); ?>/templates/assets/images/logo.png" alt="" height="80">
                        <!-- <span class="logo-lg-text-light">Zircos</span> -->
                    </span>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Galaxias
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo baseUrl(); ?>/galaxias">Listado</a></li>

                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Misiones
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo baseUrl(); ?>/misiones">Listado</a></li>

                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Enemigos
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo baseUrl(); ?>/enemigos">Listado</a></li>

                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Encuentros enemigos
                        </a>
                        <ul class="submenu">
                            <li><a href="<?php echo baseUrl(); ?>/encuentros_enemigos">Listado</a></li>

                        </ul>
                    </li>


                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>