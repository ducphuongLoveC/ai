<?php view('shared.site.header', [
    'title' => 'Chỉnh sửa hồ sơ'
]);
require './Config/province.php'; ?>

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

<style>
    .checkout-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>
<section class="checkout p-50">
    <div class="container">

        <div class="row">

            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin: 0 auto">

                <div class="bill-form-block">

                    <div style="margin-bottom: 1.5rem">
                        <h2 style="display: inline">
                            Chi tiết hồ sơ
                        </h2>

                        <h5 style="display: inline; margin-top: 12px; float:right">Trạng thái: &nbsp;
                            <?php if ($user['status'] == 0) : ?>
                                <span class="invalid-error">Bị chặn</span>
                            <?php else : ?>
                                <span style="color: #28a745;  ">Hoạt động</span>
                            <?php endif; ?>
                        </h5>

                    </div>
                    <form method="POST" action="?controller=customer&action=updateProfile" name="profileForm" onsubmit="return validateProfileForm();">


                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fname">Tên <span class="asterisk">*</span></label>
                                <input type="text" value="<?= htmlentities($_SESSION['user']['fname']) ?>" name="fname" id="pf-ud-fname" class="form-control" aria-describedby="helpId" onkeyup="validateName(this, 'Tên')">
                                <small id="pf-ud-fname-err"></small>

                            </div>

                            <div class="col-md-6">
                                <label for="lname">Họ <span class="asterisk">*</span></label>
                                <input type="text" value="<?= htmlentities($_SESSION['user']['lname']) ?>" name="lname" id="pf-ud-lname" class="form-control" aria-describedby="helpId" onkeyup="validateName(this, 'Họ')">
                                <small id="pf-ud-lname-err"></small>


                            </div>


                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email">Địa chỉ Email <span class="asterisk">*</span></label>
                                <input type="text" value="<?= htmlentities($_SESSION['user']['email']) ?>" name="email" id="pf-ud-email" class="form-control" aria-describedby="helpId" onkeyup="validateEmail(this)">
                                <small id="pf-ud-email-err"></small>

                            </div>

                            <div class="col-md-6">
                                <label for="phone">Số điện thoại <span class="asterisk">*</span></label>
                                <input type="text" value="<?= htmlentities($_SESSION['user']['phone']) ?>" name="phone" id="pf-ud-phone" class="form-control" aria-describedby="helpId" onkeyup="validatePhone(this)">
                                <small id="pf-ud-phone-err"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="province">Tỉnh/Thành phố <span class="asterisk">*</span></label>
                            <select class="form-control" id="province" name="province">
                                <?php foreach ($provinces as $province) : ?>
                                    <option value="<?= $province['value'] ?>" <?= $_SESSION['user']['province'] == $province['value'] ? 'selected' : '' ?>>
                                        <?= $province['province'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="asterisk">*</span></label>
                            <input value="<?= htmlentities($_SESSION['user']['address']); ?>" type="text" name="address" id="pf-ud-address" class="form-control" aria-describedby="helpId" onkeyup="validateNotEmpty(this, 'Address')">
                            <small id="pf-ud-address-err"></small>


                        </div>

                        <div class="form-group">
                            <label for="password">Xác nhận mật khẩu <span class="asterisk">*</span></label>
                            <input id="pf-ud-password" type="password" class="form-control" name="current_password" autocomplete="mật khẩu hiện tại" onkeyup="validateNotEmpty(this, 'Password')">
                            <small id="pf-ud-password-err"></small>
                        </div>




                        <div class="form-group" style="border-top: 1px solid lightgray; padding-top: 1.5rem;">
                            <button type="submit" class="btn-root border-root place-order-btn">Cập nhật hồ sơ</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div class="bill-form-block" style="border: none; padding-left: 2rem; padding-right:0">
                    <h2>
                        Cập nhật mật khẩu
                    </h2>

                    <form method="POST" action="?controller=customer&action=updatePassword" name="passwordUpdateForm" onsubmit="return validatePasswordUpdateForm();">



                        <div class="form-group">
                            <label for="password">Mật khẩu hiện tại <span class="asterisk">*</span></label>


                            <input id="psw-ud-password" type="password" class="form-control" name="current_password" autocomplete="current-password" onkeyup="validateNotEmpty(this, 'Current password');">
                            <small id="psw-ud-password-err"></small>

                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu mới <span class="asterisk">*</span></label>


                            <input id="psw-ud-new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" onkeyup="validatePassword(this);">
                            <small id="psw-ud-new_password-err"></small>

                        </div>

                        <div class="form-group">
                            <label for="password">Xác nhận mật khẩu mới <span class="asterisk">*</span></label>


                            <input id="psw-ud-new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" onkeyup="validateConfirmPassword(this, 'psw-ud-new_password');">
                            <small id="psw-ud-new_confirm_password-err"></small>

                        </div>


                        <div class="form-group" style="border-top: 1px solid lightgray; padding-top: 1.5rem;">
                            <button type="submit" class="btn-root border-root place-order-btn">Cập nhật mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php view('shared.site.footer'); ?>