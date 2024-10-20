<div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <img
                    src="<?= base_url('assets/img/uinma.png'); ?>"
                    class="rounded-circle" width="50px">
            </span>
        </div>
        <span class="form-control text-center" style="font-size:13px; display:flex; align-items:center;">
            <div style="margin: auto;">
                <?= session()->nama_lengkap; ?>
            </div>
        </span>
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Akses</span>
        </div>
        <input class="form-control" type="text" value="<?= session()->nama_hakakses; ?>" disabled>
    </div>
    <div class="input-group align-items-center">
        <a href='<?= base_url('/logout'); ?>' id="logoutButton" class="btn btn-danger btn-block">Logout</a>
    </div>
</div>
<hr>
<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item <?php if (service('uri')->getSegment(1) == 'beranda') echo 'active'; ?>">
            <a href="<?= base_url('/beranda'); ?>" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span>Beranda</span>
            </a>
        </li>
        <?php if (session()->level == 1): ?>
            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'administrasi') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid"></i>
                    <span>Administrasi</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/jenis-induk-subsatker') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/jenis-induk-subsatker'); ?>" class="submenu-link">Jenis Induk Subsatker</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/subsatker') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/subsatker'); ?>" class="submenu-link">Subsatker</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/user') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/user'); ?>" class="submenu-link">User</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/tipe-user') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/tipe-user'); ?>" class="submenu-link">Tipe User</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/hak-akses') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/hak-akses'); ?>" class="submenu-link">Hak Akses</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/grup-jabatan') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/grup-jabatan'); ?>" class="submenu-link">Grup Jabatan</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/jabatan') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/jabatan'); ?>" class="submenu-link">Jabatan</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/role') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/role'); ?>" class="submenu-link">User Role</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'surat') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-folder"></i>
                    <span>Surat</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/jenis-naskah') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/jenis-naskah'); ?>" class="submenu-link">Jenis Naskah</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/sifat-naskah') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/sifat-naskah'); ?>" class="submenu-link">Sifat Naskah</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/registrasi-surat-masuk') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/registrasi-surat-masuk'); ?>" class="submenu-link">Registrasi Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/surat-masuk') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/surat-masuk'); ?>" class="submenu-link">Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/historynaskahkeluar') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/historynaskahkeluar'); ?>" class="submenu-link"> History Surat Keluar</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/disposisi') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/disposisi'); ?>" class="submenu-link"> Surat Disposisi</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/historydisposisi') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/historydisposisi'); ?>" class="submenu-link">History Surat Disposisi</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (session()->level == 2): ?>
            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'administrasi') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid"></i>
                    <span>Administrasi</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/jenis-induk-subsatker') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/jenis-induk-subsatker'); ?>" class="submenu-link">Satuan Kerja</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/subsatker') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/subsatker'); ?>" class="submenu-link">Subsatker</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/user') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/user'); ?>" class="submenu-link">User</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/tipe-user') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/tipe-user'); ?>" class="submenu-link">Tipe User</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/hak-akses') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/hak-akses'); ?>" class="submenu-link">Hak Akses</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/grup-jabatan') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/grup-jabatan'); ?>" class="submenu-link">Grup Jabatan</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/jabatan') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/jabatan'); ?>" class="submenu-link">Jabatan</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/userrole') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/userrole'); ?>" class="submenu-link">User Role</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'surat') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-folder"></i>
                    <span>Surat</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/jenis-naskah') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/jenis-naskah'); ?>" class="submenu-link">Jenis Naskah</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/sifat-naskah') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/sifat-naskah'); ?>" class="submenu-link">Sifat Naskah</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/registrasi-surat-masuk') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/registrasi-surat-masuk'); ?>" class="submenu-link">Registrasi Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/surat-masuk') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/surat-masuk'); ?>" class="submenu-link">Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/historynaskahkeluar') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/historynaskahkeluar'); ?>" class="submenu-link"> History Surat Keluar</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/disposisi') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/disposisi'); ?>" class="submenu-link"> Surat Disposisi</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/historydisposisi') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/historydisposisi'); ?>" class="submenu-link">History Surat Disposisi</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (session()->level == 11): ?>
            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'surat') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-folder"></i>
                    <span>Surat</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/surat-masuk') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/surat-masuk'); ?>" class="submenu-link">Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'surat/disposisi') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('surat/disposisi'); ?>" class="submenu-link">Surat Disposisi</a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</div>

<script>
    document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault();

        var confirmation = confirm('Anda yakin ingin logout?');

        if (confirmation) {
            window.location.href = this.getAttribute('href');
        }
    });
</script>