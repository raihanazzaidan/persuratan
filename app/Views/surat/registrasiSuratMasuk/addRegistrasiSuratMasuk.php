<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <!-- <p class="text-subtitle text-muted">Tambahkan user baru</p> -->
                <a href='<?= base_url('/surat/registrasi-surat-masuk'); ?>' class="btn btn-primary">Kembali</a>
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

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Upload Surat Masuk</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('surat/registrasi-surat-masuk/addsuratmasuk/prosesaddsuratmasuk/'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Pengirim</label>
                            <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama pengirim surat" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jabatan Pengirim</label>
                            <input type="text" name="jabatan_pengirim" class="form-control" placeholder="Jabatan pengirim" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Instansi Pengirim</label>
                            <input type="text" name="instansi_pengirim" class="form-control" placeholder="Instansi pengirim" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jenis Naskah</label>
                            <select name="jenis_naskah_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Jenis Induk Subsatker --</option>
                                <?php foreach ($jenisnaskah as $value => $jenisnaskah) { ?>
                                    <option value="<?= $jenisnaskah->id ?>"><?= $jenisnaskah->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Sifat Naskah</label>
                            <select name="sifat_naskah_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Sifat Induk Subsatker --</option>
                                <?php foreach ($sifatnaskah as $value => $sifatnaskah) { ?>
                                    <option value="<?= $sifatnaskah->id ?>"><?= $sifatnaskah->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nomor Naskah</label>
                            <input type="text" name="nomor_naskah" class="form-control" placeholder="Nomor Naskah" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Tanggal Naskah</label>
                            <input type="date" name="tanggal_naskah" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Hal</label>
                            <textarea class="form-control" name="hal" rows="4" placeholder="Masukkan hal surat..." required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Ringkasan</label>
                            <textarea class="form-control" name="ringkasan" rows="4" placeholder="Masukkan ringkasan surat..." required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Upload Surat (PDF)</label>
                            <input class="form-control" type="file" name="file_naskah" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Upload Lampiran Surat</label>
                            <input class="form-control" type="file" name="file_lampiran" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tujuan Subsatker</label>
                            <select name="tujuan_subsatker_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Subsatker yang Dituju --</option>
                                <?php foreach ($subsatker as $value => $subsatker) { ?>
                                    <option value="<?= $subsatker->id ?>"><?= $subsatker->nama_subsatker; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tujuan Personal</label>
                            <select name="tujuan_personal_id" class="form-select">
                                <option value="" disabled selected>-- Pilih User yang Dituju --</option>
                                <?php foreach ($user as $value => $user) { ?>
                                    <option value="<?= $user->id ?>"><?= $user->nama_lengkap; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>