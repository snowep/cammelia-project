<div class="page-titles">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item">
                        <a href="<?= BASEURL ?>/school/list">School</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">School Details</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">School Details</h1>
        </div>
        <?php
        if ($data['info']['level'] == 'admin' || $data['info']['level'] == 'superuser') {
        ?>
            <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
                <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2 modalUbah" id="buttonEdit" data-bs-toggle="modal" data-bs-target="#editSchool-modal" data-npsn="<?= $data['schools']['npsn'] ?>">
                    <i data-feather="edit" class="feather feather-plus me-2 feather-sm"></i>
                    Edit
                </a>
                <a href="<?= BASEURL ?>/school/delete/<?= $data['schools']['npsn'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" id="buttonDelete" onclick="return confirm('Yakin?')">
                    <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                    Delete
                </a>
            </div>
            <div id="editSchool-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-coloored-header bg-warning text-white">
                            Edit School Details
                        </div>
                        <div class="modal-body">
                            <form class="ps-3 pe-3" action="<?= BASEURL ?>/school/edit" method="POST">
                                <div class="mb-3">
                                    <label for="npsn">NPSN</label>
                                    <input class="form-control" type="text" id="npsnEdit" name="npsnInputEdit" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="mb-3">
                                    <label for="nss">NNS</label>
                                    <input class="form-control" type="text" id="nnsEdit" name="nnsInputEdit" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="mb-3">
                                    <label for="namaSekolah">School Name</label>
                                    <input class="form-control" type="text" required="" id="namaSekolah" name="namaSekolahEdit">
                                </div>

                                <div class="mb-3">
                                    <label for="namaSekolah">School Address</label>
                                    <input class="form-control" type="text" required="" id="alamatSekolah" name="alamatSekolahEdit">
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
        <?php
        }
        ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <?= $data['schools']['name']; ?>
                    </h3>
                    <h6 class="card-subtitle">
                        <?= $data['schools']['address']; ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items center">
                        <div>
                            <h3 class="card-title">
                                All Report
                            </h3>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-0 text-muted">No.</th>
                                    <th scope="col" class="px-0 text-muted">File Name</th>
                                    <th scope="col" class="px-0 text-muted">Upload Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['reports'] as $report) {
                                ?>
                                    <tr>
                                        <td class="px-0">
                                            <?= $i; ?>
                                        </td>
                                        <td class="px-0">
                                            <h6 class="mb-0 fw-bold"><a href="<?= BASEURL ?>/report/details/<?= $report['id'] ?>"><?= $report['file_name']; ?></a></h6>
                                            <span class="text-muted fs-9"><?= $report['fullname']; ?></span>
                                        </td>
                                        <td class="px-0"><?= $report['upload_time']; ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?= BASEURL ?>/school/list" class="btn btn-light-secondary btn-rounded">
                <i data-feather="arrow-left" class="feather feather-plus me-2 feather-sm"></i>
                Back
            </a>
        </div>
    </div>
</div>