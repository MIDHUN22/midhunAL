<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Enquiry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('panel/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Enquiry</li>
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
                            <h4 class="card-title">Enquiry</h4>
                            <!-- <a href="<?= site_url('panel/midhun/add') ?>" class="btn btn-sm btn-info float-right"
                                title="Add"><i class="fas fa-user-plus"></i> Add</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="<?= site_url('panel/enquiey/all') ?>">
                                <div class="row mt-2 mb-4">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control dateRangeTimePicker"
                                                id="filterBrandCreatedAt" placeholder="Created At"
                                                name="filterBrandCreatedAt"
                                                value="<?= set_value('filterBrandCreatedAt') ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="filterBrandName"
                                                placeholder="Name" name="filterBrandName"
                                                value="<?= set_value('filterBrandName') ?>">
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
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Query</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($enquiry) : $i = 0;
                                        foreach ($enquiry as $query) : $i++;
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= htmlspecialchars($query->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($query->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($query->query, ENT_QUOTES, 'UTF-8'); ?></td>

                                        <!-- <td><?php echo "<img src='" . base_url('assets/uploads/brand/') . $query->image . "' height='30px' width='40px' >" ?> -->
                                        </td>
                                        <!-- <td><?= htmlspecialchars(date('d-m-Y H:i', $query->created_at), ENT_QUOTES, 'UTF-8'); ?>
                                        </td> -->
                                        <td><?= htmlspecialchars($query->active == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td>
                                            <!-- <a href="<?= site_url('panel/midhun/edit/' . $query->id . '/' . $query->language) ?>"
                                                title='Edit' class="btn-sm btn-primary"><i
                                                    class="fas fa-user-edit"></i></a> -->
                                            <a href="#" class="btn-sm btn-danger trigger_alert_modal"
                                                data-title="Confirm" data-desc="Are you sure want to delete this?"
                                                data-redirect="<?= site_url('panel/enquiry/delete/' . $query->id . '/' . $query->language) ?>"
                                                title='Delete'><i class="fas fa-trash-alt"></i></a>
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