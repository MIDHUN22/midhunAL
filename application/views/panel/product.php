<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= $alert ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product</h4>
                            <a href="<?= site_url('panel/product/add') ?>" class="btn btn-sm btn-info float-right"
                               title="Add"><i class="fas fa-user-plus"></i> Add</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="<?= site_url('panel/product/all') ?>">
                                <div class="row mt-2 mb-4">
                                    <?php if($controller_config['disable_pr_category'] != TRUE):?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="custom-select" id="filterProductCategory"
                                                    name="filterProductCategory">
                                                <option value="">Select Category</option>
                                                <?php if ($product_categories): ?><?php foreach ($product_categories as $category):
                                                    $space_sl_no=explode('.',$page_info_item['sl_no']);
                                                    array_pop($space_sl_no);
                                                    $space_sl_no=array_sum($space_sl_no);
                                                    ?>
                                                        <option value="<?= $category['category_id'] ?>" <?= set_value('filterProductCategory') == $category['category_id'] ? 'selected' : '' ?>><?=str_repeat('&nbsp;&nbsp;&nbsp;',$space_sl_no)?><?='('.$category['sl_no'].')&nbsp;&nbsp;'?><?= $category['title'] ?></option>
                                                    <?php endforeach; ?><?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($controller_config['disable_pr_brand'] != TRUE):?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="custom-select" id="filterProductBrand"
                                                    name="filterProductBrand">
                                                <option value="">Select Brand</option>
                                                <?php if ($brands): ?><?php foreach ($brands as $brand): ?>
                                                        <option value="<?= $brand->id ?>" <?= set_value('filterProductBrand') == $brand->id ? 'selected' : '' ?>><?= $brand->brand_name ?></option>
                                                    <?php endforeach; ?><?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="custom-select" id="filterProductStatus"
                                                    name="filterProductStatus">
                                                <option value="">Select Product Status</option>
                                                <option value='Y' <?= set_value('filterProductStatus') == 'Y' ? 'selected' : '' ?>>Active</option>
                                                <option value='N' <?= set_value('filterProductStatus') == 'N' ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control dateRangeTimePicker"
                                                   id="filterProductCreatedAt" placeholder="Created At"
                                                   name="filterProductCreatedAt"
                                                   value="<?= set_value('filterProductCreatedAt') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="filterProductTitle"
                                                   placeholder="Product" name="filterProductTitle"
                                                   value="<?= set_value('filterProductTitle') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary float-left">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered table-striped data-table-search-off">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Product</th>
                                        <th>Units in stock</th>
                                        <th>Unit Price</th>
                                        <th>Discount</th>
                                        <th>Selling Price</th>
                                        <th>Product Available</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($products): $i = 0;
                                        foreach ($products as $product): $i++;
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= htmlspecialchars($product->product_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?= htmlspecialchars($product->units_in_stock, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?= htmlspecialchars($product->unit_price, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?= htmlspecialchars($product->discount, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?= htmlspecialchars($product->selling_price, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?= $product->units_in_stock >0 ? '<label class="label label-success">In Stock<label>' : '<label class="label label-danger">Out of stock</label>'; ?></td>
                                                <td>                                                    
                                                    <a href="<?= site_url('panel/product/edit/' . $product->id . '/' . $product->language) ?>"
                                                       title='Edit' class="btn-sm btn-primary"><i
                                                            class="fas fa-user-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div><!-- /.content-wrapper -->