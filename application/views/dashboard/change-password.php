<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">

                    <form id="change-password" method="post" action="<?= URL ?>Auth/updatePassword">
                        <div class="form-row">
                            <input type="password" id="current_password" name="current_password" class="form-control mb-2" placeholder="Current Password">
                            <input type="password" id="new_password" name="new_password" class="form-control mb-2" placeholder="New Password">
                            <input type="password" id="cnew_password" name="cnew_password" class="form-control mb-2" placeholder="Confirm New Password">
                            <button type="submit" class="btn btn-warning">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->