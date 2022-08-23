<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        <img src="<?= BASEURL ?>/assets/images/users/profile-2.jpg" alt="user" class="profile-pic rounded-circle" width="150" height="150" style="object-fit: cover">
                        <h4 class="mt-2"><?= $data['info']['fullname'] ?></h4>
                        <h6 class="card-subtitle"><?= ucfirst($data['info']['level']) ?></h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <small class="text-muted">Email Address</small>
                    <h6><?= $data['info']['email'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card overflow-hidden">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a href="#user-settings" class="nav-link active" id="pills-setting-tab" data-bs-toggle="pill" role="tab" aria-controls="pills-setting" aria-selected="true">Setting</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="user-settings" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form action="#" method="post" class="form-horizontal form-material">
                                <div class="mb-3">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" id="user-fullnameEdit" name="user-fullnameInputEdit">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="user-emailInputEdit" id="user-emailInputEdit">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line" name="user-passwordInputEdit" id="user-passwordInputEdit">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="workAt" class="col-md-12">Work at</label>
                                    <select name="workAtInputEdit" id="workAtInput" class="select2 form-control custom-select">
                                        <?php
                                        foreach ($data['schools'] as $s) {
                                            echo '<option value="' . $s['npsn'] . '">' . $s['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>