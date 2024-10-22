<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $subtitle; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $modul; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $subtitle; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="btn-group mb-1 float-end">
    <?php
    $session = session();
    $current_user = $session->get('id');
    ?>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url('/surat/surat-masuk'); ?>" class="btn btn-secondary me-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <?php if ($suratmasuk->status_naskah == 'Belum Ditindak lanjut'): ?>
            <div class="dropdown me-2">
                <button class="btn btn-warning dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bi bi-arrow-repeat"></i> Tindak Lanjut
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#balasModal">
                        <i class="bi bi-reply"></i> Saya balas
                    </a>
                </div>
            </div>
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#selesaikansuratModal" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-check-circle"></i> Selesaikan Surat
            </button>
        <?php else: ?>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0"><i class="bi bi-file-text-fill me-2"></i>Detail Surat Masuk</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5><strong>Dari: <?= $suratmasuk->nama_pengirim ?></strong></h5>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>Nomor Naskah</strong>
                        <p class="text-muted"><?= $suratmasuk->nomor_naskah ?></p>
                    </div>
                    <div class="col-md-4">
                        <strong>Tanggal Naskah</strong>
                        <p class="text-muted"><?= date('l, d F Y', strtotime($suratmasuk->tanggal_naskah)) ?></p>
                    </div>
                    <div class="col-md-4">
                        <strong>Tanggal Diterima</strong>
                        <p class="text-muted"><?= date('l, d F Y', strtotime($suratmasuk->tanggal_diterima)); ?></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Hal</strong>
                        <p class="text-muted"><?= $suratmasuk->hal ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Ringkasan</strong>
                        <p class="text-muted"><?= $suratmasuk->ringkasan ?></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Jenis Naskah</strong>
                        <p class="text-muted"><?= $suratmasuk->nama_jn ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Sifat Naskah</strong>
                        <p class="text-muted"><?= $suratmasuk->nama_sn ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <strong>Status</strong>
                        <?php if ($suratmasuk->status_naskah == 'Selesai'): ?>
                            <p class="text-success"><i class="bi bi-check-circle-fill me-2"></i>Selesai</p>
                        <?php elseif ($suratmasuk->status_naskah == 'Batal'): ?>
                            <p class="text-warning"><i class="bi bi-x-circle-fill me-2"></i>Batal</p>
                        <?php else: ?>
                            <p class="text-warning"><i class="bi bi-clock-fill me-2"></i>Belum Ditindak Lanjut</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="card-title mb-0"><i class="bi bi-file-earmark-pdf-fill me-2"></i>File Naskah</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($suratmasuk->file_naskah)): ?>
                    <div class="mb-3">
                        <iframe src="<?= base_url('/uploads/surat/' . $suratmasuk->file_naskah); ?>" width="100%" height="300px" class="rounded"></iframe>
                    </div>
                    <a href="<?= base_url('/uploads/surat/' . $suratmasuk->file_naskah); ?>" class="btn btn-primary btn-block" target="_blank">
                        <i class="bi bi-download me-2"></i>Unduh File Naskah
                    </a>
                <?php else: ?>
                    <p class="text-muted">Tidak ada file naskah yang diunggah.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0"><i class="bi bi-paperclip me-2"></i>File Lampiran</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($suratmasuk->file_lampiran)): ?>
                    <?php
                    $lampiran_files = explode(',', $suratmasuk->file_lampiran);
                    foreach ($lampiran_files as $index => $file):
                    ?>
                        <div class="mb-2">
                            <a href="<?= base_url('/uploads/lampiran/' . trim($file)); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-file-earmark me-2"></i>Lampiran <?= $index + 1 ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Tidak ada file lampiran yang diunggah.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php foreach ($suratmasuk as $data) { ?>
    <div class="modal fade" id="selesaikansuratModal" tabindex="-1" aria-labelledby="selesaikansuratModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selesaikansuratModalLabel">Konfirmasi Penyelesaian Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/surat/surat-masuk/penyelesaian/' . $suratmasuk->id); ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menyelesaikan surat ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Selesaikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>