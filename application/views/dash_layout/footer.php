<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                <?= CLIENT ?> ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , Developed by <a href="<?= developer_details('company_url'); ?>" target="_blank" class="fw-semibold"> <?= developer_details('company') ?> </a>
            </div>
            <div>
                <p class="footer-link me-4">
                   All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->

<?php
    $current_cash = cash_in_hand();

?>

<div class="modal fade" data-bs-backdrop="static" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Cash</h5>
                <?php if($current_cash != 0){ ?>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <?php } ?>
            </div>
            <div class="modal-body">
                <div class="alert alert-<?= ($current_cash == 0) ? 'warning' : 'primary' ?> mb-2">
                <?= ($current_cash == 0) ? 'You have '. $current_cash. 'PKR balance, Please Add Cash For Keep Using Software' : 'Current Cash In Hand: '.$current_cash .' PKR'; ?>
                </div>
                <input type="number" min="1" class="form-control mb-2" id="add_cash_val">
                <button type="button" id="add_cash" class="btn btn-<?= ($current_cash == 0) ? 'primary' : 'warning' ?>"><?= ($current_cash == 0) ? 'Add' : 'Update' ?> Cash</button>
            </div>

        </div>
    </div>
</div>


