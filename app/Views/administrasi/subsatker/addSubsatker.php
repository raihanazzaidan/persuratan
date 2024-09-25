<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <!-- <p class="text-subtitle text-muted">Tambahkan user baru</p> -->
                <a href='<?= base_url('/administrasi/subsatker'); ?>' class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $submodule; ?></li>
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
            <h4 class="card-title">Tambah Subsatker</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('administrasi/subsatker/addsubsatker/prosesaddsubsatker'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_subsatker">Kode Subsatker</label>
                            <input type="text" name="kode_subsatker" class="form-control" placeholder="Kode Subsatker" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_subsatker">Nama Subsatker</label>
                            <input type="nama_subsatker" name="nama_subsatker" class="form-control" placeholder="Nama Subsatker" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jenis Induk Subsatker</label>
                            <select name="jenis_induk_subsatker" class="form-select">
                                <?php foreach ($jis as $value => $jis) { ?>
                                    <option value="<?= $jis->id ?>"><?= $jis->nama; ?></option>
                                <?php } ?>
                            </select>
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
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>