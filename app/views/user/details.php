<div class="page-titles" data-role="<?= $_SESSION['role'] ?>">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item">
                        <a href="<?= BASEURL ?>/user/list">User List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Details</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">User Details</h1>
        </div>
        <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
            <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2 modalUbahUser" id="buttonEdit" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="<?= $data['users']['id'] ?>">
                <i data-feather="edit" class="feather feather-plus me-2 feather-sm"></i>
                Edit
            </a>
            <a href="<?= BASEURL ?>/user/delete/<?= $data['users']['id'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" id="buttonDelete" onclick="return confirm('Yakin?')">
                <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                Delete
            </a>
        </div>
        <div id="edit-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-coloored-header bg-warning text-white">
                        Edit User Details
                    </div>
                    <div class="modal-body">
                        <form class="ps-3 pe-3" action="<?= BASEURL ?>/user/edit" method="POST">
                            <div class="mb-3">
                                <label for="idEdit">ID</label>
                                <input class="form-control" type="text" id="idEdit" name="idInputEdit" required="" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="namaEdit">Name</label>
                                <input class="form-control" type="text" id="namaEdit" name="namaInputEdit" required="">
                            </div>

                            <div class="mb-3">
                                <label for="emailEdit">Email</label>
                                <input class="form-control" type="text" id="emailEdit" name="emailInputEdit" required="">
                            </div>

                            <div class="mb-3">
                                <label for="usernameEdit">Username</label>
                                <input class="form-control" type="text" required="" id="usernameEdit" name="usernameInputEdit">
                            </div>

                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="roleInputEdit" id="roleEdit" class="form-select mr-sm-2" readonly>
                                    <?php
                                    $roles = [...($data['info']['level'] == 'superuser') ? ['superuser', 'admin', 'user'] : ['admin', 'user']];
                                    foreach ($roles as $role) {
                                        echo '<option value="' . $role . '">' . ucfirst($role) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php if ($data['users']['id'] == $_SESSION['id'] && $data['info']['level'] != 'superuser') { ?>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="statusInputEdit" id="statusEdit" class="form-select mr-sm-2" disabled>
                                        <?php
                                        $status = ['active', 'pending', 'inactive'];
                                        foreach ($status as $stat) {
                                            echo '<option value="' . $stat . '">' . ucfirst($stat) . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <input class="form-control" type="text" id="statusEdit" name="statusInputEdit" required="" readonly hidden>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="statusInputEdit" id="statusEdit" class="form-select mr-sm-2">
                                        <?php
                                        $status = ['active', 'pending', 'inactive'];
                                        foreach ($status as $stat) {
                                            echo '<option value="' . $stat . '">' . ucfirst($stat) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>

                            <div class="mb-3 text-center">
                                <button class="btn btn-light-warning text-warning font-weight-medium" type="submit">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <?= $data['users']['fullname']; ?>
                    </h3>
                    <h6 class="card-subtitle">
                        <?= ucfirst($data['users']['level']); ?>
                        <span class="badge bg-<?= ($data['users']['status'] == 'active') ? 'success' : (($data['users']['status'] == 'pending') ? 'warning' : 'danger') ?>">
                            <?= ucfirst($data['users']['status']) ?>
                        </span>
                    </h6>
                    <h5><?= $data['users']['name'] ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?= BASEURL ?>/user/list" class="btn btn-light-secondary btn-rounded">
                <i data-feather="arrow-left" class="feather feather-plus me-2 feather-sm"></i>
                Back
            </a>
        </div>
    </div>
</div>