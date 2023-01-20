<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body">

                    <!--/ DataTable with Buttons -->
                    <table class="table table-bordered table-striped-columns">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Cash By</th>
                                <th>Previous Cash</th>
                                <th>Cash Added</th>
                                <th>New Cash</th>
                                <th>Added Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($cash_details){
                                $count =1;
                                foreach ($cash_details as $cash_detail){ ?>
                                <tr>
                                    <td><?= $count; ?></td>
                                    <td><?= $cash_detail->cash_by; ?></td>
                                    <td><?= $cash_detail->previous_cash; ?></td>
                                    <td><?= $cash_detail->cash_added; ?></td>
                                    <td><?= $cash_detail->cash_added + $cash_detail->previous_cash; ?></td>
                                    <td><?= date('d-M-Y', strtotime($cash_detail->added_date)); ?></td>
                                </tr>
                            <?php
                               $count++; } }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->