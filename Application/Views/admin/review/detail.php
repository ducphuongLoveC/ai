<?php view('shared.admin.header', [
    'title' => "Product '" . $pro['name'] . "' detail review"
]); ?>

<form action="./?module=admin&controller=review&action=searchReviewForProductFull&id=<?= $pro['id'] ?>" class="form-inline" method="post">

    <div class="form-group">
        <input class="form-control" name="reviewSearch" placeholder="Tìm theo tên">
    </div>

    <button type="submit" class="btn btn-root  search-btn">
        <i class="fas fa-search"></i>
    </button>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Đánh giá ID</th>
            <th>Khách hàng</th>
            <th>Email</th>
            <th class="text-center">Xếp hạng</th>
            <th class="text-center">Nội dung</th>
            <th class="text-center">Tạo</th>
            <th class="text-center">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $model) : ?>
            <tr>
                <td><?= $model['id'] ?></td>
                <td><?= $model['fname'] . " " . $model['lname'] ?></td>

                <td><?= $model['email'] ?></td>
                <td class="text-center"><?= $model['rating'] ?>/5.0</td>

                <td class="text-center"><?= $model['content'] ?></td>

                <td class="text-center"><?= $model['created_at'] ?></td>
                <td class="text-center">

                    <a href="./?module=admin&controller=review&action=delete&id=<?= $model['id'] ?>&proId=<?= $pro['id'] ?>" class="btn btn-sm btn-danger btndelete" onclick="return confirm('Bạn có chắc chắn muốn xóa đánh giá này không?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<hr>
<?= $pagination ?>
<!-- Pagination -->


<?php view('shared.admin.footer'); ?>