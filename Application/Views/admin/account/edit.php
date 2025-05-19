<?php view('shared.admin.header', [
    'title' => 'Chỉnh sửa tài khoản'
]); ?>
<form action="./?module=admin&controller=account&action=update&id=<?= $_GET['id'] ?>" method="POST" role="form"
    name="accountForm">
    <section class="checkout p-50">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="margin: 0 auto">
                    <div class="bill-form-block">
                        <h2>Chi tiết tài khoản</h2>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fname">Tên</label>
                                <input value="<?= $user['fname'] ?>" type="text" name="fname" id="fname"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Họ</label>
                                <input value="<?= $user['lname'] ?>" type="text" name="lname" id="lname"
                                    class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Địa chỉ Email</label>
                                <input value="<?= $user['email'] ?>" type="text" name="email" id="email"
                                    class="form-control" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Số điện thoại</label>
                                <input value="<?= $user['phone'] ?>" type="text" name="phone" id="phone"
                                    class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province">Tỉnh/Thành phố</label>
                            <input value="<?= $user['province'] ?>" type="text" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input value="<?= $user['address'] ?>" type="text" name="address" id="address"
                                class="form-control" disabled>
                        </div>

                        <h2>Quản lý vai trò và trạng thái</h2>
                        <div class="form-group">
                            <label for="role">Vai trò</label>
                            <small id="helpId" class="text-muted">Chọn vai trò cho tài khoản</small>
                            <select name="role" class="form-control">
                                <option value="customer" <?= $user['role'] == 'customer' ? 'selected' : '' ?>>Khách hàng
                                </option>
                                <option value="staff" <?= $user['role'] == 'staff' ? 'selected' : '' ?>>Nhân viên</option>
                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Quản trị viên
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <small id="helpId" class="text-muted">Người dùng bị chặn sẽ không thể đặt hàng hoặc đánh giá
                                sản phẩm</small>
                            <select name="status" class="form-control">
                                <option value="1" <?= $user['status'] == '1' ? 'selected' : '' ?>>Hoạt động</option>
                                <option value="0" <?= $user['status'] == '0' ? 'selected' : '' ?>>Bị chặn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu dữ liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php view('shared.admin.footer'); ?>