<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $subtitle2; ?></h3>
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

<div class="btn-group mb-1 float-end">
    <div>
        <a href="<?= base_url('/surat/disposisi'); ?>" class="btn btn-primary me-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    <?php if ($suratdisposisi->status == ''): ?>
    <div class="dropdown">
        <button class="btn btn-danger dropdown-toggle me-2" type="button"
            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="bi bi-arrow-repeat"></i> Tindak Lanjut
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"><i class="bi bi-reply"></i> Saya balas</a>
            <a class="dropdown-item" href="#"><i class="bi bi-reply-all"></i> Dibalaskan oleh</a>
            <a class="dropdown-item" href="#"><i class="bi bi-arrows-angle-contract"></i> Disposisi / Koordinasi / Saran</a>
        </div>
    </div>
    <div>
        <button class="btn btn-success me-1" type="button" data-bs-toggle="modal" data-bs-target="#selesaikanDisposisiModal" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-check-circle"></i> Penyelesaian Disposisi
        </button>
    </div>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-body">
        <h6 class="mb-4">Naskah Disposisi dari:</h6>
        <div class="row mb-3">
            <div class="col-md-12">
                <h5><strong><?= $suratdisposisi->nama_pengirim ?></strong></h5>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Nomor Naskah</strong>
                <p class="text-muted"><?= $suratdisposisi->nomor_naskah ?></p>
            </div>
            <!-- <div class="col-md-4">
                <strong>Tanggal Naskah</strong>
                <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_naskah)) ?></p>
            </div> -->
            <div class="col-md-4">
                <strong>Tanggal Diterima</strong>
                <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_diterima)) ?></p>
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
        <div class="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <!-- Menambahkan ikon bi-file-text-fill sebelum teks -->
                    <button class="accordion-button bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="bi bi-file-text-fill me-2"></i> <!-- Ikon ditambahkan di sini -->
                        Detail Surat
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
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
                    </div>
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

<?php foreach ($suratdisposisi as $data) { ?>
<div class="modal fade" id="selesaikanDisposisiModal" tabindex="-1" aria-labelledby="selesaikanDisposisiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selesaikanDisposisiModalLabel">Konfirmasi Penyelesaian Disposisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/surat/disposisi/penyelesaian/' . $suratdisposisi->id); ?>" method="post">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menyelesaikan disposisi ini?</p>
                    <div class="form-group">
                        <label for="catatanPenyelesaian">Catatan Penyelesaian (Opsional)</label>
                        <textarea class="form-control" id="catatanPenyelesaian" name="catatan_selesai" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Selesaikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>