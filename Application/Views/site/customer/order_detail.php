<?php view('shared.site.header', [
    'title' => 'Lịch sử đặt hàng'
]); ?>




<style>
    .cart-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>

<style>
    .order-timeline {
        margin: 20px 0;
        padding: 0;
    }

    .timeline {
        list-style: none;
        padding: 0;
        position: relative;
    }

    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #ddd;
        left: 31px;
        margin-left: -1.5px;
    }

    .timeline>li {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-badge {
        width: 32px;
        /* Larger size for prominence */
        height: 32px;
        position: absolute;
        border-radius: 50%;
        background: #ccc;
        /* Gray for inactive */
        left: 31px;
        top: 15px;
        margin-left: -16px;
        /* Adjust for larger size */
        display: flex;
        align-items: center;
        justify-content: center;
        /* Center the icon */
    }

    .timeline-badge i {
        color: #fff;
        /* White icon color */
        font-size: 16px;
        /* Larger icon size */
        display: none;
        /* Hidden by default */
    }

    .completed .timeline-badge {
        background: #28a745;
        /* Green for completed */
    }

    .completed .timeline-badge i {
        display: block;
        /* Show icon for completed */
    }

    .cancelled .timeline-badge {
        background: #dc3545;
        /* Red for cancelled */
    }

    .cancelled .timeline-badge i.fa-times-circle {
        display: block;
        /* Show cancel icon only for cancelled step */
    }

    .timeline-panel {
        margin-left: 60px;
        padding: 10px 15px;
        background: #f8f9fa;
        border-radius: 5px;
        position: relative;
        border: 1px solid #e9ecef;
    }

    .timeline-panel:before {
        content: " ";
        display: inline-block;
        position: absolute;
        top: 15px;
        left: -8px;
        border-top: 8px solid transparent;
        border-right: 8px solid #e9ecef;
        border-bottom: 8px solid transparent;
    }

    .timeline-panel:after {
        content: " ";
        display: inline-block;
        position: absolute;
        top: 15px;
        left: -7px;
        border-top: 8px solid transparent;
        border-right: 8px solid #f8f9fa;
        border-bottom: 8px solid transparent;
    }

    .timeline-title {
        margin-top: 0;
        color: inherit;
        font-size: 16px;
        font-weight: 600;
    }

    .timeline-body p {
        margin-bottom: 0;
        font-size: 14px;
    }
</style>

<section class="checkout p-50">
    <div class="container">
        <div class="row">

            <div class="col-md-7">

                <div class="bill-form-block">
                    <h2>
                        Chi tiết đặt hàng
                    </h2>


                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fname">Tên <span class="asterisk">*</span></label>
                            <input value="<?= $order['fname'] ?>" type="text" name="fname" id="fname"
                                class="form-control" aria-describedby="helpId" disabled>

                        </div>

                        <div class="col-md-6">
                            <label for="lname">Họ <span class="asterisk">*</span></label>
                            <input value="<?= $order['lname'] ?>" type="text" name="lname" id="lname"
                                class="form-control" aria-describedby="helpId" disabled>



                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email">Địa chỉ Email <span class="asterisk">*</span></label>
                            <input value="<?= $order['email'] ?>" type="text" name="email" id="email"
                                class="form-control" aria-describedby="helpId" disabled>

                        </div>

                        <div class="col-md-6">
                            <label for="phone">Số điện thoại <span class="asterisk">*</span></label>
                            <input value="<?= $order['phone'] ?>" type="text" name="phone" id="phone"
                                class="form-control" aria-describedby="helpId" disabled>

                            <div>

                            </div>

                        </div>

                    </div>




                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố <span class="asterisk">*</span></label>
                        <select class="form-control" id="province" name="province" disabled>

                            <option value="<?= $order['province'] ?>"><?= $order['province'] ?></option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ <span class="asterisk">*</span></label>

                        <input value="<?= $order['address'] ?>" type="text" name="address" id="address"
                            class="form-control" aria-describedby="helpId" disabled>

                    </div>

                    <div class="form-group">
                        <label for="note">Ghi chú đơn hàng</label>

                        <textarea class="form-control" name="note" rows="5" placeholder=""
                            disabled><?= $order['note'] ?></textarea>

                    </div>



                    <h2 style="margin-top: 2.5rem;">Phương thức giao hàng</h2>
                    <div class="form-group">
                        <label for="delivery">Chọn phương thức giao hàng</label>

                        <select class="form-control" id="delivery" name="delivery" disabled>
                            <option value="<?= $order['delivery'] ?>"><?= $order['delivery'] ?></option>
                        </select>

                    </div>

                    <h2 style="margin-top: 2.5rem;">Phương thức vận chuyển</h2>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="payment">Chọn phương thức vận chuyển</label>

                        <?php
                        $payment = [
                            'Cash on delivery' => 'Thanh toán khi nhận hàng',
                            'Credit card' => 'Thẻ tín dụng',
                            'PayPal' => 'PayPal'
                        ];
                        ?>
                        <select class="form-control" id="payment" name="payment" disabled>
                            <option value="<?= $order['payment'] ?>"><?= $payment[$order['payment']] ?> </option>
                        </select>

                    </div>



                </div>

            </div>


            <div class="col-md-5">
                <h2>Đơn hàng của bạn</h2>
                <table class="table checkout-table">

                    <tbody>
                        <?php foreach ($products_in_order as $item): ?>
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
                        <tr class="order-subtotal">

                            <td>
                                <div class="checkout-pro-info p-0">
                                    <p>Tổng cộng (<?= $order['quantity'] ?> mặt hàng):</p>
                                    <?php if ($order['coupon'] != 0): ?>
                                        <p>Giảm giá: </p>
                                    <?php endif; ?>
                                    <!-- <p>Tax:</p> -->
                                    <p>Phí vận chuyển:</p>
                                </div>

                            </td>
                            <td>
                                <div class="checkout-fee text-right">
                                    <p>
                                        $<?= number_format($order['total'], 2, '.', '') ?>
                                    </p>
                                    <?php if ($order['coupon'] != 0): ?>
                                        <p>
                                            - $<?= number_format($order['total'] * ($order['coupon']), 2, '.', '') ?>
                                        </p>
                                    <?php endif; ?>

                                    <p>
                                        $2.00
                                    </p>
                                </div>
                            </td>

                        </tr>
                    </tbody>

                    <tr class="order-total">
                        <td>
                            <h2>Tổng đơn hàng</h2>
                        </td>

                        <td>
                            <h2 class="price">
                                $<?= number_format($order['total'] * (1 - $order['coupon']) + 2, 2, '.', '') ?></h2>
                        </td>
                    </tr>

                    <form action="./?controller=customer&action=cancelOrder&id=<?= $order['id'] ?>" method="POST"
                        role="form">


                        <tr>
                            <td colspan="2" style="padding-top: 7px">
                                <div class="order-timeline">
                                    <ul class="timeline">
                                        <!-- Bước 1: Đơn hàng đã đặt -->
                                        <li class="<?= ($order['status'] != 3) ? 'completed' : 'cancelled' ?>">
                                            <div class="timeline-badge">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Đơn hàng đã đặt</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><?= $order['created_at'] ?></p>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Bước 2: Đang xử lý -->
                                        <li
                                            class="<?= ($order['status'] == 1 || $order['status'] == 2 || $order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'cancelled' : '') ?>">
                                            <div class="timeline-badge">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Đang xử lý</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Đơn hàng đang được chuẩn bị</p>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Bước 3: Đang giao hàng -->
                                        <li
                                            class="<?= ($order['status'] == 2 || $order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'cancelled' : '') ?>">
                                            <div class="timeline-badge">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Đang giao hàng</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Shipper đang vận chuyển đến bạn</p>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Bước 4: Đã giao hàng -->
                                        <li
                                            class="<?= ($order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'cancelled' : '') ?>">
                                            <div class="timeline-badge">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Đã giao hàng</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Giao hàng thành công</p>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Hiển thị riêng nếu đơn bị hủy -->
                                        <?php if ($order['status'] == 3): ?>
                                            <li class="cancelled">
                                                <div class="timeline-badge">
                                                    <i class="fas fa-times-circle"></i>
                                                </div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Đã hủy đơn</h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Đơn hàng đã bị hủy</p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php if ($order['status'] == 1): ?>
                            <tr>

                                <td colspan="2" style="border: none; padding-top: 20px">
                                    <div class="form-group">
                                        <input type="submit" class="btn-root border-root place-order-btn btn-cancel"
                                            value="Hủy đơn hàng">
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </form>

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


        </div>
    </div>
</section>
<?php view('shared.site.footer'); ?>