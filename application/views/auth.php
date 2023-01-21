<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= ASSETS ?>assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title><?= $title. " - ".  CLIENT. " | ". developer_details('company'); ?></title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= ASSETS ?>assets/img/soft_icon.png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <!-- Icons -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/fonts/flag-icons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?= ASSETS ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?= ASSETS ?>assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= ASSETS ?>assets/js/config.js"></script>
</head>
<body>
<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-4 mt-2">
                        <a href="<?= URL ?>" class="app-brand-link gap-2">
                            <img src="<?= ASSETS ?>assets/img/soft_logo.png" width="200">
                        </a>
                    </div>

                    <div id="error_div" class="alert alert-danger alert-dismissible mb-2 d-none">
                        <span id="error_message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php if($this->session->flashdata('message')){ ?>
                        <div class="alert alert-<?= $this->session->flashdata('message_type'); ?>">
                             <span><?= $this->session->flashdata('message'); ?></span>
                        </div>
                    <?php } ?>
                    <form id="formAuthentication" class="mb-3" action="<?= URL ?>Auth/userLogin" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="email" name="username" placeholder="Enter your username" autofocus/>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label> What is <span id="first_number"> <?= random_number(1) ?> </span> plus <span id="second_number"> <?= random_number(2) ?> </span> ? </label>
                            <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter Your Answer" autofocus/>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<!-- / Content -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= ASSETS ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= ASSETS ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/hammer/hammer.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/i18n/i18n.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?= ASSETS ?>assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="<?= ASSETS ?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<!-- Main JS -->

<script src="<?= ASSETS ?>assets/js/main.js"></script>
<script src="<?= ASSETS ?>assets/js/custom.js"></script>

</body>
</html>
