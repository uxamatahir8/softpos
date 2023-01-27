<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $title; ?>
                        </div>
                        <div class="offset-3 col-md-3">
                            <span class="align-content-end">
                                <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#expenseModal"> Add Expense</a>
                            </span>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Type</th>
                                    <th>Amount(PKR)</th>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($expenses) {
                                    $count = 1;
                                    foreach ($expenses as $expense) { ?>
                                        <tr>
                                            <td>
                                                <?= $count; ?>
                                            </td>
                                            <td>
                                                <?= $expense['name']; ?>
                                            </td>
                                            <td>
                                                <?= $expense['expense'];  ?>
                                            </td>
                                            <td>
                                                <?= (isset($expense['remarks']) && !empty($expense['remarks'])) ? $expense['remarks'] : 'N/A'; ?>
                                            </td>
                                            <td>
                                                <?= date('d-M-Y h:ia', strtotime($expense['expense_date'])); ?>
                                            </td>
                                        </tr>

                                    <?php $count++; }
                                } else { ?>
                                    <td colspan="6" class="text-center">No Expense Records</td>
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

<div class="modal fade"  id="expenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Expense</h5>
            </div>
            <div class="modal-body">
                <form class="add-expense" method="post" action="<?= URL ?>home/addExpense">
                    <label for="expense_type">Select Expense Type</label>
                    <select name="expense_type" required id="expense_type" class="form-select mb-2">
                        <option value="" disabled selected>Select an Option</option>
                        <?php echo dropDown($expense_types, ''); ?>
                    </select>
                    <label for="expense_amount">Expense Amount(PKR):</label>
                    <input type="number" min="1" required class="form-control" name="expense_amount" id="expense_amount">
                    <p class="mb-2 text-primary">Available Cash : <?php echo cash_in_hand(); ?>PKR</p>
                    <label for="expense_remarks">Expense Remarks</label>
                    <textarea name="expense_remarks" id="expense_remarks" class="form-control mb-2" cols="30" rows="2"></textarea>
                    <hr>
                    <button type="submit" id="create_expense" class="btn btn-primary"> Add Expense</button>
                </form>
            </div>

        </div>
    </div>
</div>

