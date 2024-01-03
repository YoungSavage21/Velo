<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= base_url('assets'); ?>/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $title ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets'); ?>/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="<?= base_url("/assets"); ?>/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/select2/select2.css " />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/cropperjs/cropper.css " />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/libs/jkanban/jkanban.css" />


    <!-- Page CSS -->

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/css/pages/page-profile.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/css/pages/page-account-settings.css" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/css/pages/app-kanban.css" />


    <!-- Helpers -->
    <script src="<?= base_url('assets'); ?>/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= base_url('assets'); ?>/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets'); ?>/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="<?= base_url('dashboard_c/home_view'); ?>" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="#7367F0" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="#7367F0" />
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold">Velo</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">


                    <!-- MAIN -->
                    <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/home_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/home_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <!-- <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/board_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/board_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-checklist"></i>
                            <div>Tasks</div>
                        </a>
                    </li> -->
                    <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/kanban_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/kanban_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                            <div>Kanban</div>
                        </a>
                    </li>
                    <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/profile_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/profile_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Profile">Profile</div>
                        </a>
                    </li>
                    <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/account_settings_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/account_settings_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Account">Account</div>
                        </a>
                    </li>
                    <li
                        class="menu-item <?php if ($_SERVER['REQUEST_URI'] == '/project-baby/dashboard_c/account_security_view') {echo 'active';} ?>">
                        <a href="<?= base_url('dashboard_c/account_security_view'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-lock"></i>
                            <div data-i18n="Security">Security</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= base_url('login_c/logout'); ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-logout"></i>
                            <div data-i18n="Logout">Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Logo -->
                        <div class="navbar-nav align-items-center">
                            <div class="app-brand demo">
                                <a href="<?= base_url('dashboard_c/home_view'); ?>" class="app-brand-link">
                                    <span class="app-brand-logo demo">
                                        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                                fill="#7367F0" />
                                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                                fill="#161616" />
                                            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                                fill="#161616" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                                fill="#7367F0" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- /Logo -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Language -->
                            <!-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li> -->
                            <span class="dropdown-item" href="javascript:void(0);" data-language="en">
                                <i class="fi fi-us fis rounded-circle me-1 fs-3"></i>
                                <!-- <span class="align-middle">English</span> -->
                            </span>
                            <!-- </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                                            <i class="fi fi-fr fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">French</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                                            <i class="fi fi-de fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">German</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                                            <i class="fi fi-pt fis rounded-circle me-1 fs-3"></i>
                                            <span class="align-middle">Portuguese</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <!--/ Language -->

                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                    <i class="ti ti-md"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url('assets') . '/img/avatars/' . $session['profile'] ; ?>"
                                            onerror="this.src='<?= base_url('assets'); ?>/img/avatars/default.png';"
                                            class="rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dashboard_c/profile_view'); ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url('assets') . '/img/avatars/' . $session['profile'] ; ?>"
                                                            onerror="this.src='<?= base_url('assets'); ?>/img/avatars/default.png';"
                                                            class="rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block"><?= $session['first-name'] . ' ' . $session['last-name'] ?></span>
                                                    <small class="text-muted">User</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dashboard_c/home_view'); ?>">
                                            <i class="ti ti-smart-home me-2 ti-sm"></i>
                                            <span class="align-middle">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dashboard_c/kanban_view'); ?>">
                                            <i class="ti ti-layout-kanban me-2 ti-sm"></i>
                                            <span class="align-middle">Kanban</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dashboard_c/profile_view'); ?>">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?= base_url('dashboard_c/account_settings_view'); ?>">
                                            <i class="ti ti-settings me-2 ti-sm"></i>
                                            <span class="align-middle">Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="<?= base_url('dashboard_c/account_security_view'); ?>">
                                            <i class="ti ti-lock me-2 ti-sm"></i>
                                            <span class="align-middle">Security</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dashboard_c/logout'); ?>">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <?php $this->load->view($content); ?>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">

                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url('assets'); ?>/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <script src="<?= base_url('assets'); ?>/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js'></script>
    <script src="<?= base_url('assets'); ?>/vendor/libs/cropperjs/cropper.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/libs/select2/select2.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/libs/popper/popper.js"></script>


    <!-- Main JS -->
    <script src="<?= base_url('assets'); ?>/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url('assets'); ?>/js/dashboards-ecommerce.js"></script>
    <script src="<?= base_url('assets'); ?>/js/cards-actions.js"></script>

</body>

</html>