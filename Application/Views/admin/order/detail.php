<?php view('shared.admin.header', [
    'title' => 'Chi tiết đơn hàng'
]); ?>

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

    .timeline > li {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-badge {
        width: 32px;
        height: 32px;
        position: absolute;
        border-radius: 50%;
        background: #ccc;
        left: 31px;
        top: 15px;
        margin-left: -16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .timeline-badge i {
        color: #fff;
        font-size: 16px;
        display: none;
    }

    .completed .timeline-badge {
        background: #28a745;
    }

    .completed .timeline-badge i {
        display: block;
    }

    .canceled .timeline-badge {
        background: #dc3545;
    }

    .canceled .timeline-badge i.fa-times-circle {
        display: block;
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
                    <h2>Chi tiết đơn hàng</h2>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fname">Tên</label>
                            <input value="<?= $order['fname'] ?>" type="text" name="fname" id="fname"
                                class="form-control" aria-describedby="helpId" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Họ</label>
                            <input value="<?= $order['lname'] ?>" type="text" name="lname" id="lname"
                                class="form-control" aria-describedby="helpId" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email">Địa chỉ Email</label>
                            <input value="<?= $order['email'] ?>" type="text" name="email" id="email"
                                class="form-control" aria-describedby="helpId" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?= $order['phone'] ?>" type="text" name="phone" id="phone"
                                class="form-control" aria-describedby="helpId" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="province">Tỉnh/Thành phố</label>
                        <select class="form-control" id="province" name="province" disabled>
                            <option value="<?= $order['province'] ?>"><?= $order['province'] ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input value="<?= $order['address'] ?>" type="text" name="address" id="address"
                            class="form-control" aria-describedby="helpId" disabled>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú đơn hàng</label>
                        <textarea class="form-control" name="note" rows="5" placeholder="Notes on your order"
                            disabled><?= $order['note'] ?></textarea>
                    </div>
                    <h2 style="margin-top: 2.5rem;">Phương thức vận chuyển</h2>
                    <div class="form-group">
                        <select class="form-control" id="delivery" name="delivery" disabled>
                            <option value="<?= $order['delivery'] ?>"><?= $order['delivery'] ?></option>
                        </select>
                    </div>
                    <h2 style="margin-top: 2.5rem;">Phương thức thanh toán</h2>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <?php
                        $convertText = [
                            'Cash on delivery' => 'Thanh toán khi nhận hàng',
                            'bank' => 'Chuyển khoản ngân hàng',
                            'paypal' => 'Thanh toán qua Paypal'
                        ];
                        ?>
                        <select class="form-control" id="payment" name="payment" disabled>
                            <option value="<?= $order['payment'] ?>"><?= $convertText[$order['payment']] ?></option>
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
                                    <p>Phí vận chuyển:</p>
                                </div>
                            </td>
                            <td>
                                <div class="checkout-fee text-right">
                                    <p>$<?= number_format($order['total'], 2, '.', '') ?></p>
                                    <?php if ($order['coupon'] != 0): ?>
                                        <p>- $<?= number_format($order['total'] * ($order['coupon']), 2, '.', '') ?></p>
                                    <?php endif; ?>
                                    <p>$2.00</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tr class="order-total">
                        <td>
                            <h2>Tổng đơn hàng</h2>
                        </td>
                        <td>
                            <h2 class="price" style="text-align: right">
                                $<?= number_format($order['total'] * (1 - $order['coupon']) + 2, 2, '.', '') ?>
                            </h2>
                        </td>
                    </tr>
                    <form action="./?module=admin&controller=order&action=update&id=<?= htmlspecialchars($_GET['id']) ?>" method="POST" role="form">
                        <tfoot>
                            <tr>
                                <td colspan="2" style="padding-top: 7px">
                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <?php
                                            $statusList = [
                                                1 => 'Chưa giải quyết',
                                                2 => 'Đang giao hàng',
                                                0 => 'Đã giao hàng',
                                                3 => 'Đã hủy',
                                            ];
                                            $allowedStatuses = [];
                                            if ($order['status'] == 1) {
                                                $allowedStatuses = [1, 2, 0, 3]; // Pending -> Delivering, Delivered, Canceled
                                            } elseif ($order['status'] == 2) {
                                                $allowedStatuses = [2, 0, 3]; // Delivering -> Delivered, Canceled
                                            } elseif ($order['status'] == 0) {
                                                $allowedStatuses = [0]; // Delivered -> No change
                                            } elseif ($order['status'] == 3) {
                                                $allowedStatuses = [3]; // Canceled -> No change
                                            }
                                            foreach ($statusList as $key => $label) {
                                                if (in_array($key, $allowedStatuses)) {
                                                    echo "<option value='$key' " . ($order['status'] == $key ? 'selected' : '') . ">$label</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="order-timeline">
                                        <ul class="timeline">
                                            <!-- Chưa giải quyết -->
                                            <li class="<?= ($order['status'] == 1 || $order['status'] == 2 || $order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'canceled' : '') ?>">
                                                <div class="timeline-badge">
                                                    <i class="fas fa-cog"></i>
                                                </div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Chưa giải quyết</h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Đơn hàng đang được chuẩn bị</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- Đang giao hàng -->
                                            <li class="<?= ($order['status'] == 2 || $order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'canceled' : '') ?>">
                                                <div class="timeline-badge">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">Đang giao hàng</h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Shipper đang vận chuyển</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- Đã giao hàng -->
                                            <li class="<?= ($order['status'] == 0) ? 'completed' : ($order['status'] == 3 ? 'canceled' : '') ?>">
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
                                            <!-- Đã hủy -->
                                            <?php if ($order['status'] == 3): ?>
                                                <li class="canceled">
                                                    <div class="timeline-badge">
                                                        <i class="fas fa-times-circle"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-heading">
                                                            <h4 class="timeline-title">Đã hủy</h4>
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
                            <tr>
                                <td colspan="2" style="border: none; padding-top: 20px">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Lưu đơn hàng">
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
    </div>
</section>

<?php view('shared.admin.footer'); ?>