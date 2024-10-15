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
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>History Surat Keluar</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="thead">
                        <tr>
                            <th>No.</th>
                            <th>Hal</th>
                            <th>Jenis Naskah</th>
                            <th>Sifat Naskah</th>
                            <th>Nama Penerima</th>
                            <th>Nomor Naskah</th>
                            <th>Status Surat</th>
                            <th>Tanggal Naskah</th>
                            <th>File Surat</th>
                            <th>File Lampiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($naskahkeluar as $surat) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $surat->hal; ?></td>
                                <td><?= $surat->nama_jn; ?></td>
                                <td><?= $surat->nama_sn; ?></td>
                                <td><?= $surat->nama_penerima; ?></td>
                                <td><?= $surat->nomor_naskah; ?></td>
                                <td><?= $surat->status; ?></td>
                                <td><?= $surat->tanggal_naskah; ?></td>
                                <td>
                                    <?php if ($surat->file_naskah) { ?>
                                        <a href="<?= base_url('uploads/surat/' . $surat->file_naskah); ?>" target="_blank" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-danger">Tidak ada file</span>
                                    <?php } ?>
                                </td>
                                <!-- Preview File Lampiran -->
                                <td>
                                    <?php if ($surat->file_lampiran) { ?>
                                        <a href="<?= base_url('uploads/lampiran/' . $surat->file_lampiran); ?>" target="_blank" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-danger">Tidak ada lampiran</span>
                                    <?php } ?>
                                </td>
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
