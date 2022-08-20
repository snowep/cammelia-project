<div class="page-titles">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 d-flex align-items-center">
                <li class="breadcrumb-item">
                    <a href="<?= BASEURL ?>/user/list">Data</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Report</li>
            </ol>
        </nav>
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <h1 class="mb-0 fw-bold"><?= $data['title']; ?></h4>
        </div>
        <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
            <button type="button" id="buttonAdd" class="btn btn-light-info text-primary btn-lg px-4 fs-4" data-bs-toggle="modal" data-bs-target="#addSchool-modal">
                <i data-feather="plus" class="feather feather-plus me-2 feather-sm"></i>
                Add Report
            </button>
        </div>
        <div id="addSchool-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-coloored-header bg-info text-white">
                        Add new Report
                    </div>
                    <div class="modal-body">
                        <form class="ps-3 pe-3" action="<?= BASEURL ?>/report/add" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="npsn">Select File</label>
                                <input class="form-control" type="file" id="reportFile" name="reportFileInput" required="">
                            </div>

                            <div class="mb-3">
                                <label>Notes</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="notes"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-light-info text-info font-weight-medium" type="submit">
                                    Save Report
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
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-stripped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Uploaded By</th>
                                    <th>Uploaded On</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['reports'] as $report) {
                                ?>
                                    <tr>
                                        <td><a href="<?= BASEURL ?>/report/details/<?= $report['id'] ?>"><?= $report['file_name']; ?></a></td>
                                        <td><?= $report['fullname'] ?></td>
                                        <td><?= $report['upload_time'] ?></td>
                                        <td>
                                            <span class="badge bg-<?= ($report['status'] == 'approved') ? 'success' : (($report['status'] == 'pending') ? 'warning' : 'danger') ?>">
                                                <?= ucfirst($report['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= $report['notes'] ?></td>
                                        <td>
                                            <a href="<?= BASEURL . $data['file_directory'] . '/' . $report['file_name'] ?>" id="buttonDownload" download target="_blank" class="btn btn-light-secondary text-secondary btn-sm fs-4">
                                                <i data-feather="download" class="feather feather-sm"></i>
                                                Download
                                            </a>
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