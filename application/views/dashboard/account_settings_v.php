                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
                            Account</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i
                                                class="ti-xs ti ti-users me-1"></i> Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?= base_url('/dashboard_c/account_security_view'); ?>"><i
                                                class="ti-xs ti ti-lock me-1"></i> Security</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST"
                                            action="<?= base_url('dashboard_c/update_user'); ?>"
                                            enctype="multipart/form-data">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="<?= base_url('assets') . '/img/avatars/' . $session['profile'] ; ?>"
                                                    alt="user-avatar" class="d-block w-px-100 h-px-100 rounded"
                                                    id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload new photo</span>
                                                        <i class="ti ti-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" class="account-file-input" hidden
                                                            accept="image/png, image/jpeg" name="profile-pic" />
                                                    </label>
                                                    <div class="text-muted" id="profileNote">Allowed JPG, GIF or PNG.
                                                        Max size of 800K</div>
                                                </div>
                                            </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" type="text" id="username"
                                                        name="username" value="<?= $session['username'] ?>" autofocus />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input class="form-control" type="text" id="firstName"
                                                        name="firstName" value="<?= $session['first-name'] ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                    <input class="form-control" type="text" name="lastName"
                                                        id="lastName" value="<?= $session['last-name'] ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="text" id="email" name="email"
                                                        value="<?= $session['email'] ?>"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">ID (+62)</span>
                                                        <input type="text" id="phoneNumber" name="phoneNumber"
                                                            class="form-control" value="<?= $session['phone'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="country">Country</label>
                                                    <select id="country" class="select2 form-select" name='country'>
                                                        <?php foreach ($all_country as $c): ?>
                                                        <option value="<?php echo $c['CHR_COUNTRY_ID'] ?>"
                                                            <?php if($session['country'] == $c['CHR_COUNTRY_ID']){echo 'selected';} ?>>
                                                            <?php echo $c['CHR_COUNTRY_NAME'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center">
                                                    <img src="<?= base_url('assets'); ?>/img/illustrations/girl-with-laptop.png"
                                                        class="img-fluid mt-5" width="60%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Delete Account</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <h5 class="alert-heading mb-1">Are you sure you want to delete your
                                                    account?</h5>
                                                <p class="mb-0">Once you delete your account, there is no going back.
                                                    Please be certain.</p>
                                            </div>
                                        </div>
                                        <form id="formAccountDeactivation" onsubmit="return false">
                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                                    id="accountActivation" />
                                                <label class="form-check-label" for="accountActivation">I confirm my
                                                    account deactivation</label>
                                            </div>
                                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                                Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>