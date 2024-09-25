<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item has-sub <?php if (service('uri')->getSegment(1) == 'administrasi') echo 'active'; ?>">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid"></i>
                <span>Administrasi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item <?php if(strpos(service('uri')->getPath(), 'administrasi/subsatker') !== false) echo 'active';?>">
                    <a href="<?= base_url('administrasi/subsatker'); ?>" class="submenu-link">Subsatker</a>
                </li>
                <li class="submenu-item <?php if(strpos(service('uri')->getPath(), 'administrasi/jenis-induk-subsatker') !== false) echo 'active';?>">
                    <a href="<?= base_url('administrasi/jenis-induk-subsatker'); ?>" class="submenu-link">Induk Subsatker</a>
                </li>
                <li class="submenu-item <?php if(strpos(service('uri')->getPath(), 'administrasi/user') !== false) echo 'active';?>">
                    <a href="<?= base_url('administrasi/user'); ?>" class="submenu-link">User</a>
                </li>
                <li class="submenu-item <?php if(strpos(service('uri')->getPath(), 'administrasi/tipe-user') !== false) echo 'active';?>">
                    <a href="<?= base_url('administrasi/tipe-user'); ?>" class="submenu-link">Tipe User</a>
                </li>
                <li class="submenu-item <?php if(strpos(service('uri')->getPath(), 'administrasi/user-role') !== false) echo 'active';?>">
                    <a href="<?= base_url('administrasi/user-role'); ?>" class="submenu-link">User Role</a>
                </li>
            </ul>
        </li>
    </ul>
</div>