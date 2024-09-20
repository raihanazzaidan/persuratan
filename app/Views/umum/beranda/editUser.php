<?php foreach ($getdata as $data) { ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title; ?></h3>
                    <a href='<?= base_url('/'); ?>' class="btn btn-primary">Kembali</a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
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
                <form action="<?= base_url('/beranda/edituser/prosesedituser/' . $data->id); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($data->nama_lengkap); ?>" class="form-control">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?= htmlspecialchars($data->email); ?>" class="form-control">
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?= htmlspecialchars($data->jenis_kelamin); ?>" class="form-control">
                            </div>
                        </div>

                        <!-- NIP -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_nip">NIP</label>
                                <input type="text" id="user_nip" name="user_nip" value="<?= htmlspecialchars($data->user_nip); ?>" class="form-control">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status User</label><br>
                                <label>
                                    <input type="radio" name="status_user" value="Y" <?= $data->status_user == 'Y' ? 'checked' : ''; ?>> Y
                                </label><br>
                                <label>
                                    <input type="radio" name="status_user" value="N" <?= $data->status_user == 'N' ? 'checked' : ''; ?>> N
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php } ?>
