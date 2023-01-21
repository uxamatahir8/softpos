<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!--/ DataTable with Buttons -->
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Type</th>
                                <th>Previous(PKR)</th>
                                <th>Transaction(PKR)</th>
                                <th>After(PKR)</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($cash_details){
                                $count =1;
                                foreach ($cash_details as $cash_detail){ ?>
                                <tr>
                                    <td><?= $count; ?></td>
                                    <td><?= $cash_detail['cash_by']; ?></td>
                                    <td><?= $cash_detail['previous_cash']; ?></td>
                                    <td>
                                        <?= $cash_detail['cash']; ?>
                                        <span class="badge bg-<?= ($cash_detail['type'] == 'Cash In') ? 'success' : 'danger' ?>"><?= ($cash_detail['type'] == 'Cash In') ? 'In' : 'Out'; ?></span>
                                    </td>
                                    <td>
                                        <?php
                                            if($cash_detail['type'] == 'Cash In') {
                                               echo $cash_detail['cash'] + $cash_detail['previous_cash'];
                                            }else{
                                              echo  $cash_detail['previous_cash'] - $cash_detail['cash'];
                                            }
                                        ?>

                                    </td>


                                    <td><?= date('d-M-Y h:ia', strtotime($cash_detail['added_date'])); ?></td>
                                </tr>
                            <?php
                            $count++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td class="text-center" colspan="5">No Data Found</td>
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