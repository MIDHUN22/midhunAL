<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Segments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/segmentsadmin/all') ?>">Student</a>
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
                            <h3 class="card-title">Segments</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="<?= site_url('panel/segmentsadmin/add') ?>"
                            enctype="multipart/form-data" id="brandForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" placeholder="title"
                                            name="title" value="<?= set_value('title') ?>">
                                        <?php echo form_error('title'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="short_description">Short description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="short_description"
                                            placeholder="Short description" name="short_description"
                                            value="<?= set_value('short_description') ?>">
                                        <?php echo form_error('short_description'); ?>
                                    </div>
                                    <!-- <?php if ($controller_config['disable_brand_description'] !== TRUE) : ?> -->
                                    <div class="form-group col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control ckeditor" id="description"
                                            placeholder="Description"
                                            name="description"><?= set_value('description') ?></textarea>
                                        <?php echo form_error('description'); ?>
                                    </div>
                                    <!-- <?php endif; ?> -->
                                    <div class="form-group col-sm-12">
                                        <label for="brandImg"> Image <a href="javascript:void(0)" class="text-info"
                                                data-toggle="tooltip" data-placement="top"
                                                title="<?= config_item('MAX_IMG_FILE_SIZE_MSG') ?>"><i
                                                    class="fa fa-info-circle"></i></a></label>
                                        <div class="tower-file">
                                            <input type="file" class="custom_fileInput" name="brandImg" id="brandImg"
                                                accept=".png,.jpg,.jpeg">
                                            <label for="brandImg" class="tower-file-button"> <span
                                                    class="mdi mdi-upload"></span>Browse </label>
                                            <button type="button" class="tower-file-clear tower-file-button">
                                                Clear
                                            </button>
                                        </div>
                                        <div id="brandImgError" class="error-text"><?= $brandImgError ?></div>
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