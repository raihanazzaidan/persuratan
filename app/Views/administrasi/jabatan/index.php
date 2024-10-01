<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href='<?= base_url('administrasi/jabatan/addjabatan'); ?>' class="btn btn-primary">Tambah Jabatan</a>
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
            <h5>Jabatan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Jabatan</th>
                            <th>Subsatker</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($jabatan as $j) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $j->nama; ?></td>
                                <td><?= $j->nama_subsatker; ?></td>
                                <td>
                                    <?php 
                                        if($j->status == 1)
                                        {
                                            echo('Aktif');
                                        }elseif($j->status == 0)
                                        {
                                            echo('Tidak Aktif');
                                        }else
                                        {
                                            echo('Tidak Terdefinisi');
                                        }
                                    ?>
                                    <!-- <?= $j->status == 1 ? 'Aktif':'Tidak Aktif' ?> -->
                                </td>
                                <td>
                                    <a href='<?= base_url('/administrasi/jabatan/editjabatan/' . $j->id); ?>' class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href='<?= base_url('/administrasi/jabatan/hapusjabatan/' . $j->id); ?>' class="btn btn-danger">
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
