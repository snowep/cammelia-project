<div class="auth-box p-4 bg-white rounded">
    <div id="loginForm">
        <div class="logo">
            <h3 class="box-title mb-3">Masuk</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?= BASEURL ?>/auth/authCheck" class="form-horizontal mt-3 form-material" id="loginForm" method="post">
                    <div class="form-group mb-3">
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required name="usernameInput">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required name="passwordInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="ms-auto">
                                <a href="<?= BASEURL ?>/auth/reset" class="d-flex align-items-center link font-weight-medium">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mt-4 mb-3">
                        <div class="col-xs-12">
                            <button class="btn btn-primary d-block w-100 waves-effect waves-light">Masuk</button>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-4">
                        <div class="col-sm-12 justify-content-center d-flex">
                            <p>Belum punya akun? <a href="<?= BASEURL ?>/auth/register" class="text-primary font-weight-medium ms-1"> Daftar</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>