<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $subtitle2; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= base_url(''); ?>'><?= env('appname'); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $modul; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $subtitle2; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="btn-group mb-1 float-end">
    <?php
    $session = session();
    $current_user = $session->get('nama_lengkap');
    ?>
    <div>
        <?php if ($current_user == $suratdisposisi->nama_tujuan): ?>
        <a href="<?= base_url('/surat/disposisi'); ?>" class="btn btn-primary me-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <?php else: ?>
        <a href="<?= base_url('/surat/historydisposisi'); ?>" class="btn btn-primary me-2">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <?php endif; ?>
    </div>

    <?php if ($suratdisposisi->status == '' && $current_user !== $suratdisposisi->nama_pengirim): ?>
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle me-2" type="button"
                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="bi bi-arrow-repeat"></i> Tindak Lanjut
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#balasModal">
                    <i class="bi bi-reply"></i> Saya balas
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#balaskanModal">
                    <i class="bi bi-reply-all"></i> Dibalaskan oleh
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#disposisiLanjutModal">
                    <i class="bi bi-arrows-angle-contract"></i> Disposisi / Koordinasi / Saran
                </a>
            </div>
        </div>
        <div>
            <button class="btn btn-success me-1" type="button" data-bs-toggle="modal" data-bs-target="#selesaikanDisposisiModal" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-check-circle"></i> Penyelesaian Disposisi
            </button>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0"><i class="bi bi-file-text-fill me-2"></i>Detail Surat Disposisi</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <br>
                        <h5><strong>Dari: <?= $suratdisposisi->nama_pengirim ?></strong></h5>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <strong>Nomor Naskah</strong>
                        <p class="text-muted"><?= $suratdisposisi->nomor_naskah ?></p>
                    </div>
                    <div class="col-md-4">
                        <strong>Tanggal Diterima</strong>
                        <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_diterima)) ?></p>
                    </div>
                    <div class="col-md-4">
                        <strong>Tanggal Disposisi</strong>
                        <p class="text-muted"><?= date('l, d F Y', strtotime($suratdisposisi->tanggal_disposisi)); ?></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Hal</strong>
                        <p class="text-muted"><?= $suratdisposisi->hal ?></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Ringkasan</strong>
                        <p class="text-muted"><?= $suratdisposisi->ringkasan ?></p>
                    </div>
                </div>


                <div class="row mb-4">
                    <?php if ($current_user == $suratdisposisi->nama_pengirim): ?>
                        <div class="col-md-6">
                            <strong>Nama penerima disposisi</strong>
                            <p class="text-muted"><?= $suratdisposisi->nama_tujuan ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <strong>Catatan Disposisi</strong>
                        <p class="text-muted"><?= $suratdisposisi->catatan_disposisi; ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <strong>Status</strong>
                        <?php if ($suratdisposisi->status == 'Y'): ?>
                            <p class="text-success"><i class="bi bi-check-circle-fill me-2"></i>Selesai</p>
                            <?php if (!empty($suratdisposisi->catatan_selesai)): ?>
                                <p class="text-muted"><strong>Catatan Penyelesaian:</strong> <?= $suratdisposisi->catatan_selesai; ?></p>
                            <?php else: ?>
                                <p class="text-muted">Tidak ada catatan penyelesaian</p>
                            <?php endif; ?>
                        <?php else: ?>
                            <p class="text-warning"><i class="bi bi-clock-fill me-2"></i>Belum ditindak lanjuti</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="card-title mb-0"><i class="bi bi-file-earmark-pdf-fill me-2"></i>File Naskah</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($suratdisposisi->file_naskah)): ?>
                    <div class="mb-3">
                        <iframe src="<?= base_url('/uploads/surat/' . $suratdisposisi->file_naskah); ?>" width="100%" height="300px" class="rounded"></iframe>
                    </div>
                    <a href="<?= base_url('/uploads/surat/' . $suratdisposisi->file_naskah); ?>" class="btn btn-primary btn-block" target="_blank">
                        <i class="bi bi-download me-2"></i>Unduh File Naskah
                    </a>
                <?php else: ?>
                    <p class="text-muted">Tidak ada file naskah yang diunggah.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h4 class="card-title mb-0"><i class="bi bi-paperclip me-2"></i>File Lampiran</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($suratdisposisi->file_lampiran)): ?>
                    <?php
                    $lampiran_files = explode(',', $suratdisposisi->file_lampiran);
                    foreach ($lampiran_files as $index => $file):
                    ?>
                        <div class="mb-2">
                            <br>
                            <a href="<?= base_url('/uploads/lampiran/' . trim($file)); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="bi bi-file-earmark me-2"></i>Lampiran <?= $index + 1 ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Tidak ada file lampiran yang diunggah.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php foreach ($suratdisposisi as $data) { ?>
    <div class="modal fade" id="selesaikanDisposisiModal" tabindex="-1" aria-labelledby="selesaikanDisposisiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selesaikanDisposisiModalLabel">Konfirmasi Penyelesaian Disposisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/surat/disposisi/penyelesaian/' . $suratdisposisi->id); ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menyelesaikan disposisi ini?</p>
                        <div class="form-group">
                            <label for="catatanPenyelesaian">Catatan Penyelesaian (Opsional)</label>
                            <textarea class="form-control" id="catatanPenyelesaian" name="catatan_selesai" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Selesaikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Balas -->
