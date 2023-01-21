<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <?=($mode == 'edit') ? 'Update' : 'Add'; ?> Expense Type
                    <hr>
                </div>
                <div class="card-body">
                    <form id="add-expense-type" method="post"
                        action="<?= URL ?>home/<?=($mode == 'edit') ? 'updateExpenseType' : 'addExpenseType' ?>">
                        <?php
                        if ($mode == 'edit') {
                            ?>
                            <input type="hidden" name="expense_id"
                                value="<?=($mode == 'edit') ? str_encode($expnese_type->id) : NULL; ?>" id="expense_id"
                                class="form-control mb-2" placeholder="Expense Type">
                        <?php } ?>
                        <input type="text" name="expense_type"
                            value="<?=($mode == 'edit') ? $expnese_type->name : NULL; ?>" id="expense_type"
                            class="form-control mb-2" placeholder="Expense Type">
                        <hr>
                        <button class="btn btn-<?=($mode == 'edit') ? 'warning' : 'primary'; ?>" type="submit">
                            <?=($mode == 'edit') ? 'Update' : 'Add' ?> Type
                        </button>
                        <?php
                        if ($mode == 'edit') { ?>
                            <a href="<?= URL ?>expense-type"
                                class="btn btn-default">
                                Cancel
                            </a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Expense Types
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="expense_table" class="table table-bordered table-striped-columns">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Expense Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($expense_types) {
                                $count = 1;
                                foreach ($expense_types as $expense_type) { ?>
                                    <tr>
                                        <td><?= $count; ?></td>
                                        <td>
                                            <?= $expense_type['name']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL ?>expense-type/edit/<?= str_encode($expense_type['id']); ?>/"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm del_expense_type"
                                                data-id="<?= str_encode($expense_type['id']); ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $count++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center">No Data Found</td>
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