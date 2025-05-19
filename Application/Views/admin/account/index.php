<?php view('shared.admin.header', [
    'title' => 'Danh sách tài khoản'
]); ?>

<form action="./?module=admin&controller=account&action=searchAccountFull" class="form-inline" method="post">

    <div class="form-group">
        <input class="form-control search-input" name="accountSearch" placeholder="Tìm theo tên">
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
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Tỉnh</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
            <th>Tạo</th>
            <th class="text-right">Hành động</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $convertRole = [
            'admin' => 'Quản trị viên',
            'staff' => 'Nhân viên',
            'customer' => 'Khách hàng'
        ];


        ?>
        <?php foreach ($data as $account): ?>
            <tr>
                <td><?= htmlentities($account['id']) ?></td>
                <td><?= htmlentities($account['fname']) . ' ' . htmlentities($account['lname']) ?></td>
                <td><?= htmlentities($account['email']) ?></td>
                <td><?= htmlentities($account['phone']) ?></td>
                <td><?= htmlentities($account['address']) ?></td>
                <td><?= htmlentities($account['province']) ?></td>
                <td><span
                        class="badge <?= ($account['role'] == 'customer') ? 'badge-warning' : 'badge-info' ?>"><?= $convertRole[$account['role']] ?></span>
                </td>
                <td>
                    <?php if ($account['status'] == 0): ?>
                        <span class="badge badge-danger">Đã chặn</span>
                    <?php else: ?>

                        <span class="badge badge-success">Hoạt động</span>
                    <?php endif; ?>
                </td>
                <td><?= $account['created_at'] ?></td>
                <td class="text-right">

                    <?php if ($account['role'] != 'admin'): ?>
                        <a href="./?module=admin&controller=account&action=edit&id=<?= $account['id'] ?>"
                            class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>

                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<hr>

<?= $pagination ?>

<?php view('shared.admin.footer'); ?>