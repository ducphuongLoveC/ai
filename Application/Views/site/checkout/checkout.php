<?php view('shared.site.header', [
    'title' => 'Thanh toán'
]);
require './Config/province.php'; ?>
<style>
    .checkout-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>

<section class="checkout p-50">
    <div class="container">
        <div class="row">
            <?php if (count($cart->items) > 0) { ?>
                <div class="col-md-7">
                    <?php if (empty($_SESSION['user']) || $user['status'] == 0): ?>

                        <div class="error-block" style="padding: 0 5% ">

                            <h2>Đăng nhập để thanh toán!</h2>
                            <p>Nếu đã có tài khoản. Bấm <a> <button class="login-modal p-0"
                                        style="font-family: inherit; width:unset"
                                        onclick="document.getElementById('id01').style.display='block'" style="width:auto;">vào
                                        đây</button>
                                </a> để đăng nhập
                            </p>
                            <p>Chưa có tài khoản, bấm <a> <button class="login-modal p-0"
                                        style="font-family: inherit; width:unset"
                                        onclick="document.getElementById('id02').style.display='block'" style="width:auto;">vào
                                        đây</button>
                                </a>
                            </p>
                            <div class="img-container">
                                <img src="./public/uploads/404.png" alt="">
                            </div>


                        </div>
                    <?php else: ?>
                        <div class="bill-form-block">
                            <h2>
                                Chi tiết thanh toán
                            </h2>

                            <form method="POST" action="./?controller=checkout&action=process" name="checkoutForm"
                                onsubmit="return validateCheckoutForm();">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="fname">Tên <span class="asterisk">*</span></label>
                                        <input type="text" value="<?= $_SESSION['user']['fname'] ?>" name="fname" id="co-fname"
                                            class="form-control" aria-describedby="helpId"
                                            onkeyup="validateName(this, 'First name');">
                                        <small id="co-fname-err"></small>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="lname">Họ <span class="asterisk">*</span></label>
                                        <input type="text" value="<?= $_SESSION['user']['lname'] ?>" name="lname" id="co-lname"
                                            class="form-control" aria-describedby="helpId"
                                            onkeyup="validateName(this, 'Last name');">
                                        <small id="co-lname-err"></small>


                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="email">Địa chỉ Email <span class="asterisk">*</span></label>
                                        <input type="text" value="<?= $_SESSION['user']['email'] ?>" name="email" id="co-email"
                                            class="form-control" aria-describedby="helpId" onkeyup="validateEmail(this);">
                                        <small id="co-email-err"></small>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone">Số điện thoại <span class="asterisk">*</span></label>
                                        <input type="text" value="<?= $_SESSION['user']['phone'] ?>" name="phone" id="co-phone"
                                            class="form-control" aria-describedby="helpId" onkeyup="validatePhone(this);">
                                        <small id="co-phone-err"></small>
                                        <div>

                                        </div>

                                    </div>

                                </div>




                                <div class="form-group">
                                    <label for="province">Tỉnh/Thành phố <span class="asterisk">*</span></label>
                                    <select class="form-control" id="province" name="province">
                                        <?php foreach ($provinces as $province): ?>
                                            <option value="<?= $province['value'] ?>" <?php $_SESSION['user']['province'] == $province['value'] ? 'selected' : ''
                                                  ?>><?= $province['province'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ <span class="asterisk">*</span></label>

                                    <input value="<?= $_SESSION['user']['address'] ?>" type="text" name="address"
                                        id="co-address" class="form-control" aria-describedby="helpId"
                                        onkeyup="validateNotEmpty(this, 'Address');">
                                    <small id="co-address-err"></small>

                                </div>

                                <div class="form-group">
                                    <label for="note">Ghi chú đơn hàng</label>

                                    <textarea class="form-control" name="note" rows="5"
                                        placeholder="Ghi chú về đơn hàng của bạn"></textarea>

                                </div>



                                <h2 style="margin-top: 2.5rem;">Phương thức vận chuyển</h2>
                                <div class="form-group">
                                    <label for="delivery">Chọn phương thức giao hàng</label>

                                    <select class="form-control" id="delivery" name="delivery">
                                        <option value="Giaohangtietkiem">Giaohangtietkiem</option>
                                        <option value="J&T Express">J&T Express </option>
                                        <option value="Giaohangnhanh">Giaohangnhanh </option>
                                        <option value="NowShip">Now Ship </option>

                                    </select>

                                </div>

                                <h2 style="margin-top: 2.5rem;">Phương thức thanh toán</h2>
                                <div class="form-group" style="margin-bottom: 1.5rem;">
                                    <label for="payment">Phương thức thanh toán</label>

                                    <select class="form-control" id="payment" name="payment">
                                        <option value="Cash on delivery">Thanh toán khi nhận hàng </option>
                                        <!-- <option value="Mastercard">Mastercard </option>
                                        <option value="Visa">Visa </option>
                                        <option value="Internet Banking">Internet Banking </option> -->

                                    </select>

                                </div>

                                <div class="form-group" style="border-top: 1px solid lightgray; padding-top: 1.5rem;">
                                    <button type="submit" class="btn-root border-root place-order-btn">Đặt hàng</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="col-md-5">
                    <h2>Đơn hàng của bạn</h2>
                    <table class="table checkout-table">

                        <tbody>
                            <?php foreach ($cart->items as $item): ?>
                                <tr class="checkout-pro">
                                    <td class="checkout-pro-title">
                                        <img src="./public/uploads/<?= $item['image'] ?>" width="100">
                                        <div class="checkout-pro-info">

                                            <h6><?= $item['name'] ?></h6>

                                            <p>$<?= number_format($item['price_sum'], 2, '.', '') ?></p>
                                        </div>

                                    </td>

                                    <td class="checkout-pro-quantity text-right">
                                        X<?= $item['quantity'] ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            <tr class="tổng đơn hàng">

                                <td>
                                    <div class="checkout-pro-info p-0">
                                        <p>Tổng cộng (<?= $cart->total_quantity ?> mặt hàng):</p>
                                        <!-- <p>Tax:</p> -->
                                        <?php if ($_SESSION['coupon'] != 0): ?>
                                            <p>Giảm giá: </p>
                                        <?php endif; ?>
                                        <p>Phí vận chuyển:</p>

                                    </div>

                                </td>
                                <td>
                                    <div class="checkout-fee text-right">
                                        <p>
                                            $<?= number_format($cart->total_price, 2, '.', '') ?>
                                        </p>
                                        <!-- <p>
                                        $0.00
                                    </p> -->
                                        <?php if ($_SESSION['coupon'] != 0): ?>
                                            <p>
                                                - $<?= number_format(($cart->total_price) * $_SESSION["coupon"], 2, '.', '') ?>
                                            </p>
                                        <?php endif; ?>
                                        <p>
                                            $2.00
                                        </p>

                                    </div>
                                </td>

                            </tr>
                        </tbody>

                        <tr class="tổng đơn hàng">
                            <td>
                                <h2>Tổng đơn hàng</h2>
                            </td>

                            <?php if ($_SESSION['coupon'] != 0): ?>
                                <td>
                                    <h2 class="price">
                                        $<?= number_format(($cart->total_price) * (1 - $_SESSION["coupon"]) + 2, 2, '.', '') ?>
                                    </h2>
                                </td>
                            <?php endif; ?>
                            <?php if ($_SESSION['coupon'] == 0): ?>
                                <td>
                                    <h2 class="price">$<?= number_format(($cart->total_price) + 2, 2, '.', '') ?></h2>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <tfoot>

                            <tr>
                                <td colspan="2">
                                    Bạn có câu hỏi? hoặc cần trợ giúp để hoàn tất đơn hàng của bạn?
                                    <p> <i class="discount fas fa-phone-alt mr-2" style="font-size: 13px;"></i>0987 654 321
                                        <i class="discount far fa-envelope ml-4 mr-2"></i>xipr0vjp00@gmail.com
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            <?php } else { ?>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="error-block cart-empty">
                        <div class="img-container" style="margin-bottom: 40px">
                            <img src="./public/site/img/gio-hang-trong.png" alt="">
                        </div>
                        <p><a href="./?controller=product&action=allProducts" class="btn-root ptc-btn border-root">Tiếp tục
                                mua sắm</a>
                        </p>


                    </div>

                </div>



            <?php } ?>
        </div>
    </div>
</section>


<?php view('shared.site.footer'); ?>