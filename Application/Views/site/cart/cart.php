<?php view('shared.site.header', [
    'title' => 'Cart'
]); ?>
<style>
    .cart-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>


<section class="p-50">

    <div class="container">
        <table class="table cart-table">
            <thead style="border-top: none;">
                <tr>

                    <th>
                        <h4>Sản phẩm</h4>
                    </th>
                    <th>
                        <h4>Giá</h4>
                    </th>
                    <th class="text-center">
                        <h4>Số lượng</h4>
                    </th>
                    <th>
                        <h4>Tổng cộng</h4>
                    </th>
                    <th>
                        <a title="Remove all products in cart" class="delete-all-pro" href="./?controller=cart&action=clear"><span class="del-cart-all-pro">
                                <i class="far fa-trash-alt"></i>
                            </span></a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart->items as $item) : ?>
                    <tr id="cart-item-<?= $item['id'] ?>" class="cart-item-class">
                        <td class="cart-pro-title">
                            <a href="./?controller=product&action=productDetail&id=<?= $item['id'] ?>">
                                <img src="./public/uploads/<?= $item['image'] ?>" width="100">
                                <span>
                                    <h5><?= $item['name'] ?></h5>
                                </span>
                            </a>

                        </td>

                        <td>
                            <h5>$<?= number_format($item['price'], 2, '.', '') ?></h5>
                        </td>

                        <td class="text-center">
                            <div class="pro-qty">
                                <a onClick="cartAjaxController(<?= $item['id'] ?>, <?= isset($coupon) ? $coupon : 0 ?>, 'remove')" class="dec qtybtn"><i class="ti ti-minus"></i></button></a>
                                <form action="./?controller=cart&action=update" method="POST" id="update-quantity-form<?= $item['id'] ?>">
                                    <input type="number" value="<?= $item['quantity'] ?>" id="<?= $item['id'] ?>quantity" name='quantity' min="0">

                                    <input type="hidden" name="id" id="" class="form-control" value="<?= $item['id'] ?>">

                                    <button type="submit" style="display: none;" class="update-btn-press"></button>
                                </form>
                                <a onClick="cartAjaxController(<?= $item['id'] ?>, <?= isset($coupon) ? $coupon : 0 ?>, 'add')" class="inc qtybtn"><i class="ti ti-plus"></i></button></a>

                            </div>
                        </td>
                        <td>
                            <h5 id="prod-overall-price<?= $item['id'] ?>">
                                $<?= number_format($item['price_sum'], 2, '.', '') ?></h5>

                        </td>
                        <td> <a title="Remove this product" class="delete-pro" onClick="cartAjaxController(<?= $item['id'] ?>, <?= isset($coupon) ? $coupon : 0 ?>, 'delete')"><span class="del-cart-pro"><i class="ti ti-close"></i></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <form action="./?controller=cart&action=applyCoupon" method="POST" class="coupon">
                            <input value="<?= !empty($coupon_id) ? $coupon_id : ''  ?>" type="text" placeholder="Nhập mã phiếu giảm giá của bạn" id="coupon_id" name="coupon_id">

                            <button type="submit" class="site-btn">Áp dụng phiếu giảm giá</button>
                            <?php if (isset($coupon)) : ?>
                                <?php if ($coupon == 0) : ?>
                                    <div>
                                        <small class="invalid-error">Mã giảm giá không hợp lệ</small>
                                    </div>
                                <?php endif; ?>
                                <?php if ($coupon != 0) : ?>
                                    <div>
                                        <small style="color: #28a745">Phiếu giảm giá đã được áp dụng thành công</small>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </form>

                    </td>

                    <td colspan="2">
                        <h4 id="total-in-cart">Tổng cộng: $<?= number_format($cart->total_price, 2, '.', '') ?></h4>
                    </td>
                </tr>

            </tfoot>
        </table>

        <h3 style="margin-bottom: 1.2rem;">Thông tin đặt hàng</h3>
        <table class="order-info-table" style="width: 100%;">
            <tbody>
                <tr>
                    <th>
                        <h5>Tổng cộng </h5>
                    </th>
                    <td><span class="price" id="sub-total-price">$<?= number_format($cart->total_price, 2, '.', '') ?></span></td>
                </tr>

                <tr>
                    <th>
                        <h5>Mã giảm giá</h5>
                    </th>
                    <td>
                        <?php if (isset($coupon)) : ?>
                            <?php if ($coupon != 0) : ?>
                                <span class="discount">-(<?= number_format(100 * $coupon, 0, '.', '') ?>%)
                                    <?= strtoupper($coupon_id) ?></span>
                            <?php endif; ?>
                            <?php if ($coupon == 0) : ?>
                                <span>Không áp dụng phiếu giảm giá</span>
                            <?php endif; ?>
                        <?php else : ?>
                            <span>Không áp dụng phiếu giảm giá</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <h5>Tổng</h5>
                    </th>
                    <td>
                        <?php if (isset($coupon)) : ?>
                            <?php if ($coupon != 0) : ?>
                                <span class="price" id="tổng giá">$<?= number_format($cart->total_price * (1 - $coupon), 2, '.', '') ?></span>
                    </td>
                <?php endif; ?>
                <?php if ($coupon == 0) : ?>
                    <span class="price" id="tổng giá">$<?= number_format($cart->total_price, 2, '.', '') ?></span>

                <?php endif; ?>
            <?php else : ?>
                <span class="price" id="tổng giá">$<?= number_format($cart->total_price, 2, '.', '') ?></span>
            <?php endif; ?>


            </td>
                </tr>
            </tbody>


            <tfoot>
                <tr>
                    <td colspan="1">
                        <a href="./?controller=product&action=allProducts" class="cs-btn border-root btn-white">Tiếp tục
                        mua sắm</a>
                    </td>

                    <td class="text-right">
                        <a href="./?controller=checkout" class="btn-root ptc-btn border-root">Tiến hành thanh toán</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</section>

<?php view('shared.site.footer'); ?>