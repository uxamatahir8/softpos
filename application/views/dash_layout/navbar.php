<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                <i class="ti ti-sm"></i>
            </a>
        </div>
        <span class="fw-bold ms-3 badge bg-primary p-2"> Cash In Hand : <span id="current_cash"><?php echo cash_in_hand(); ?></span> PKR </span>
        <button type="button"  id="modal_btn" class="btn btn-sm btn-primary p-2"  data-bs-toggle="modal" data-bs-target="#modalCenter" class="cursor-pointer btn btn-primary btn-sm p-0">
            <i class="fa fa-plus"></i>
        </button>
        <div id="error_div" class="mx-5 mt-2 alert alert-danger alert-dismissible mb-2 d-none">
            <span id="error_message"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php  if($this->session->flashdata('message')){ ?>
            <div class="mx-5 mt-3 alert alert-<?= $this->session->flashdata('message_type'); ?> alert-dismissible">
                <span><?= $this->session->flashdata('message'); ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <img src="<?= ASSETS ?>assets/img/soft_icon.png" alt class="h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="<?= URL ?>change-password">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">Change Password</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= URL ?>Auth/logout">
                            <i class="ti ti-logout me-2 ti-sm"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->