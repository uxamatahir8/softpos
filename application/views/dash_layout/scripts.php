<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= ASSETS ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= ASSETS ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?= ASSETS ?>assets/vendor/libs/hammer/hammer.js"></script>
<script src="<?= ASSETS ?>assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="<?= ASSETS ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

<!-- Main JS -->
<script src="<?= ASSETS ?>assets/js/main.js"></script>
<script src="<?= ASSETS ?>assets/js/ui-modals.js"></script>
<script src="<?= ASSETS ?>assets/js/custom.js"></script>
<!-- Page JS -->


<?php
$cash_in_hand = cash_in_hand();
if($cash_in_hand < 1){ ?>
    <script>
        cash_pop_up();
    </script>
    <?php
}
?>

<?php
if(isset($param) && !empty($param)){
    if($param == 'update_qty'){
        if($main_content = 'dashboard/manage-product'){
            ?>
        <script>
            $("#total_qty").focus();
        </script>
    <?php
            }
    }
}
?>

