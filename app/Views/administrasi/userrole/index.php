<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href='<?= base_url('administrasi/user-role/adduserrole'); ?>' class="btn btn-primary">Tambah User Role</a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
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
            <h5>User Role</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>User</th>
                            <th>User Grup Level</th>
                            <th>Jabatan</th>
                            <th>Jabatan Grup</th>
                            <th>Tipe User</th>
                            <th>Subsatker</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($userrole as $usrl => $userrole) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $userrole->nama_lengkap; ?></td>
                                <td><?= $userrole->nama_hakakses; ?></td>
                                <td><?= $userrole->nama_jabatan; ?></td>
                                <td><?= $userrole->nama_grupjabatan; ?></td>
                                <td><?= $userrole->nama_tipeuser; ?></td>
                                <td><?= $userrole->nama_subsatker; ?></td>
                                <td>
                                    <a href='<?= base_url('/administrasi/user-role/edituserrole/' . $userrole->id); ?>' class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href='<?= base_url('/administrasi/user-role/hapususerrole/' . $userrole->id); ?>' class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
