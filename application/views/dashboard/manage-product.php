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
                                <a href="<?= URL ?>products" class="btn btn-primary text-white"> View Products</a>
                            </span>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <?php if ($mode == 'add' || $mode == 'edit') { ?>
                        <form id="product-form"
                            action="<?= URL ?>Home/<?=($mode == 'edit') ? 'updateNewProduct' : 'addNewProduct' ?>"
                            method="post">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="brand_id" class="form-label">Select Brand:</label>
                                    <select name="brand_id" id="brand_id" class="brand_id form-select">
                                        <option value="">Select Brand</option>
                                        <?php echo dropDown($brands, ($mode == 'edit') ? str_encode($product->brand_id) : NULL); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="cat_id" class="form-label">Select Category:</label>
                                    <select name="cat_id" id="cat_id" class="brand_id form-select">
                                        <option value="">Select Category</option>
                                        <?php echo dropDown($categories, ($mode == 'edit') ? str_encode($product->cat_id) : NULL) ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control name"
                                        value="<?=($mode == 'edit') ? $product->name : NULL; ?>" placeholder="Product Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="stock_alert" class="form-label">Stock Alert</label>
                                    <input type="text" class="form-control stock_alert" name="stock_alert"
                                        value="<?=($mode == 'edit') ? $product->stock_alert : NULL; ?>" id="stock_alert"
                                        placeholder="Stock Alert">
                                </div>
                                <?php if ($mode == 'add') { ?>
                                    <div class="col-md-3">
                                        <label for="unit_id" class="form-label">Select Qty Unit:</label>
                                        <select name="unit_id" id="unit_id" class="form-select unit_id">
                                            <option value="" selected>Select Category First</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="qty_in_unit" class="form-label">Qty In Unit:</label>
                                        <input type="text" class="form-control qty_in_unit" readonly id="qty_in_unit"
                                            placeholder="Select Unit First">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="add_qty" class="form-label">Add Qty:</label>
                                        <input type="text" class="form-control add_qty" id="add_qty" name="add_qty" readonly
                                            placeholder="Select Unit First">
                                    </div>
                                <?php } ?>
                                <div class="col-md-3">
                                    <label for="total_qty" class="form-label">Total Qty:</label>
                                    <input type="text" class="form-control total_qty"
                                        value="<?=($mode == 'edit') ? $product->curr_qty : NULL; ?>" id="total_qty"
                                        name="total_qty" <?=($mode == 'edit') ? '' : 'readonly' ?> placeholder="Total Qty">
                                </div>
                                <?php if ($mode == 'add') { ?>
                                    <div class="col-md-3">
                                        <label for="purchase_price" class="form-label">Purchase Price:</label>
                                        <input type="text" class="form-control purchase_price" id="purchase_price"
                                            placeholder="Purchase Price">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sale_price" class="form-label">Sale Price:</label>
                                        <input type="text" class="form-control sale_price" id="sale_price" placeholder="Sale Price">
                                    </div>
                                <?php } ?>
                                <div class="col-md-3">
                                    <label for="purchase_price_per_qty" class="form-label">Purchase Price Per Qty:</label>
                                    <input type="text" class="form-control purchase_price_per_qty" name="purchase_price_per_qty"
                                        id="purchase_price_per_qty" <?=($mode == 'edit') ? '' : 'readonly' ?>
                                        value="<?= ($mode == 'edit') ?  $product->purchase_price : NULL ?>" placeholder="Purchase Price Per Qty">
                                </div>
                                <div class="col-md-3">
                                    <label for="sale_price_per_qty" class="form-label">Sale Price Per Qty:</label>
                                    <input type="text" class="form-control sale_price_per_qty" name="sale_price_per_qty"
                                        id="sale_price_per_qty" <?=($mode == 'edit') ? '' : 'readonly' ?>
                                        value="<?= ($mode == 'edit') ?  $product->sale_price : NULL ?>" placeholder="Sale Price Per Qty">
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <div class="offset-md-8 col-md-4">
                                    <input type="hidden" id="mode" value="<?= $mode; ?>">
                                    <input type="hidden" id="id" value="<?= ($mode == 'edit') ? str_encode($product->id) : NULL; ?>" name="id">
                                    <button type="submit" class="btn btn-<?=($mode == 'add') ? 'primary' : 'warning'; ?>">
                                        <?=($mode == 'add') ? 'Add' : 'Update' ?> Product
                                    </button>
                                    <a href="<?= URL ?>products" class="btn btn-default mx-2">Cancel</a>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->