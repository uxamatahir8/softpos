<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> <?= $title. " - ".  CLIENT. " | ". developer_details('company'); ?></title>
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
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= ASSETS ?>assets/vendor/libs/node-waves/node-waves.css" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="<?= ASSETS ?>assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= ASSETS ?>assets/js/config.js"></script>
    <script>
        var base = "<?= AJAXURL ?>";
    </script>
</head>
<?php
    ($this->session->userdata('user_id')) ? NULL : $this->session->set_flashdata("message_type","danger") . $this->session->set_flashdata('message','Login is Required to Access this page') . redirect(URL);
?>