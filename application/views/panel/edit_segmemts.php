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
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/segmentsadmin/all') ?>">Segments</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <h3 class="card-title">Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post"
                            action="<?= site_url('panel/segmentsadmin/edit/' . $id . '/' . $lang) ?>"
                            enctype="multipart/form-data" id="brandForm">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-sm-12">

                                        <label for="title">Title <span class="text-danger">*</span></label>

                                        <input type="text"
                                            class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                            id="title" placeholder="Title" name="title"
                                            value="<?= set_value('title', empty($brand->title) ? '' : $brand->title) ?>">
                                        <?php echo form_error('title'); ?>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="short_description">Short description<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="short_description"
                                            placeholder="Short description" name="short_description"
                                            value="<?= set_value('short_description', empty($brand->short_description) ? '' : $brand->short_description) ?>">
                                        <?php echo form_error('short_description'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control ckeditor" id="description"
                                            placeholder="Description"
                                            name="description"><?= set_value('description', empty($brand->description) ? '' : $brand->description) ?></textarea>
                                        <?php echo form_error('description'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="brandImg">Brand Image <a href="javascript:void(0)" class="text-info"
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
                                    <?php if (!empty($brand->image)) : ?>
                                    <div class="col-sm-12">
                                        <div class="file-img-container">
                                            <div class="file-img-container-option">
                                                <a href="javascript:void(0)" class="file_edit_btn trigger_alert_modal"
                                                    data-title="Confirm" data-desc="Are you sure want to delete this?"
                                                    data-redirect="<?= base_url('panel/segmentsadmin/delete_brand_img/' . $brand->id . '/' . $brand->language) ?>"><i
                                                        class="fas fa-trash"></i> </a>
                                            </div>
                                            <img src="<?= base_url('assets/uploads/segments/thumb_' . $brand->image) ?>"
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12">
                                        <label for="brandStatus">Status <span class="text-danger">*</span></label>
                                        <select name="brandStatus" id="brandStatus" class="form-control">
                                            <option value="2" selected>Inactive</option>
                                            <option value="1"
                                                <?= set_value('brandStatus') == $brand->active || $brand->active == 1 ? 'selected' : '' ?>>
                                                Active</option>
                                        </select>
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