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
                <p class="footer-link me-4">All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->