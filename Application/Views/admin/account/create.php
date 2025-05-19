<?php view('shared.admin.header', [
    'title' => 'Thêm tài khoản'
]); ?>

<?php require './Config/province.php'; ?>


<section class="checkout p-50">
    <form method="POST" action="?controller=account&module=admin&action=store" name="addAccountForm" id="addAccountForm" onsubmit="return validateAddAccountForm();">

        <div class="container">


            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 15px">
                    <?php if (!empty($message['all-error'])) { ?>
                        <div class="alert alert-danger" style="margin-bottom: 0;" id="all-error">
                            <button onclick="document.getElementById('all-error').style.display='none'" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $message['all-error'] ?? '' ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($message['success-update-profile'])) { ?>
                        <div class="alert alert-success" style="margin-bottom: 0;" id="success-update-profile">
                            <button onclick="document.getElementById('success-update-profile').style.display='none'" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= $message['success-update-profile'] ?? '' ?>
                        </div>
                    <?php } ?>
                </div>


            </div>

            <div class="row">

                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">

                    <div class="bill-form-block">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fname">Tên <span class="asterisk">*</span></label>
                                <input type="text" name="fname" id="fname" class="form-control" aria-describedby="helpId" onkeyup="validateName(this, 'First name')">
                                <small class="addAccErr" id="fname-err"></small>

                            </div>

                            <div class="col-md-6">
                                <label for="lname">Họ <span class="asterisk">*</span></label>
                                <input type="text" name="lname" id="lname" class="form-control" aria-describedby="helpId" onkeyup="validateName(this, 'Last name')">
                                <small class="addAccErr" id="lname-err"></small>


                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Địa chỉ Email <span class="asterisk">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" aria-describedby="helpId" onkeyup="validateEmail(this)">
                                <small class="addAccErr" id="email-err"></small>

                            </div>

                            <div class="col-md-6">
                                <label for="phone">Số điện thoại <span class="asterisk">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" aria-describedby="helpId" onkeyup="validatePhone(this)">
                                <small class="addAccErr" id="phone-err"></small>


                            </div>

                        </div>




                        <div class="form-group">
                            <label for="province">Tỉnh/Thành phố <span class="asterisk">*</span></label>
                            <select class="form-control" id="province" name="province">
                                <?php foreach ($provinces as $province) : ?>
                                    <option value="<?= $province['value'] ?>">
                                        <?= $province['province'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="asterisk">*</span></label>
                            <input type="text" name="address" id="address" class="form-control" aria-describedby="helpId" onkeyup="validateNotEmpty(this, 'Address')">
                            <small class="addAccErr" id="address-err"></small>

                        </div>

                    </div>

                </div>


                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <div class="bill-form-block" style="border: none; padding-left: 2rem; padding-right:0">
                        <div class="form-group">
                            <label for="password">Mật khẩu <span class="asterisk">*</span></label>
                            <input id="password" type="password" class="form-control" name="password" autocomplete="current-password" onkeyup="validatePassword(this);">
                            <small class="addAccErr" id="password-err"></small>

                        </div>

                        <div class="form-group">
                            <label for="password">Xác nhận mật khẩu <span class="asterisk">*</span></label>
                            <input id="confirm_password" type="password" class="form-control" name="password_confirmation" autocomplete="current-password" onkeyup="validateConfirmPassword(this, 'password');">
                            <small class="addAccErr" id="confirm_password-err"></small>
                        </div>


                        <div class="form-group">
                            <label for="role">Vai trò</label>

                            <select name="role" class="form-control">
                                <option value="admin">Quản trị viên</option>
                                <option value="staff">Nhân viên</option>
                                <option value="customer">Khách hàng</option>
                            </select>
                        </div>

                        <div class="form-group" style="border-top: 1px solid lightgray; padding-top: 1.5rem;">
                            <button type="submit" class="btn-root border-root place-order-btn">Tạo tài khoản</button>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </form>

</section>

<?php view('shared.admin.footer'); ?>