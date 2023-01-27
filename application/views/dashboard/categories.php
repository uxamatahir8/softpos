<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <?=($mode == 'edit') ? 'Update' : 'Add'; ?> Category
                    <hr>
                </div>
                <div class="card-body">
                    <form id="add-category" method="post"
                          action="<?= URL ?>home/<?=($mode == 'edit') ? 'updateProductCategory' : 'addProductCategory' ?>">
                        <?php
                        if ($mode == 'edit') {
                            ?>
                            <input type="hidden" name="cat_id"
                                   value="<?=($mode == 'edit') ? str_encode($category->id) : NULL; ?>" id="cat_id"
                                   class="form-control mb-2" placeholder="Category">
                        <?php } ?>
                        <input type="text" name="name"
                               value="<?=($mode == 'edit') ? $category->name : NULL; ?>" id="name"
                               class="form-control mb-2" placeholder="Category Name">
                        <hr>
                        <button class="btn btn-<?=($mode == 'edit') ? 'warning' : 'primary'; ?>" type="submit">
                            <?=($mode == 'edit') ? 'Update' : 'Add' ?> Category
                        </button>
                        <?php
                        if ($mode == 'edit') { ?>
                            <a href="<?= URL ?>categories"
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
                    <?=  $title; ?>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="expense_table" class="table table-bordered table-striped-columns">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($categories) {
                                $count = 1;
                                foreach ($categories as $category) { ?>
                                    <tr>
                                        <td><?= $count; ?></td>
                                        <td>
                                            <?= $category['name']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= URL ?>categories/edit/<?= str_encode($category['id']); ?>/"
                                               class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm del_category"
                                                    data-id="<?= str_encode($category['id']); ?>">
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