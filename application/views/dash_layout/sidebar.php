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
        <li class="menu-item <?= ($main_content=='dashboard/products' ||
            $main_content == 'dashboard/manage-product') ? 'active' : NULL; ?>">
            <a href="<?= URL ?>products" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Page 1">Products</div>
            </a>
        </li>
        <li class="menu-item <?= ($main_content=='dashboard/expenses') ? 'active' : NULL; ?>">
            <a href="<?= URL ?>expenses" class="menu-link">
                <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
                <div data-i18n="Page 1">Expense Manager</div>
            </a>
        </li>
        <li class="menu-item <?= ($main_content=='dashboard/cash-register') ? 'active' : NULL; ?>">
            <a href="<?= URL ?>cash-register" class="menu-link">
                <i class="menu-icon tf-icons ti ti-registered"></i>
                <div data-i18n="Page 1">Cash Register</div>
            </a>
        </li>
        <li class="menu-item <?= ($main_content == 'dashboard/expense-types' ||
                                    $main_content == 'dashboard/change-password' ||
                                    $main_content == 'dashboard/categories' ||
                                    $main_content == 'dashboard/units' ||
                                    $main_content == 'dashboard/brands') ? 'active open' : NULL ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Dashboards">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= ($main_content == 'dashboard/categories') ? 'active' : NULL ?>">
                    <a href="<?= URL ?>categories" class="menu-link">
                        <div data-i18n="Analytics">Categories</div>
                    </a>
                </li>
                <li class="menu-item <?= ($main_content == 'dashboard/units') ? 'active' : NULL ?>">
                    <a href="<?= URL ?>units" class="menu-link">
                        <div data-i18n="Dashboards">Units</div>
                    </a>
                </li>


                <li class="menu-item <?= ($main_content == 'dashboard/brands') ? 'active' : NULL ?>">
                    <a href="<?= URL ?>brands" class="menu-link">
                        <div data-i18n="Dashboards">Brands</div>
                    </a>
                </li>

                <li class="menu-item <?= ($main_content == 'dashboard/expense-types') ? 'active' : NULL ?>">
                    <a href="<?= URL ?>expense-type" class="menu-link">
                        <div data-i18n="Dashboards">Expense Types</div>
                    </a>
                </li>

                <li class="menu-item <?= ($main_content == 'dashboard/change-password') ? 'active' : NULL ?>">
                    <a href="<?= URL ?>change-password" class="menu-link">
                        <div data-i18n="Analytics">Change Password</div>
                    </a>
                </li>


            </ul>
        </li>

    </ul>
</aside>
<!-- / Menu -->