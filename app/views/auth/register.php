<div class="auth-box p-4 bg-white rounded">
    <div id="loginForm">
        <div class="logo text-center">
            <h3 class="font-weight-medium mb-3">Daftar</h3>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <form action="<?= BASEURL ?>/auth/add" class="form-horizontal" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-input-bg" id="tb-rfname" name="fullnameInput" placeholder="James Arthur" required="">
                        <label for="tb-rfname">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-input-bg" id="tb-remail" name="emailInput" placeholder="j.arthur@gmail.com" required="">
                        <label for="tb-remail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-input-bg" id="tb-rusername" name="usernameInput" placeholder="j.arthur" required="">
                        <label for="tb-rusername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-input-bg" id="text-rpassword" name="passwordInput" placeholder="*****" required="">
                        <label for="text-rpassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control form-input-bg" id="text-rcpassword" name="confirmpasswordInput" placeholder="*****" required="">
                        <label for="text-rcpassword">Confirm Password</label>
                    </div>
                    <div class="form-group text-center mt-4 mb-3">
                        <div class="col-xs-12">
                            <button class="btn btn-primary d-block w-100 waves-effect waves-light">Daftar</button>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-4">
                        <div class="col-sm-12 justify-content-center d-flex">
                            <p>Sudah punya akun? <a href="<?= BASEURL ?>/auth/login" class="text-primary font-weight-medium ms-1"> Masuk</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>