<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <?=($mode == 'edit') ? 'Update' : 'Add'; ?> Brand
                    <hr>
                </div>
                <div class="card-body">
                    <form id="add-brand" method="post"
                          action="<?= URL ?>home/<?=($mode == 'edit') ? 'updateProductBrand' : 'addProductBrand' ?>">
                        <?php
                        if ($mode == 'edit') {
                            ?>
                            <input type="hidden" name="brand_id"
                                   value="<?=($mode == 'edit') ? str_encode($brand->id) : NULL; ?>" id="brand_id"
                                   class="form-control mb-2" placeholder="Category">
                        <?php } ?>
                        <input type="text" name="name"
                               value="<?=($mode == 'edit') ? $brand->name : NULL; ?>" id="name"
                               class="form-control mb-2" placeholder="Brand Name">
                        <hr>
                        <button class="btn btn-<?=($mode == 'edit') ? 'warning' : 'primary'; ?>" type="submit">
                            <?=($mode == 'edit') ? 'Update' : 'Add' ?> Brand
                        </button>
                        <?php
                        if ($mode == 'edit') { ?>
                            <a href="<?= URL ?>brands"
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
                    <?= $title; ?>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="expense_table" class="table table-bordered table-striped-columns">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Brand</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($brands) {
                                $count = 1;
                                foreach ($brands as $brand) { ?>
                                    <tr>
                                        <td><?= $count; ?></td>
                                        <td>
                                            <?= $brand['name']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL ?>brands/edit/<?= str_encode($brand['id']); ?>/"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm del_brand"
                                                    data-id="<?= str_encode($brand['id']); ?>">
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