<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(''); ?>"><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $modul; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar History Surat Disposisi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Hal</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Disposisi</th>
                                        <th>Status</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($historyDisposisi as $id => $disposisi): ?>
                                        <tr>
                                            <td><?= $id + 1 ?></td>
                                            <td><?= $disposisi->nomor_naskah ?></td>
                                            <td><?= $disposisi->hal ?></td>
                                            <td><?= $disposisi->nama_tujuan ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($disposisi->tanggal_disposisi)) ?></td>
                                            <td>
                                                <?php
                                                if ($disposisi->status == 'Y') {
                                                    echo 'Selesai';
                                                } elseif ($disposisi->status == '') {
                                                    echo 'Belum ditindak lanjut';
                                                } elseif ($disposisi->status == 'N') {
                                                    echo 'Dibatalkan';
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            if (!empty($disposisi->catatan_selesai)): ?>
                                                <td><?= $disposisi->catatan_selesai ?></td>
                                            <?php elseif ($disposisi->status == 'N'): ?>
                                                <td>(Disposisi dibatalkan)</td>
                                            <?php else: ?>
                                                <td>Tidak ada catatan</td>
                                            <?php endif; ?>

                                            <?php if ($disposisi->status != 'N'): ?>
                                                <td>
                                                    <a href="<?= base_url('surat/disposisi/detail/' . $disposisi->id_surat) ?>" class="btn btn-sm btn-info">
                                                        <i class="bi bi-eye"></i> Detail
                                                    </a>
                                                </td>
                                            <?php elseif ($disposisi->status == 'N'): ?>
                                                <td>Tidak ada aksi</td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/dist/assets/extensions/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/static/js/pages/datatables.js'); ?>"></script>