<div class="modal fade" id="balasModal" tabindex="-1" aria-labelledby="balasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balasModalLabel">Balas Disposisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/surat/disposisi/balas/' . $suratdisposisi->id); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="balasan">Balasan</label>
                        <textarea class="form-control" id="balasan" name="balasan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Balaskan -->
<div class="modal fade" id="balaskanModal" tabindex="-1" aria-labelledby="balaskanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balaskanModalLabel">Balaskan Disposisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/surat/disposisi/balaskan/' . $suratdisposisi->id); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tujuan_id">Dibalaskan kepada</label>
                        <select class="form-control" id="tujuan_id" name="tujuan_id" required>
                            <!-- Isi dengan daftar pengguna yang bisa menerima balasan -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Disposisi Lanjut -->
<div class="modal fade" id="disposisiLanjutModal" tabindex="-1" aria-labelledby="disposisiLanjutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disposisiLanjutModalLabel">Disposisi Lanjut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/surat/disposisi/lanjut/' . $suratdisposisi->id); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tujuan_id">Tujuan Disposisi</label>
                        <select class="form-control" id="tujuan_id" name="tujuan_id" required>
                            <!-- Isi dengan daftar pengguna yang bisa menerima disposisi -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_tindak_lanjut">Jenis Tindak Lanjut</label>
                        <select class="form-control" id="jenis_tindak_lanjut" name="jenis_tindak_lanjut" required>
                            <option value="disposisi">Disposisi</option>
                            <option value="koordinasi">Koordinasi</option>
                            <option value="saran">Saran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Kolom Komentar -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                <h4 class="card-title mb-0"><i class="bi bi-chat-dots me-2"></i>Komentar</h4>
            </div>
            <div class="card-body">
                <div id="chat-container" class="mb-4" style="max-height: 400px; overflow-y: auto;">
                    <?php if (!empty($komentar)): ?>
                        <?php foreach ($komentar as $k): ?>
                            <div class="chat-bubble mb-3 <?= ($k['user_id'] == session()->get('id')) ? 'text-end' : ''; ?>">
                                <div class="chat-message <?= ($k['user_id'] == session()->get('id')) ? 'bg-primary text-white' : 'bg-light'; ?> d-inline-block p-2 rounded">
                                    <strong><?= $k['nama_pengirim']; ?></strong>
                                    <p class="mb-0"><?= nl2br($k['komentar']); ?></p>
                                    <small class="text-muted"><?= date('d M H:i', strtotime($k['createdAt'])); ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <br>
                        <p class="text-muted">Belum ada komentar.</p>
                    <?php endif; ?>
                </div>

                <?php if ($current_user == $suratdisposisi->nama_tujuan || $current_user == $suratdisposisi->nama_pengirim): ?>
                    <form id="komentar-form" action="<?= base_url('/surat/disposisi/komentar'); ?>" method="post">
                        <div class="input-group">
                            <input type="hidden" name="disposisi_id" value="<?= $suratdisposisi->id; ?>">
                            <textarea class="form-control" id="komentar" name="komentar" rows="1" placeholder="Ketik komentar..." required></textarea>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatContainer = document.getElementById('chat-container');
    chatContainer.scrollTop = chatContainer.scrollHeight;

    const komentarForm = document.getElementById('komentar-form');
    if (komentarForm) {
        komentarForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    addNewComments(data.komentar);
                    komentarForm.reset();
                } else {
                    alert('Gagal menambahkan komentar');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menambahkan komentar');
            });
        });
    }

    let lastCommentId = null;

    function addNewComments(comments) {
        comments.forEach(k => {
            if (k.id !== lastCommentId) {
                const newComment = createCommentElement(k);
                chatContainer.appendChild(newComment);
                lastCommentId = k.id;
            }
        });
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    function createCommentElement(k) {
        const newComment = document.createElement('div');
        newComment.className = `chat-bubble mb-3 ${k.user_id == <?= json_encode(session()->get('id')) ?> ? 'text-end' : ''}`;
        newComment.innerHTML = `
            <div class="chat-message ${k.user_id == <?= json_encode(session()->get('id')) ?> ? 'bg-primary text-white' : 'bg-light'} d-inline-block p-2 rounded">
                <strong>${k.nama_pengirim}</strong>
                <p class="mb-0">${k.komentar}</p>
                <small class="text-muted">${formatDate(new Date(k.createdAt))}</small>
            </div>
        `;
        return newComment;
    }

    function formatDate(date) {
        const options = { day: '2-digit', month: 'short', hour: '2-digit', minute: '2-digit', hour12: false };
        return date.toLocaleDateString('id-ID', options).replace(',', '');
    }

    function updateKomentar() {
        fetch(`<?= base_url('/surat/disposisi/getkomentar/' . $suratdisposisi->id); ?>`)
            .then(response => response.json())
            .then(data => {
                addNewComments(data);
            })
            .catch(error => console.error('Error:', error));
    }

    setInterval(updateKomentar, 5000);
});
</script>

<style>
.chat-bubble {
    margin-bottom: 10px;
}
.chat-message {
    max-width: 70%;
    word-wrap: break-word;
}
</style>
