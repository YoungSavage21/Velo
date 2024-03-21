<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Profile /</span> Profile</h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="<?= base_url('assets'); ?>/img/pages/profile-banner.png" alt="Banner image"
                        class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="<?= base_url('assets'); ?>/img/avatars/<?= $session['profile'] ?>"
                            onerror="this.src='<?= base_url('assets'); ?>/img/avatars/default.png';" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4><?= $session['first-name'] . ' ' . $session['last-name']; ?></h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item"><i class="ti ti-color-swatch mb-1"></i> Web Developer
                                    </li>
                                    <li class="list-inline-item"><i class="ti ti-map-pin mb-1"></i>
                                        <?= $country['CHR_COUNTRY_NAME']; ?></li>
                                    <li class="list-inline-item"><i class="ti ti-calendar mb-1"></i> Joined
                                        <?= $joined_date; ?></li>
                                </ul>
                            </div>
                            <a href="<?= base_url('/dashboard_c/account_settings_view'); ?>" class="btn btn-primary">
                                <i class="ti ti-user me-1"></i>Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-12">
            <!-- About User -->
            <div class="card mb-4">
                <div class="row card-body">
                    <div class="col-md-3 ps-3">
                        <small class="card-text text-uppercase">About</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span>
                                <span><?= $session['first-name'] . ' ' . $session['last-name']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-at"></i><span class="fw-bold mx-2">Username:</span>
                                <span><?= $session['username']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span>Active</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-flag"></i><span class="fw-bold mx-2">Country:</span>
                                <span><?= $country['CHR_COUNTRY_NAME']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Languages:</span>
                                <span>English</span>
                            </li>
                        </ul>
                        <small class="card-text text-uppercase">Contacts</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                                <span><?= $session['phone']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                                <span><?= $session['email']; ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 ps-4">
                        <p class="card-text text-uppercase">Overview</p>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-check"></i><span class="fw-bold mx-2">Task Finished: </span>
                                <span><?= $tasks_status_count['completed']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-layout-grid"></i><span class="fw-bold mx-2">New Task:</span>
                                <span><?= $tasks_status_count['new']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-users"></i><span class="fw-bold mx-2">Tasks in Progress: </span>
                                <span><?= $tasks_status_count['progress']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-users"></i><span class="fw-bold mx-2">Tasks in Review: </span>
                                <span><?= $tasks_status_count['review']; ?></span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="ti ti-users"></i><span class="fw-bold mx-2">Total Task:</span>
                                <span><?= count($tasks); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center">
                            <img src="<?= base_url('assets'); ?>/img/illustrations/page-misc-under-maintenance.png"
                                class="img-fluid mt-5" width="60%">
                        </div>
                    </div>
                </div>
            </div>
            <!--/ About User -->
        </div>
    </div>
    <!--/ User Profile Content -->
</div>