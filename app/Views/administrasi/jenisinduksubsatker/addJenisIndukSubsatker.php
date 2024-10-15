<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <!-- <p class="text-subtitle text-muted">Tambahkan user baru</p> -->
                <a href="<?= base_url('/administrasi/jenis-induk-subsatker'); ?>" class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
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
            <h4 class="card-title">Tambah Jenis Induk Subsatker</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/administrasi/jenis-induk-subsatker/addjenisinduksubsatker/prosesaddjenisinduksubsatker'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Subsatker</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Jenis Induk Subsatker" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-select">
                                <option value="0">Tidak Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_induk_subsatker">Jenis Induk Subsatker</label>
                            <input type="text" name="jenis_induk_subsatker" class="form-control" placeholder="Jenis Induk Subsatker" required>
                        </div>
                    </div> -->


                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>