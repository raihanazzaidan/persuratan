<?php foreach ($getDisposisi as $data) { ?>
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
                <h4 class="card-title">Disposisi Surat</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/surat/surat-masuk/disposisi/prosesdisposisi/' . $data->id); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <input type="hidden" name="id_surat" value="<?= $data->id; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tujuan Disposisi</label>
                                <select name="tujuan_id" class="form-select">
                                    <option value="">-- Pilih User Tujuan --</option>
                                    <?php foreach ($user as $value => $user) { ?>
                                        <option value="<?= $user->id ?>"><?= $user->nama_lengkap; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label">Catatan</label>
                                <textarea class="form-control" name="catatan_disposisi" rows="4" placeholder="Masukkan catatan disposisi..." required></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </section>
<?php } ?>