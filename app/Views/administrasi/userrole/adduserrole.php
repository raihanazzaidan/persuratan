<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href="<?= base_url('/administrasi/userrole'); ?>" class="btn btn-primary me-2">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
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
        <div class="card-body">
            <form action="<?= base_url('administrasi/userrole/adduserrole/pilih-user') ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Pilih User</label>
                            <select name="pilihuser" class="form-select">
                                <option value="">-- Pilih User --</option>
                                <?php foreach ($user as $u => $user) { ?>
                                    <option value="<?= $user->id; ?>" <?= $user->id == session()->id_user ? 'selected' : '' ?>><?= $user->nama_lengkap; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <?php
                        if (empty(session()->id_user)) {
                            echo '<button type="submit" class="btn btn-primary w-100">Pilih</button>';
                        }
                        ?>
                    </div>
                    <div class="col-12">
                        <?php
                        if (!empty(session()->id_user)) {
                            echo '<a href=' . base_url('administrasi/user-role/adduserrole/hapus-pilihan-user') . ' class="btn btn-danger w-100">Reset</a>';
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add User Role</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/administrasi/user-role/adduserrole/prosesadduserrole/'); ?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">User ID</label>
                            <input type="text" name="usr_id" value="<?= session()->id_user; ?>" class="form-control" placeholder="User ID" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">User Nama</label>
                            <input type="text" name="nama_user" value="<?= session()->nama_user; ?>" class="form-control" placeholder="Nama User" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">User Email</label>
                            <input type="text" name="email_user" value="<?= session()->email_user; ?>" class="form-control" placeholder="Email User" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">User Grup Level</label>
                            <select name="usg_level" class="form-select">
                                <option value="">-- Pilih User Grup Level --</option>
                                <?php foreach ($hakakses as $value => $hakakses) { ?>
                                    <option value="<?= $hakakses->id ?>"><?= $hakakses->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="jabatan_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Jabatan --</option>
                                <?php foreach ($jabatan as $value => $jabatan) { ?>
                                    <option value="<?= $jabatan->id ?>"><?= $jabatan->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Grup Jabatan</label>
                            <select name="jabatan_grup_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Grup Jabatan --</option>
                                <?php foreach ($grupjabatan as $value => $grupjabatan) { ?>
                                    <option value="<?= $grupjabatan->id ?>"><?= $grupjabatan->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipe User</label>
                            <select name="usertipe_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Tipe User --</option>
                                <?php foreach ($tipeuser as $value => $tipeuser) { ?>
                                    <option value="<?= $tipeuser->id ?>"><?= $tipeuser->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subsatker</label>
                            <select name="subsatker_id" class="form-select">
                                <option value="" disabled selected>-- Pilih Subsatker --</option>
                                <?php foreach ($subsatker as $value => $subsatker) { ?>
                                    <option value="<?= $subsatker->id ?>"><?= $subsatker->nama_subsatker; ?></option>
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