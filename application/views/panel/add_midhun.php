<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/midhun/all') ?>">Student</a></li>
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
                            <h3 class="card-title">Student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="<?= site_url('panel/midhun/add') ?>"
                            enctype="multipart/form-data" id="brandForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                            value="<?= set_value('name') ?>">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="education">Education<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="education" placeholder="Education"
                                            name="education" value="<?= set_value('education') ?>">
                                        <?php echo form_error('education'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="gender" placeholder="Gender"
                                            name="gender" value="<?= set_value('gender') ?>">
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" placeholder="Phone"
                                            name="phone" value="<?= set_value('phone') ?>">
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="email">E-mail <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" placeholder="E-mail"
                                            name="email" value="<?= set_value('email') ?>">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <?php if ($controller_config['disable_brand_img'] !== TRUE) : ?>
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
                                    <?php endif; ?>
                                    <?php if ($controller_config['disable_brand_link'] !== TRUE) : ?>
                                    <div class="form-group col-sm-12">
                                        <label for="brandLink">Link </label>
                                        <input type="text" class="form-control" id="brandLink" placeholder="Link"
                                            name="brandLink" value="<?= set_value('brandLink') ?>">
                                        <?php echo form_error('brandLink'); ?>
                                    </div>
                                    <?php endif; ?>
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