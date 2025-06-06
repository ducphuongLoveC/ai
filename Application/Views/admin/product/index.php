<?php view('shared.admin.header', [
    'title' => 'Danh sách sản phẩm'
]); ?>
<?php if (!empty($message['error-delete'])) { ?>
<div class="alert alert-danger" id="error-delete-product">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
        onclick="document.getElementById('error-delete-product').style.display='none'">&times;</button>
    <?= $message['error-delete'] ?? '' ?>
</div>
<?php } ?>
<?php if (!empty($message['success-delete'])) { ?>
<div class="alert alert-success" id="success-delete-product">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
        onclick="document.getElementById('success-delete-product').style.display='none'">&times;</button>
    <?= $message['success-delete'] ?? '' ?>
</div>
<?php } ?>
<form action="./?module=admin&controller=product&action=searchProductFull" class="form-inline" method="post">

    <div class="form-group">
        <input class="form-control search-input" name="productSearch" placeholder="Tìm kiếm theo tên..">
    </div>

    <button type="submit" class="btn btn-root search-btn">
        <i class="fas fa-search"></i>
    </button>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Giá/ Giảm giá</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hình ảnh</th>
            <th class="text-right">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $model) : ?>
        <tr>
            <td><?= $model['id'] ?></td>
            <td><?= $model['name'] ?></td>
            <td><?= $model['category_name'] ?></td>
            <td> $<?= number_format($model['price'], 2, '.', '') ?> <span
                    class="badge badge-warning"><?= $model['sale_price'] > 0 ? '$' . number_format($model['sale_price'], 2, '.', '') : 'unset' ?></span>
            </td>
            <td>
                <?php if ($model['status'] == 0) : ?>
                <span class="badge badge-danger">Riêng tư</span>
                <?php else : ?>

                <span class="badge badge-success">Công khai</span>
                <?php endif; ?>
            </td>
            <td><?= $model['created_at'] ?></td>
            <td>
                <img src="./public/uploads/<?= $model['image'] ?>" width="60">
            </td>
            <td class="text-right">


                <a href="./?module=admin&controller=product&action=edit&id=<?= $model['id'] ?>"
                    class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>

                <a href="./?module=admin&controller=product&action=delete&id=<?= $model['id'] ?>"
                    class="btn btn-sm btn-danger btndelete"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                    <i class="fas fa-trash"></i>
                </a>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<hr>
<?= $pagination ?>
<!-- Phân trang -->

<?php view('shared.admin.footer'); ?>