<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href='<?= base_url('/surat/surat-masuk'); ?>' class="btn btn-primary">Kembali</a>
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
                            <th>Tanggal Surat Diterima</th>
                            <th>Pengirim</th>
                            <th>Hal</th>
                            <th>Catatan</th>
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
                                <td><?= date('l, d F Y', strtotime($disposisi->tanggal_diterima)) ?></td>
                                <td><?= $disposisi->nama_pengirim; ?></td>
                                <td><?= $disposisi->hal; ?></td>
                                <td><?= $disposisi->catatan_disposisi; ?></td>
                                <td>
                                    <a href="<?= base_url('/surat/disposisi/detail/' . $disposisi->id_surat); ?>" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
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