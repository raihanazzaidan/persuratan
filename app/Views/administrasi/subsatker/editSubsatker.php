<?php foreach ($getSubsatker as $data) { ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title; ?></h3>
                    <a href='<?= base_url('/administrasi/subsatker'); ?>' class="btn btn-primary">Kembali</a>
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
                <form action="<?= base_url('/administrasi/subsatker/editsubsatker/proseseditsubsatker/' . $data->id); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_subsatker">Kode Subsatker</label>
                                <input type="text" name="kode_subsatker" value="<?=($data->kode_subsatker); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_subsatker">Nama Subsatker</label>
                                <input type="text" name="nama_subsatker" value="<?=($data->nama_subsatker); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Induk Subsatker</label>
                                <select name="jenis_induk_subsatker" class="form-select">
                                    <?php foreach ($jis as $value => $jis) { ?>
                                        <option value="<?= $jis->id ?>" <?= $jis->id == $data->jenis_induk_subsatker ? 'selected':'' ?>><?= $jis->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option value="0" <?= $data->status == '0' ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    <option value="1" <?= $data->status == '1' ? 'selected' : ''; ?>>Aktif</option>
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
<?php } ?>