<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= URL ?>" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold"><?= CLIENT ?></span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item <?= ($main_content=='dashboard/index') ? 'active' : NULL; ?>">
            <a href="<?= URL ?>dashboard" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 1">Dashboard</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->