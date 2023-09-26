<style>
#vertical .ps__rail-y {
    background-color: transparent;
    /* Set the background color to transparent */
}

#vertical .ps__thumb-y {
    background-color: transparent;
    /* Set the background color to transparent */
    opacity: 0;
    /* Hide the thumb by making it fully transparent */
}
</style>
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?= base_url('assets/'); ?>img/illustrations/auth-register-illustration-light.png"
                    alt="auth-register-cover" class="img-fluid my-5 auth-illustration"
                    data-app-light-img="illustrations/auth-register-illustration-light.png"
                    data-app-dark-img="illustrations/auth-register-illustration-dark.png" />

                <img src="<?= base_url('assets/'); ?>img/illustrations/bg-shape-image-light.png"
                    alt="auth-register-cover" class="platform-bg"
                    data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Register -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class=" w-px-400 mx-auto overflow-hidden position-relative" style="height: calc(100vh - 6rem);"
                id="vertical">
                <!-- Logo -->
                <div class="app-brand mb-4">
                    <a href="index.html" class="app-brand-link gap-2">
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
                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">Adventure starts here 🚀</h3>
                <p class="mb-4">Make your app management easy and fun!</p>

                <form id="register" class="mb-3" action="<?= base_url('register_c/register_user'); ?>" method="POST">
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="first-name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first-name" name="first-name"
                                placeholder="First name" autofocus value="<?= set_value('first-name'); ?>" />
                            <?= form_error('first-name','<small class="text-danger ps-1">','</small>'); ?>
                        </div>
                        <div class="col-6">
                            <label for="last-name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last-name" name="last-name"
                                placeholder="Last name" value="<?= set_value('last-name'); ?>" />
                            <?= form_error('last-name','<small class="text-danger ps-1">','</small>'); ?>
                        </div>
                    </div>
                    <div class=" mb-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter your username" value="<?= set_value('username'); ?>" />
                        <?= form_error('username','<small class="text-danger ps-1">','</small>'); ?>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"
                            value="<?= set_value('email'); ?>" />
                        <?= form_error('email','<small class="text-danger ps-1 ">','</small>'); ?>
                    </div>
                    <div class="mb-2 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <?= form_error('password','<small class="text-danger ps-1 pt-1 d-block">','</small>'); ?>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="confirm-password">Confirm password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="confirm-password" class="form-control" name="confirm-password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <?= form_error('confirm-password','<small class="text-danger ps-1">','</small>'); ?>
                    </div>

                    <div class="mb-3 pl-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                            <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Sign up</button>
                </form>

                <p class="text-center">
                    <span>Already have an account?</span>
                    <a href="<?= base_url('login_c/login_view'); ?>">
                        <span>Sign in instead</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Register -->
    </div>
</div>

<script src="<?= base_url('assets/'); ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script>
new PerfectScrollbar(document.getElementById('vertical'), {
    wheelPropagation: false,
    suppressScrollX: true,
    wheelSpeed: 0.2,
    scrollXMarginOffset: 10,
});
</script>