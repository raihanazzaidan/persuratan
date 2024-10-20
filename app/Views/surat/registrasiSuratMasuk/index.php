<?php
$session = session();
$current_user = $session->get('id');
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href="<?= base_url('surat/registrasi-surat-masuk/addsuratmasuk'); ?>" class="btn btn-primary">Upload Surat Masuk</a>
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
            <h5>Registrasi Surat Masuk</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengirim</th>
                            <th>Jabatan Pengirim</th>
                            <th>Instansi Pengirim</th>
                            <th>Jenis Naskah</th>
                            <th>Sifat Naskah</th>
                            <th>Nomor Naskah</th>
                            <th>Tanggal Naskah</th>
                            <th>Tanggal Diterima</th>
                            <th>Hal</th>
                            <th>Ringkasan</th>
                            <th>File Naskah</th>
                            <th>File Lampiran</th>
                            <th>Tujuan Subsatker</th>
                            <th>Tujuan Personal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($suratmasuk as $surat) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $surat->nama_pengirim; ?></td>
                                <td><?= $surat->jabatan_pengirim; ?></td>
                                <td><?= $surat->instansi_pengirim; ?></td>
                                <td><?= $surat->jenis_naskah; ?></td>
                                <td><?= $surat->sifat_naskah; ?></td>
                                <td><?= $surat->nomor_naskah; ?></td>
                                <td><?= $surat->tanggal_naskah; ?></td>
                                <td><?= $surat->tanggal_diterima; ?></td>
                                <td><?= $surat->hal; ?></td>
                                <td><?= $surat->ringkasan; ?></td>
                                <!-- Preview File Naskah -->
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
                                <td><?= $surat->nama_subsatker; ?></td>
                                <td><?= $surat->tujuan_personal; ?></td>
                                <td>
                                    <a href="<?= base_url('/surat/registrasi-surat-masuk/editsuratmasuk/' . $surat->id); ?>" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <?php if ($current_user == $surat-> user_register): ?>
                                        <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#disposisiModal" aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-arrow-repeat"></i> Disposisi
                                        </button>
                                    <?php endif; ?>
                                    <!-- <a href="<?= base_url('/surat/registrasi-surat-masuk/hapussuratmasuk/' . $surat->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus surat ini?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($suratmasuk as $data) { ?>
    <div class="modal fade" id="disposisiModal" tabindex="-1" aria-labelledby="disposisiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="disposisiModalLabel">Disposisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/surat/surat-masuk/disposisi/prosesdisposisi/' . $data->id); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_surat" value="<?= $data->id; ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Tujuan</label>
                            <select name="tujuan_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih User yang Dituju --</option>
                                <?php foreach ($user as $u) { ?>
                                    <option value="<?= $u->id ?>" <?= $u->id == $data->tujuan_personal ? 'selected' : ''; ?>><?= $u->nama_lengkap; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan_disposisi">Catatan Disposisi Baru</label>
                            <textarea class="form-control" id="catatan_disposisi" name="catatan_disposisi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Pindahkan Disposisi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script src="<?= base_url('assets/dist/assets/extensions/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/assets/static/js/pages/datatables.js'); ?>"></script>