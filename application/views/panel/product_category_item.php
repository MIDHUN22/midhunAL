<tr>
    <td><?= $sl_no ?></td>
    <td><?= $title ?></td>
    <?php if ($controller_config['disable_category_order'] != TRUE): ?>
        <td>
            <select class="custom-select" id="category_order_<?= $category_id ?>"
                    name="category_order_<?= $category_id ?>">
                <option value="">--</option>
                <?php
                if ($category_count):
                    for ($i = 1; $i <= $category_count; $i++):
                        ?>
                        <option value="<?= $i ?>" <?= $category_order == $i ? 'selected' : '' ?>><?= $i ?></option>
                    <?php
                    endfor;
                endif;
                ?>
            </select>
        </td>
    <?php endif; ?>
    <td>
        <a href="<?= site_url('panel/product_category/edit/' . $category_id) ?>" title='Edit'
           class="btn-sm btn-primary"><i
                    class="fas fa-user-edit"></i></a> <a href="#" class="btn-sm btn-danger trigger_alert_modal"
                                                         data-title="Confirm"
                                                         data-desc="Are you sure want to delete this?"
                                                         data-redirect="<?= site_url('panel/product_category/delete/' . $category_id) ?>"
                                                         title='Delete'><i class="fas fa-trash-alt"></i></a>
    </td>
</tr>