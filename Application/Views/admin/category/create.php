<?php view('shared.admin.header', [
    'title' => 'Thêm dữ liệu'
]); ?>
<?php if (!empty($message['success-add'])) { ?>
    <div class="alert alert-success" id="success-add-category">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('success-add-category').style.display='none'">&times;</button>
        <?= $message['success-add'] ?? '' ?>
    </div>
<?php } ?>

<form action="./?module=admin&controller=category&action=store" method="POST" role="form" name="categoryForm" onsubmit="return validateCategoryForm();">

    <div class="form-group">
        <label for="">Tên</label>
        <small id="ad-ctg-cr-name-err"></small>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên" id="ad-ctg-cr-name" onkeyup="validateNotEmpty(this, 'Category name');">
        <?php if (!empty($message['error-name'])) : ?>
            <small class="help-block invalid-error"><?= $message['error-name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Công khai
            </label>
            <label>
                <input type="radio" name="status" value="0">
                Riêng tư
            </label>
        </div>
        <div class="form-group">
            <label for="">Ưu tiên</label>
            <small id="ad-ctg-cr-priority-err"></small>
            <input type="number" class="form-control" name="priority" placeholder="Giá trị ưu tiên" id="ad-ctg-cr-priority" onkeyup="validateInt(this, 'Priority');">
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
</form>

<?php view('shared.admin.footer'); ?>