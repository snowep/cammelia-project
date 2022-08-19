<div class="page-titles">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 d-flex align-items-center">
                <li class="breadcrumb-item">
                    <a href="<?= BASEURL ?>/<?= $_SESSION['role'] ?>/user_list">Data</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <h1 class="mb-0 fw-bold"><?= $data['title']; ?></h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-stripped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['users'] as $user) {
                                ?>
                                    <tr>
                                        <td><a href="<?= BASEURL ?>/<?= $data['role'] ?>/user_details/<?= $user['id'] ?>"><?= $user['fullname']; ?></a></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= ucfirst($user['level']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= ($user['status'] == 'active') ? 'success' : (($user['status'] == 'pending') ? 'warning' : 'danger') ?>">
                                                <?= ucfirst($user['status']) ?>
                                            </span>
                                        </td>
                                    <?php
                                }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>