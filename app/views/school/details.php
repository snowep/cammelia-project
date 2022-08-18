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
            <a href="javascript:void(0)" class="btn btn-warning d-flex align-items-center ms-2">
                <i data-feather="plus" class="feather feather-plus me-2 feather-sm"></i>
                Ubah
            </a>
            <a href="<?= BASEURL ?>/school/delete/<?= $data['schools']['npsn'] ?>" class="btn btn-outline-danger d-flex align-items-center ms-2" onclick="return confirm('Yakin?')">
                <i data-feather="trash-2" class="feather-icon me-2 feather-sm"></i>
                Hapus
            </a>
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