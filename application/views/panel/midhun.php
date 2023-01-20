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
                        <li class="breadcrumb-item active">Students</li>
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
                            <h4 class="card-title">Students</h4>
                            <a href="<?= site_url('panel/midhun/add') ?>" class="btn btn-sm btn-info float-right"
                                title="Add"><i class="fas fa-user-plus"></i> Add</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" action="<?= site_url('panel/midhun/all') ?>">
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
                                        <th>Education</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($brands) : $i = 0;
                                        foreach ($brands as $student) : $i++;
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= htmlspecialchars($student->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($student->education, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($student->gender, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($student->phone, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?= htmlspecialchars($student->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo "<img src='" . base_url('assets/uploads/brand/') . $student->image . "' height='30px' width='40px' >" ?>
                                        </td>
                                        <!-- <td><?= htmlspecialchars(date('d-m-Y H:i', $student->created_at), ENT_QUOTES, 'UTF-8'); ?>
                                        </td> -->
                                        <td><?= htmlspecialchars($student->active == 1 ? 'Active' : 'Inactive'); ?></td>
                                        <td>
                                            <a href="<?= site_url('panel/midhun/edit/' . $student->id . '/' . $student->language) ?>"
                                                title='Edit' class="btn-sm btn-primary"><i
                                                    class="fas fa-user-edit"></i></a> <a href="#"
                                                class="btn-sm btn-danger trigger_alert_modal" data-title="Confirm"
                                                data-desc="Are you sure want to delete this?"
                                                data-redirect="<?= site_url('panel/midhun/delete/' . $student->id . '/' . $student->language) ?>"
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