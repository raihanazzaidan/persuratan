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
            <h5>Surat Masuk</h5>
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
                                <td><?= $surat->nama_lengkap; ?></td>
                                <td>
                                    <a href="<?= base_url('/surat/registrasi-surat-masuk/editsuratmasuk/' . $surat->id); ?>" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="<?= base_url('/surat/registrasi-surat-masuk/hapussuratmasuk/' . $surat->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus surat ini?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
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
