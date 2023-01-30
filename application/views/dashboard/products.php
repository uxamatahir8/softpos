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
                                <a href="<?= URL ?>product/add" class="btn btn-primary text-white" > Add Product</a>
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
                                    <th>#</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($products){
                                        $count = 1;
                                        foreach ($products as $product){ ?>
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td><?= $product['brand_name']; ?></td>
                                            <td><?= $product['cat_name']; ?></td>
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['curr_qty']; ?></td>
                                            <td><?= $product['purchase_price']; ?></td>
                                            <td><?= $product['sale_price']; ?></td>
                                            <td><?= date('d-M-Y h:i a', strtotime($product['added_date'])); ?></td>
                                            <td>
                                                <a href="<?= URL ?>product/view/<?= str_encode($product['id']) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= URL ?>product/edit/<?= str_encode($product['id']) ?>" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button data-id="<?= str_encode($product['id']) ?>" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                   <?php $count++; } }else {?>
                                        <td colspan="9"></td>
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
