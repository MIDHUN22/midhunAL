<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Content Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/page/all') ?>">Content Management </a></li>
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
                        <form role="form" method="post" action="<?= site_url('panel/page/edit/' . $id . '/' . $lang) ?>"
                              enctype="multipart/form-data" id="pageForm">
                            <div class="card-body">
                                <?php if ($languages && count($languages) > 1 && $controller_config['disable_page_languages'] != TRUE): ?>
                                    <ul class="nav nav-tabs mb-4" id="news-content-below-tab" role="tablist">
                                        <?php
                                        $i = 1;
                                        foreach ($languages as $language):
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?= in_array($language->id, $page_languages) && $language->id != $lang ? ' bg-navy' : '' ?><?= $language->id == $lang ? ' active bg-success' : '' ?>"
                                                   href="<?= base_url('panel/page/edit/' . $id . '/' . $language->id) ?>"
                                                   role="tab" aria-selected="true"><?= $language->name ?></a>
                                            </li>
                                            <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="row">
                                    <?php if ($controller_config['disable_page_menu'] != TRUE): ?>
                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="pageMenu">Menu<span class="text-danger">*</span></label>
                                            <select class="custom-select" id="pageMenu" name="pageMenu">
                                                <?php
                                                if ($menus):
                                                    foreach ($menus as $menu_item):
                                                        ?>
                                                        <option value="<?= $menu_item->id ?>" <?= !empty($page->menu) && $menu_item->id == $page->menu ? 'selected' : '' ?>><?= $menu_item->title ?></option>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <?php echo form_error('pageMenu'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12">
                                        <label for="pageTitle">Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                               id="pageTitle" placeholder="Title" name="pageTitle"
                                               value="<?= set_value('pageTitle', empty($page->title) ? '' : $page->title) ?>"
                                               onchange="generate_slug_title(this, 'pageSlugTitle')">
                                               <?php echo form_error('pageTitle'); ?>
                                    </div>
                                    <div class="form-group col-sm-12" style="display: none;">
                                        <label for="pageSlugTitle">Slug Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                               class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                               id="pageSlugTitle" placeholder="Slug Title" name="pageSlugTitle"
                                               value="<?= set_value('pageSlugTitle', empty($page->title_slug) ? '' : $page->title_slug) ?>">
                                               <?php echo form_error('pageSlugTitle'); ?>
                                    </div>
                                    <?php if ($controller_config['disable_page_subtitle'] !== TRUE): ?>
                                        <div class="form-group col-sm-12" <?php if($page->subtitle=="") echo 'style="display: none;"'; ?>>
                                            <label for="pageSubtitle">Subtitle</label>
                                            <input type="text"
                                                   class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                                   id="pageTitle" placeholder="Subtitle" name="pageSubtitle"
                                                   value="<?= set_value('pageSubtitle', empty($page->subtitle) ? '' : $page->subtitle) ?>">
                                                   <?php echo form_error('pageSubtitle'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($controller_config['disable_page_short_desc'] !== TRUE): ?>
                                        <div class="form-group col-sm-12" <?php if($page->short_desc=="" && $page->menu!="3" && $page->menu!="8") echo 'style="display: none;"'; ?>>
                                            <label for="pageShortDesc">Short Description</label>
                                            <textarea class="form-control ckeditor"
                                                      id="pageShortDesc" <?= $current_language->direction == 'rtl' ? 'data-dir="rtl"' : '' ?>
                                                      placeholder="Short Description"
                                                      name="pageShortDesc"><?= set_value('pageShortDesc', empty($page->short_desc) ? '' : $page->short_desc) ?></textarea>
                                                      <?php echo form_error('pageShortDesc'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group col-sm-12" <?php if($page->description=="" && $page->menu!="3" && $page->menu!="8") echo 'style="display: none;"'; ?>>
                                        <label for="pageDescription">Description</label>
                                        <textarea class="form-control ckeditor"
                                                  id="pageDescription" <?= $current_language->direction == 'rtl' ? 'data-dir="rtl"' : '' ?>
                                                  placeholder="Description"
                                                  name="pageDescription"><?= set_value('pageDescription', empty($page->description) ? '' : $page->description) ?></textarea>
                                                  <?php echo form_error('pageDescription'); ?>
                                    </div>
                                    <?php if ($controller_config['disable_page_description_img'] != TRUE): ?>
                                        <div class="form-group col-sm-12" <?php if($page->desc_img=="" && $page->menu!="3" && $page->menu!="8") echo 'style="display: none;"'; ?>>
                                    <label for="pageDescImg"><?php if($page->menu=="3" || $page->menu=="8"){?>Header Image<?php }else{?>Description Image <?php }?> <a href="javascript:void(0)"
                                                                                          class="text-info"
                                                                                          data-toggle="tooltip"
                                                                                          data-placement="top"
                                                                                          title="<?= config_item('MAX_IMG_FILE_SIZE_MSG') ?>"><i
                                                        class="fa fa-info-circle"></i></a></label>
                                            <div class="tower-file">
                                                <input type="file" class="custom_fileInput" name="pageDescImg"
                                                       id="pageDescImg" accept=".png,.jpg,.jpeg">
                                                <label for="pageDescImg" class="tower-file-button"> <span
                                                        class="mdi mdi-upload"></span>Browse </label>
                                                <button type="button" class="tower-file-clear tower-file-button">
                                                    Clear
                                                </button>
                                            </div>
                                            <div id="pageDescImgError" class="error-text"><?= $pageDescImgError ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($page->desc_img)): ?>
                                        <div class="col-sm-12">
                                            <div class="file-img-container">
                                                <div class="file-img-container-option">
                                                    <a href="javascript:void(0)"
                                                       class="file_edit_btn trigger_alert_modal" data-title="Confirm"
                                                       data-desc="Are you sure want to delete this?"
                                                       data-redirect="<?= base_url('panel/page/delete_desc_img/' . $page->id . '/' . $page->language) ?>"><i
                                                            class="fas fa-trash"></i> </a>
                                                </div>
                                                <img src="<?= base_url('assets/uploads/page/thumb_' . $page->desc_img) ?>"
                                                     class="img-fluid"/>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($controller_config['disable_page_seo'] !== TRUE): ?>
                                        <div class="form-group col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">SEO</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label for="pageSeoTitle">Title </label>
                                                            <input type="text"
                                                                   class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                                                   id="pageSeoTitle" placeholder="Title" name="pageSeoTitle"
                                                                   value="<?= set_value('pageSeoTitle', empty($page->seo_title) ? '' : $page->seo_title) ?>">
                                                                   <?php echo form_error('pageSeoTitle'); ?>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="pageSeoMetaKeywords">Meta Keywords</label>
                                                            <textarea
                                                                class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                                                id="pageSeoMetaKeywords" placeholder="Meta Keywords"
                                                                name="pageSeoMetaKeywords"><?= set_value('pageSeoMetaKeywords', empty($page->seo_meta_keywords) ? '' : $page->seo_meta_keywords) ?></textarea>
                                                                <?php echo form_error('pageSeoMetaKeywords'); ?>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <label for="pageSeoMetaDescription">Meta Description</label>
                                                            <textarea
                                                                class="form-control <?= $current_language->direction == 'rtl' ? 'direction-rtl' : '' ?>"
                                                                id="pageSeoMetaDescription"
                                                                placeholder="Meta Description"
                                                                name="pageSeoMetaDescription"><?= set_value('pageSeoMetaDescription', empty($page->seo_meta_description) ? '' : $page->seo_meta_description) ?></textarea>
                                                                <?php echo form_error('pageSeoMetaDescription'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-sm-12 mt-4">
                                        <button type="submit" class="btn btn-success float-right">Save</button>
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