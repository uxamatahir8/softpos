<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <?=($mode == 'edit') ? 'Update' : 'Add'; ?> Unit
                    <hr>
                </div>
                <div class="card-body">
                    <form id="add-unit" method="post"
                          action="<?= URL ?>home/<?=($mode == 'edit') ? 'updateProductUnit' : 'addProductUnit' ?>">
                        <?php
                        if ($mode == 'edit') {
                            ?>
                            <input type="hidden" name="unit_id"
                                   value="<?=($mode == 'edit') ? str_encode($unit->unit_id) : NULL; ?>" id="unit_id"
                                   class="form-control mb-2" placeholder="Category">
                        <?php } ?>
                        <select class="form-select mb-2" name="cat_id" id="cat_id">
                            <option value="">Select Category</option>
                            <?= dropDown($categories, ($mode == 'edit') ? str_encode($unit->id) : NULL); ?>
                        </select>
                        <input type="text" name="name"
                               value="<?=($mode == 'edit') ? $unit->name : NULL; ?>" id="name"
                               class="form-control mb-2" placeholder="Unit Name">
                        <input type="number" name="qty"
                               value="<?=($mode == 'edit') ? $unit->qty : NULL; ?>" required min="1" id="qty"
                               class="form-control mb-2" placeholder="Qty">
                        <hr>
                        <button class="btn btn-<?=($mode == 'edit') ? 'warning' : 'primary'; ?>" type="submit">
                            <?=($mode == 'edit') ? 'Update' : 'Add' ?> Unit
                        </button>
                        <?php
                        if ($mode == 'edit') { ?>
                            <a href="<?= URL ?>units"
                               class="btn btn-default">
                                Cancel
                            </a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Units
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="expense_table" class="table table-bordered table-striped-columns">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Unit Name</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($units) {
                                $count = 1;
                                foreach ($units as $unit) { ?>
                                    <tr>
                                        <td><?= $count; ?></td>
                                        <td>
                                            <?= $unit['name']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['cat_name']; ?>
                                        </td>
                                        <td>
                                            <?= $unit['qty']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL ?>units/edit/<?= str_encode($unit['unit_id']); ?>/"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm del_unit"
                                                    data-id="<?= str_encode($unit['unit_id']); ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $count++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Data Found</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->