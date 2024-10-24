<?php
$session = session();
$userLevel = $session->get('level');
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $modul; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Surat Disposisi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Disposisi</th>
                            <th>Pengirim</th>
                            <th>Hal</th>
                            <th>Catatan</th>
                            <th>Status Surat</th>
                            <th>Tanggal Selesai</th>
                            <th>Catatan Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($suratdisposisi as $disposisi) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $disposisi->nomor_naskah; ?></td>
                                <td><?= date('l, d F Y', strtotime($disposisi->tanggal_disposisi)) ?></td>
                                <td><?= $disposisi->nama_pengirim; ?></td>
                                <td><?= $disposisi->hal; ?></td>
                                <td>
                                    <?php if (!empty($disposisi->catatan_disposisi)): ?>
                                        <?= $disposisi->catatan_disposisi; ?>
                                    <?php else: ?>
                                        (Tidak ada catatan)
                                    <?php endif; ?>
                                </td>
                                <td> <?php
                                        if ($disposisi->status == 'Y') {
                                            echo ('Selesai');
                                        } elseif ($disposisi->status == 'N') {
                                            echo ('Dibatalkan');
                                        } else {
                                            echo ('Perlu tindak lanjut');
                                        }
                                        ?>
                                </td>
                                <?php if (!empty($disposisi->tanggal_selesai)): ?>
                                    <td><?= date('l, d F Y', strtotime($disposisi->tanggal_selesai)) ?></td>
                                <?php elseif ($disposisi->status == 'N'): ?>
                                    <td>(Disposisi dibatalkan)</td>
                                <?php else: ?>
                                    <td>(Belum ditindak lanjuti)</td>
                                <?php endif; ?>
                                <td>
                                    <?php if ($disposisi->status == 'Y'): ?>
                                        <?php if (!empty($disposisi->catatan_selesai)): ?>
                                            <?= $disposisi->catatan_selesai; ?>
                                        <?php else: ?>
                                            (Tidak ada catatan)
                                        <?php endif; ?>
                                    <?php elseif ($disposisi->status == 'N'): ?>
                                        (Disposisi dibatalkan)
                                    <?php else: ?>
                                        (Belum ditindak lanjuti)
                                    <?php endif; ?>
                                </td>
                                <?php if ($disposisi->status != 'N'): ?>
                                    <td>
                                        <a href="<?= base_url('/surat/disposisi/detail/' . $disposisi->id_surat); ?>" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                <?php elseif ($disposisi->status == 'N'): ?>
                                    <td>Tidak ada aksi</td>
                                <?php endif; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/dist/assets/extensions/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/static/js/pages/datatables.js'); ?>"></script>