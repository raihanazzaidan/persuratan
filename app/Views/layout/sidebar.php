<div class="logout text-center my-3">
    <a href='<?= base_url('/logout'); ?>' class="btn btn-danger w-75">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>
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
                        <a href="<?= base_url('administrasi/jenis-induk-subsatker'); ?>" class="submenu-link">Induk Subsatker</a>
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
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/user-role') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/user-role'); ?>" class="submenu-link">User Role</a>
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
                        <a href="<?= base_url('surat/registrasi-surat-masuk'); ?>" class="submenu-link">Surat Masuk</a>
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
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/user-role') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/user-role'); ?>" class="submenu-link">User Role</a>
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
                </ul>
            </li>
        <?php endif; ?>
        
        <?php if (session()->level == 11): ?>
            <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'administrasi') echo 'active'; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-grid"></i>
                    <span>Administrasi</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/jenis-induk-subsatker') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/jenis-induk-subsatker'); ?>" class="submenu-link">Induk Subsatker</a>
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
                    <li class="submenu-item <?php if (strpos(service('uri')->getPath(), 'administrasi/user-role') !== false) echo 'active'; ?>">
                        <a href="<?= base_url('administrasi/user-role'); ?>" class="submenu-link">User Role</a>
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
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</div>