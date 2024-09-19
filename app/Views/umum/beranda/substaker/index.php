<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <p class="text-subtitle text-muted">The default layout.</p>
                <a href='<?= base_url('/beranda/adduser'); ?>' class="btn btn-primary">Tambah Substaker</a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $submodule; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>User</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>NIP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($user as $u) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $u->nama_lengkap; ?></td>
                                <td><?= $u->email; ?></td>
                                <td><?= $u->jenis_kelamin; ?></td>
                                <td><?= $u->user_nip; ?></td>
                                <td><?= $u->status_user; ?></td>
                                <td>
                                    <a href='<?= base_url('/beranda/edit-data/' . $u->id); ?>' class="btn btn-primary">Edit</a>
                                    <a href='<?= base_url('/beranda/hapus-data/' . $u->id); ?>' class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
