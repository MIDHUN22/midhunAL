<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Career</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/article/all') ?>">Career</a></li>
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
                        <form role="form" method="post" action="<?= site_url('panel/article/edit/' . $id . '/' . $lang) ?>" enctype="multipart/form-data" id="articleForm">
                            <div class="card-body">
                                <?php if ($languages && count($languages) > 1 && $controller_config['disable_article_languages'] != TRUE) : ?>
                                    <ul class="nav nav-tabs mb-4" id="news-content-below-tab" role="tablist">
                                        <?php
                                        $i = 1;
                                        foreach ($languages as $language) :
                                        ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?= in_array($language->id, $article_languages) && $language->id != $lang ? ' bg-navy' : '' ?><?= $language->id == $lang ? ' active bg-success' : '' ?>" href="<?= base_url('panel/article/edit/' . $id . '/' . $language->id) ?>" role="tab" aria-selected="true"><?= $language->name ?></a>
                                            </li>
                                        <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="articleTitle">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>" id="articleTitle" placeholder="Title" name="articleTitle" value="<?= set_value('articleTitle', empty($article->title) ? '' : $article->title) ?>" onchange="generate_slug_title(this, 'articleSlugTitle')">
                                        <?php echo form_error('articleTitle'); ?>
                                    </div>
                                    <?php if ($controller_config['disable_article_slug_title'] != TRUE) : ?>
                                        <div class="form-group col-sm-12">
                                            <label for="articleSlugTitle">Slug Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>" id="articleSlugTitle" placeholder="Slug Title" name="articleSlugTitle" value="<?= set_value('articleSlugTitle', empty($article->title_slug) ? '' : $article->title_slug) ?>">
                                            <?php echo form_error('articleSlugTitle'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($controller_config['disable_article_subtitle'] != TRUE) : ?>
                                        <div class="form-group col-sm-12">
                                            <label for="articleSubtitle">Subtitle</label>
                                            <input type="text" class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>" id="articleTitle" placeholder="Subtitle" name="articleSubtitle" value="<?= set_value('articleSubtitle', empty($article->subtitle) ? '' : $article->subtitle) ?>">
                                            <?php echo form_error('articleSubtitle'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($controller_config['disable_article_short_description'] != TRUE) : ?>
                                        <div class="form-group col-sm-12">
                                            <label for="articleShortDesc">Short Description</label>
                                            <textarea class="form-control ckeditor" id="articleShortDesc" <?= $current_language->direction == 'rtl' ? 'data-dir="rtl"' : '' ?> placeholder="Short Description" name="articleShortDesc"><?= set_value('articleShortDesc', empty($article->short_desc) ? '' : $article->short_desc) ?></textarea>
                                            <?php echo form_error('articleShortDesc'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12">
                                        <label for="articleDescription">Description</label>
                                        <textarea class="form-control ckeditor" id="articleDescription" <?= $current_language->direction == 'rtl' ? 'data-dir="rtl"' : '' ?> placeholder="Description" name="articleDescription"><?= set_value('articleDescription', empty($article->description) ? '' : $article->description) ?></textarea>
                                        <?php echo form_error('articleDescription'); ?>
                                    </div>
                                    <?php if ($controller_config['disable_article_description_img'] != TRUE) : ?>
                                        <div class="form-group col-sm-12">
                                            <label for="articleDescImg">Description Image <a href="javascript:void(0)" class="text-info" data-toggle="tooltip" data-placement="top" title="<?= config_item('MAX_IMG_FILE_SIZE_MSG') ?>"><i class="fa fa-info-circle"></i></a></label>
                                            <div class="tower-file">
                                                <input type="file" class="custom_fileInput" name="articleDescImg" id="articleDescImg" accept=".png,.jpg,.jpeg">
                                                <label for="articleDescImg" class="tower-file-button"> <span class="mdi mdi-upload"></span>Browse </label>
                                                <button type="button" class="tower-file-clear tower-file-button">
                                                    Clear
                                                </button>
                                            </div>
                                            <div id="articleDescImgError" class="error-text"><?= $articleDescImgError ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($article->desc_img)) : ?>
                                        <div class="col-sm-12">
                                            <div class="file-img-container">
                                                <div class="file-img-container-option">
                                                    <a href="javascript:void(0)" class="file_edit_btn trigger_alert_modal" data-title="Confirm" data-desc="Are you sure want to delete this?" data-redirect="<?= base_url('panel/article/delete_desc_img/' . $article->id . '/' . $article->language) ?>"><i class="fas fa-trash"></i> </a>
                                                </div>
                                                <img src="<?= base_url('assets/uploads/article/thumb_' . $article->desc_img) ?>" class="img-fluid" />
                                            </div>
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