<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $subtitle2; ?></h3>
                <a href="<?= base_url('/surat/disposisi'); ?>" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $modul; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $subtitle2; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="btn-group mb-1">
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle me-1" type="button"
            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Primary
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Option 1</a>
            <a class="dropdown-item" href="#">Option 2</a>
            <a class="dropdown-item" href="#">Option 3</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h6 class="mb-4">Naskah Masuk Dari:</h6>
        <div class="row mb-3">
            <div class="col-md-12">
                <!-- Ambil data pengirim surat dari database -->
                <h5><strong><?= $suratdisposisi->nama_pengirim ?></strong></h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Nomor Naskah</strong>
                <p class="text-muted"><?= $suratdisposisi->nomor_naskah ?></p>
            </div>
            <div class="col-md-4">
                <strong>Tanggal Naskah</strong>
                <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_naskah)) ?></p>
            </div>
            <div class="col-md-4">
                <strong>Tanggal Disposisi Naskah</strong>
                <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_disposisi)); ?></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Hal</strong>
                <p class="text-muted"><?= $suratdisposisi->hal ?></p>
            </div>
            <div class="col-md-6">
                <strong>Ringkasan</strong>
                <p class="text-muted"><?= $suratdisposisi->ringkasan ?></p>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Detail Surat
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <tbody>
                            <table class="table table-bordered table-hover table-striped mb-0">
                                <tr>
                                    <th>Nomor Naskah</th>
                                    <td><?= $suratdisposisi->nomor_naskah; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Naskah</th>
                                    <td><?= $suratdisposisi->tanggal_naskah; ?></td>
                                </tr>
                                <tr>
                                    <th>Hal</th>
                                    <td><?= $suratdisposisi->hal; ?></td>
                                </tr>
                                <tr>
                                    <th>Ringkasan</th>
                                    <td><?= $suratdisposisi->ringkasan; ?></td>
                                </tr>
                                <tr>
                                    <th>Pengirim</th>
                                    <td><?= $suratdisposisi->nama_pengirim; ?></td>
                                </tr>
                                <tr>
                                    <th>Catatan Disposisi</th>
                                    <td><?= $suratdisposisi->catatan_disposisi; ?></td>
                                </tr>
                            </table>
                        </tbody>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <strong>File Naskah</strong>
                    <?php if (!empty($suratdisposisi->file_naskah)): ?>
                        <div class="">
                            <iframe src="<?= base_url('/uploads/surat/' . $suratdisposisi->file_naskah); ?>" width="100%" height="400px" class="rounded"></iframe>
                            <!-- Atau gunakan embed jika iframe tidak bekerja -->
                            <!-- <embed src="<?= base_url('/uploads/surat/' . $suratdisposisi->file_naskah); ?>" width="100%" height="400px" type="application/pdf" class="rounded" /> -->
                        </div>
                    <?php else: ?>
                        <p class="text-muted">Tidak ada file yang diunggah.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <?php if ($suratdisposisi): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="2">Informasi Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Nomor Naskah</th>
                                        <td><?= $suratdisposisi->nomor_naskah; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Naskah</th>
                                        <td><?= $suratdisposisi->tanggal_naskah; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hal</th>
                                        <td><?= $suratdisposisi->hal; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Ringkasan</th>
                                        <td><?= $suratdisposisi->ringkasan; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pengirim</th>
                                        <td><?= $suratdisposisi->nama_pengirim; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Catatan Disposisi</th>
                                        <td><?= $suratdisposisi->catatan_disposisi; ?></td>
                                    </tr>
                                    <tr>
                                        <th>File Surat</th>
                                        <td>
                                            <?php if (!empty($suratdisposisi->file_naskah)): ?>
                                                <iframe src="<?= base_url('/uploads/surat/' . $suratdisposisi->file_naskah); ?>" width="100%" height="500px"></iframe>
                                            <?php else: ?>
                                                <p>Tidak ada file yang diunggah.</p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning mt-3">
                            <i class="bi bi-exclamation-triangle-fill"></i> Data surat tidak ditemukan.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>