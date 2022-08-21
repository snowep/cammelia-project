<div class="container-fluid">
    <div class="row">
        <div class="col-12">
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
                    <a href="<?= BASEURL ?>/user/settings" class="btn btn-circle btn-secondary">
                        <i class="feather-icon fs-6 align-items-center justify-content-center" data-feather="settings"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>