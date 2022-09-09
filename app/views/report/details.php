<div class="page-titles" data-role="<?= $_SESSION['role'] ?>">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item">
                        <a href="<?= BASEURL ?>/report/list">Report List</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Report Details</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Report Details</h1>
        </div>
        <?php if ($_SESSION['role'] == 'admin') { ?>
            <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
                <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2 modalUbahReport" id="buttonEdit" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="<?= $data['reports']['id'] ?>">
                    <i data-feather="edit" class="feather feather-plus me-2 feather-sm"></i>
                    Edit
                </a>
                <a href="<?= BASEURL ?>/report/delete/<?= $data['reports']['id'] ?>/<?= $data['reports']['file_name'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" id="buttonDelete" onclick="return confirm('Yakin?')">
                    <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                    Delete
                </a>
            </div>
            <div id="edit-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-coloored-header bg-warning text-white">
                            Edit Report Details
                        </div>
                        <div class="modal-body">
                            <form class="ps-3 pe-3" action="<?= BASEURL ?>/report/edit" method="POST">
                                <div class="mb-3">
                                    <input class="form-control" type="text" id="idEdit" name="idInputEdit" required="" readonly hidden>
                                </div>

                                <div class="mb-3">
                                    <label for="filenameEdit">File Name</label>
                                    <input class="form-control" type="text" id="filenameEdit" name="filenameInputEdit" required="" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="statusReportEdit">Status</label>
                                    <select name="statusInputEdit" id="statusReportEdit" class="form-select mr-sm-2">
                                        <?php
                                        $status = ['approved', 'pending', 'rejected'];
                                        foreach ($status as $stat) {
                                            echo '<option value="' . $stat . '">' . ucfirst($stat) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Notes</label>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" id="notesEdit" name="notesInputEdit"></textarea>
                                    </div>
                                </div>

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
        <?php } ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <?= $data['reports']['file_name']; ?>
                    </h3>
                    <h6 class="card-subtitle">
                        <span class="badge bg-<?= ($data['reports']['status'] == 'approved') ? 'success' : (($data['reports']['status'] == 'pending') ? 'warning' : 'danger') ?>">
                            <?= ucfirst($data['reports']['status']) ?>
                        </span>
                    </h6>
                    <?php if ($data['reports']['notes'] != '') : ?>
                        <div>
                            <strong>Notes: </strong> <?= $data['reports']['notes'] ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?= BASEURL ?>/report/list" class="btn btn-light-secondary btn-rounded">
                <i data-feather="arrow-left" class="feather feather-plus me-2 feather-sm"></i>
                Back
            </a>
        </div>
    </div>
</div>