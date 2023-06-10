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
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Qty</th>
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
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['brand_name']; ?></td>
                                            <td><?= $product['cat_name']; ?></td>
                                            <td><?= $product['curr_qty']; ?></td>
                                            <td><?= date('d-M-Y', strtotime($product['added_date'])); ?></td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#addStockModal" data-stock="<?= $product['curr_qty']; ?>" data-id="<?= str_encode($product['id']) ?>" class="btn btn-dark btn-sm add_stock">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <a href="<?= URL ?>product/view/<?= str_encode($product['id']) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= URL ?>product/edit/<?= str_encode($product['id']) ?>" class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button id="del_product" data-id="<?= str_encode($product['id']) ?>" class="btn btn-danger btn-sm del_product">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                   <?php $count++; } }else {?>
                                    <tr>
                                        <td colspan="9" class="text-center">No Data Found</td>
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


<div class="modal fade"  id="addStockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Stock</h5>
            </div>
            <div class="modal-body">
                <form id="add-stock" method="post" action="<?= URL ?>home/addStock">
                    <span>Current Stock:</span> <span id="curr_qty"></span>
                    <br>
                    <label for="add_qty" class="form-label">Enter Quantity (This will be added to previous Quantity):</label>
                    <input type="text" id="add_qty" name="add_qty" class="form-control add_qty" placeholder="Enter Qty">
                    <span class="text-danger">If you want to update the quantity instead of adding,
                        <a class="text-decoration-underline text-danger" id="qty_update_link" href="" target="_blank">Click Here</a></span>
                    <input type="hidden" id="id" name="id">
                    <hr>
                    <button type="submit" class="btn btn-primary my-2"> Add Stock </button>
                </form>
            </div>

        </div>
    </div>
</div>

