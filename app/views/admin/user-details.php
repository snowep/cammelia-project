<div class="page-titles">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item">
                        <a href="<?= BASEURL ?>/<?= $data['info']['level'] ?>/user_list">User</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Rincian User</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Rincian User</h1>
        </div>
        <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
            <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2 modalUbahUser" data-bs-toggle="modal" data-bs-target="#editSchool-modal" data-id="<?= $data['users']['id'] ?>">
                <i data-feather="edit" class="feather feather-plus me-2 feather-sm"></i>
                Ubah
            </a>
            <a href="<?= BASEURL ?>/<?= $data['info']['level'] ?>/user_delete/<?= $data['users']['id'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" onclick="return confirm('Yakin?')">
                <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                Hapus
            </a>
        </div>
        <div id="editSchool-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-coloored-header bg-warning text-white">
                        Ubah Rincian User
                    </div>
                    <div class="modal-body">
                        <form class="ps-3 pe-3" action="<?= BASEURL ?>/superuser/user_edit" method="POST">
                            <div class="mb-3">
                                <label for="idEdit">ID</label>
                                <input class="form-control" type="text" id="idEdit" name="idInputEdit" required="" readonly hidden>
                            </div>

                            <div class="mb-3">
                                <label for="namaEdit">Nama</label>
                                <input class="form-control" type="text" id="namaEdit" name="namaInputEdit" required="" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="emailEdit">Email</label>
                                <input class="form-control" type="text" id="emailEdit" name="emailInputEdit" required="" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="usernameEdit">Username</label>
                                <input class="form-control" type="text" required="" id="usernameEdit" name="usernameInputEdit" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="roleInputEdit" id="roleEdit" class="form-select mr-sm-2">
                                    <?php
                                    $roles = ['admin', 'user'];
                                    foreach ($roles as $role) {
                                        echo '<option value="' . $role . '">' . ucfirst($role) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php if ($data['users']['id'] == $_SESSION['id']) { ?>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="statusInputEdit" id="statusEdit" class="form-select mr-sm-2" disabled>
                                        <?php
                                        $status = ['active', 'pending', 'rejected'];
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
                                        $status = ['active', 'pending', 'rejected'];
                                        foreach ($status as $stat) {
                                            echo '<option value="' . $stat . '">' . ucfirst($stat) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <div class="mb-3 text-center">
                                <button class="btn btn-light-warning text-warning font-weight-medium" type="submit">
                                    Simpan Perubahan Data
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?= BASEURL ?>/<?= $data['info']['level'] ?>/user_list" class="btn btn-light-secondary btn-rounded">
                <i data-feather="arrow-left" class="feather feather-plus me-2 feather-sm"></i>
                Kembali
            </a>
        </div>
    </div>
</div>