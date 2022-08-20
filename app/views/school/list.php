<div class="page-titles">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 d-flex align-items-center">
                <li class="breadcrumb-item">
                    <a href="<?= BASEURL ?>/school/list">Data</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">School</li>
            </ol>
        </nav>
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <h1 class="mb-0 fw-bold"><?= $data['title']; ?></h4>
        </div>
        <?php
        if ($data['info']['level'] == 'admin' || $data['info']['level'] == 'superuser') {
        ?>
            <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
                <button type="button" id="buttonAdd" class="btn btn-light-info text-primary btn-lg px-4 fs-4" data-bs-toggle="modal" data-bs-target="#addSchool-modal">
                    <i data-feather="plus" class="feather feather-plus me-2 feather-sm"></i>
                    Add School
                </button>
            </div>
            <div id="addSchool-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header modal-coloored-header bg-info text-white">
                            Add new School
                        </div>
                        <div class="modal-body">
                            <form class="ps-3 pe-3" action="<?= BASEURL ?>/school/add" method="POST">
                                <div class="mb-3">
                                    <label for="npsn">NPSN</label>
                                    <input class="form-control" type="text" id="npsn" name="npsnInput" required="" placeholder="4010xxxx" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="mb-3">
                                    <label for="nns">NNS</label>
                                    <input class="form-control" type="text" id="nns" name="nnsInput" required="" placeholder="3011xxxxxxxx" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>

                                <div class="mb-3">
                                    <label for="namaSekolah">School Name</label>
                                    <input class="form-control" type="text" required="" id="namaSekolah" name="namaSekolah" placeholder="SMA Kristen 1 Tomohon / SMK Kristen 1 Tomohon">
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-light-info text-info font-weight-medium" type="submit">
                                        Save Data
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-stripped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>School Name</th>
                                    <th>NPSN</th>
                                    <th>NNS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data['schools'] as $school) {
                                ?>
                                    <tr>
                                        <td><a href="<?= BASEURL ?>/school/details/<?= $school['npsn'] ?>"><?= $school['name']; ?></a></td>
                                        <td><?= $school['npsn'] ?></td>
                                        <td><?= $school['nns'] ?></td>
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