<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/category/all') ?>">Category</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                <div class="col-sm-12">
                    <?= $alert ?>
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Add</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="<?= site_url('panel/product_category/add') ?>"
                              enctype="multipart/form-data" id="categoryForm">
                            <div class="card-body">
                                <div class="row">
                                    <?php if ($controller_config['disable_parent_category'] != TRUE): ?>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="parentCategory">Parent Category</label>
                                            <select class="custom-select" id="parentCategory" name="parentCategory">
                                                <option value="">None</option>
                                                <?php if ($categories): ?><?php foreach ($categories as $category_item):
                                                    $space_sl_no = explode('.', $category_item['sl_no']);
                                                    array_pop($space_sl_no);
                                                    $space_sl_no = array_sum($space_sl_no);
                                                    $space_sl_no = '0';
                                                    ?>
                                                    <option value="<?= $category_item['category_id'] ?>"><?= str_repeat('&nbsp;&nbsp;&nbsp;', $space_sl_no) ?><?= '(' . $category_item['sl_no'] . ')&nbsp;&nbsp;' ?><?= $category_item['title'] ?></option>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                            <?php echo form_error('parentCategory'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12">
                                        <label for="categoryTitle">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="categoryTitle" placeholder="Title"
                                               name="categoryTitle" value="<?= set_value('categoryTitle') ?>">
                                        <?php echo form_error('categoryTitle'); ?>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button type="submit" class="btn btn-success float-right">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div><!-- /.content-wrapper -->