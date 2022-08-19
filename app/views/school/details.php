<div class="page-titles">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item">
                        <a href="<?= BASEURL ?>/school">Sekolah</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Rincian Sekolah</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Rincian Sekolah</h1>
        </div>
        <div class="col-lg-4 col-md-6 d-none d-md-flex align-items-center justify-content-end">
            <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2 modalUbah" data-bs-toggle="modal" data-bs-target="#editSchool-modal" data-npsn="<?= $data['schools']['npsn'] ?>">
                <i data-feather="edit" class="feather feather-plus me-2 feather-sm"></i>
                Ubah
            </a>
            <a href="<?= BASEURL ?>/school/delete/<?= $data['schools']['npsn'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" onclick="return confirm('Yakin?')">
                <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                Hapus
            </a>
        </div>
        <div id="editSchool-modal" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-coloored-header bg-warning text-white">
                        Ubah Rincian Sekolah
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
                                <label for="namaSekolah">Nama Sekolah</label>
                                <input class="form-control" type="text" required="" id="namaSekolah" name="namaSekolahEdit">
                            </div>

                            <div class="mb-3">
                                <label for="namaSekolah">Alamat Sekolah</label>
                                <input class="form-control" type="text" required="" id="alamatSekolah" name="alamatSekolahEdit">
                            </div>

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
                        <?= $data['schools']['name']; ?>
                    </h3>
                    <h6 class="card-subtitle">
                        <?= $data['schools']['address']; ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="<?= BASEURL ?>/school" class="btn btn-light-secondary btn-rounded">
                <i data-feather="arrow-left" class="feather feather-plus me-2 feather-sm"></i>
                Kembali
            </a>
        </div>
    </div>
</div>