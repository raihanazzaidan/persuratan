<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li
            class="sidebar-item ">
            <a href="<?= base_url('/'); ?>" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                <span>User</span>
            </a>


        </li>

        <li
            class="sidebar-item has-sub">
            <a href="<?= base_url('subsatker'); ?>" class='sidebar-link'>
                <i class="bi bi-grid"></i>
                <span>Subsatker</span>
            </a>
            <ul class="submenu ">

                <li class="submenu-item  ">
                    <a href="<?= base_url('subsatker'); ?>" class="submenu-link">Subsatker</a>
                </li>

                <li class="submenu-item  ">
                    <a href="<?= base_url('jenis-induk-subsatker'); ?>" class="submenu-link">Induk Subsatker</a>

                </li>
            </ul>
        </li>
    </ul>
</div>