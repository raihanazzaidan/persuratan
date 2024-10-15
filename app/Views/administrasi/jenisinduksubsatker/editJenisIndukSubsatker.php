<?php foreach ($getJenisIndukSubsatker as $data) { ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title; ?></h3>
                    <a href="<?= base_url('/administrasi/jenis-induk-subsatker'); ?>" class="btn btn-primary me-2">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $submodule; ?></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $subtitle2; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="<?= base_url('administrasi/jenis-induk-subsatker/editjenisinduksubsatker/proseseditjenisinduksubsatker/' . $data->id); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="nama">Nama Induk Subsatker</label>
                            <input type="text" name="nama" value="<?= htmlspecialchars($data->nama); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-select">
                                <option value="0" <?= $data->status == '0' ? 'selected' : ''; ?>>Tidak Aktif</option>
                                <option value="1" <?= $data->status == '1' ? 'selected' : ''; ?>>Aktif</option>
                            </select>
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