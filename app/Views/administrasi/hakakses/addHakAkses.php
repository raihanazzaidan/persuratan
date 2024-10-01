<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href='<?= base_url('/administrasi/hak-akses/'); ?>' class="btn btn-primary">Kembali</a>
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
            <h4 class="card-title">Add Hak Akses</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/administrasi/hak-akses/addhakakses/prosesaddhakakses/'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Hak Akses</label>
                            <input type="text" name="nama" class="form-control" placeholder="Hak Akses" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" class="form-select">
                                <option value="" disabled selected>-- Level --</option>
                                <option value="1">1 - Super Admin</option>
                                <option value="2">2 - Admin</option>
                                <option value="11">11 - Pegawai</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-select">
                                <option value="" disabled selected>-- Status --</option>
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
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