<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title; ?></h3>
                <a href='<?= base_url('/subsatker/addsubsatker'); ?>' class="btn btn-primary">Tambah Subsatker</a>
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
            <h5>Daftar Subsatker</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Kode Subsatker</th>
                            <th>Nama Subsatker</th>
                            <th>Jenis Induk Subsatker</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;
                        foreach ($subsatker as $s) { ?>
                            <tr>
                                <td><?= $id++; ?></td>
                                <td><?= $s->kode_subsatker; ?></td>
                                <td><?= $s->nama_subsatker; ?></td>
                                <td><?= $s->jenis_induk_subsatker; ?></td>
                                <td>
                                    <?php 
                                        if($s->status == 1)
                                        {
                                            echo('Aktif');
                                        }elseif($s->status == 0)
                                        {
                                            echo('Tidak Aktif');
                                        }else
                                        {
                                            echo('Tidak Terdefinisi');
                                        }
                                    ?>
                                    <!-- <?= $s->status == 1 ? 'Aktif':'Tidak Aktif' ?> -->
                                </td>
                                <td>
                                    <a href='<?= base_url('/subsatker/editsubsatker/' . $s->id); ?>' class="btn btn-primary">Edit</a>
                                    <a href='<?= base_url('/subsatker/hapussubsatker/' . $s->id); ?>' class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
