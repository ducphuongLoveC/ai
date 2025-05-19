<?php view('shared.admin.header', [
    'title' => 'Đánh giá sản phẩm'
]); ?>

<form action="./?module=admin&controller=review&action=searchReviewListFull" class="form-inline" method="post">

    <div class="form-group">
        <input class="form-control search-input" name="reviewSearch" placeholder="Tìm theo tên">
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
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th class="text-center">Đánh giá trung bình</th>
            <th class="text-center">Số lượng đánh giá</th>
            <th class="text-center">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $model) : ?>
            <tr>
                <td><?= $model['id'] ?></td>
                <td><?= $model['name'] ?></td>
                <td>
                    <img src="./public/uploads/<?= $model['image'] ?>" width="60">
                </td>
                <td class="text-center"><?= $model['average_rating'] ?>/5.0</td>

                <td class="text-center"><?= $model['total_review'] ?></td>

                <td class="text-center">

                    <a href="./?module=admin&controller=review&action=reviewDetail&id=<?= $model['id'] ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-info-circle"></i>
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