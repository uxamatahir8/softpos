<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= ASSETS ?>assets/"
    data-template="vertical-menu-template-no-customizer-starter"
>
<?php $this->load->view('dash_layout/head'); ?>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?php $this->load->view('dash_layout/sidebar') ?>
        <!-- Layout container -->
        <div class="layout-page">
            <?php $this->load->view("dash_layout/navbar"); ?>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <?php $this->load->view($main_content); ?>
                <?php $this->load->view('dash_layout/footer'); ?>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
<?php  $this->load->view('dash_layout/scripts'); ?>
</body>
</html>
