<?php view('shared.admin.header', [
    'title' => 'Chỉnh sửa danh mục'
]); ?>
<?php if (!empty($message['success-edit'])) { ?>
    <div class="alert alert-success" id="success-edit-category">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('success-edit-category').style.display='none'">&times;</button>
        <?= $message['success-edit'] ?? '' ?>
    </div>
<?php } ?>

<form action="./?module=admin&controller=category&action=update&id=<?= $_GET['id'] ?>" method="POST" role="form" name="categoryForm" onsubmit="return validateCategoryForm();">

    <div class="form-group">
        <label for="">Tên</label>
        <small id="ad-ctg-cr-name-err"></small>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="<?= $category['name'] ?>" id="ad-ctg-cr-name" onkeyup="validateNotEmpty(this, 'Category name');">
        <?php if (!empty($message['error-name'])) : ?>
            <small class="help-block invalid-error"><?= $message['error-name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" <?= $category['status'] == 1 ? 'checked' : '' ?>>
                Công khai
            </label>
            <label>
                <input type="radio" name="status" value="0" <?= $category['status'] == 0 ? 'checked' : '' ?>>
                Riêng tư
            </label>
        </div>
        <div class="form-group">
            <label for="">Ưu tiên</label>
            <small id="ad-ctg-cr-priority-err"></small>
            <input type="number" value="1" class="form-control" name="priority" placeholder="Giá trị ưu tiên" <?= $category['priority'] ?> id="ad-ctg-cr-priority" onkeyup="validateInt(this, 'Priority');">

        </div>
    </div>


    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>

<?php view('shared.admin.footer'); ?>