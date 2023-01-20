<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Testimonial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/testimonial/all') ?>">Testimonial</a>
                        </li>
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
                        <form role="form" method="post" action="<?= site_url('panel/testimonial/add') ?>"
                              enctype="multipart/form-data" id="testimonialForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="testimonialStatement">Statement <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="testimonialStatement" placeholder="Statement"
                                                  name="testimonialStatement"><?= set_value('testimonialStatement') ?></textarea>
                                                  <?php echo form_error('testimonialStatement'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="testimonialStatementBy">Statement By <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="testimonialStatementBy"
                                                  placeholder="Statement By"
                                                  name="testimonialStatementBy"><?= set_value('testimonialStatementBy') ?></textarea>
                                                  <?php echo form_error('testimonialStatementBy'); ?>
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