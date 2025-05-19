<?php view('shared.site.header', [
    'title' => 'Lịch sử đặt hàng'
]); ?>


<section class="p-50">
    <div class="container-fluid" style="padding: 0 50px">
        <table class="table cart-table order-list-table">
            <thead style="border-top: none;">
                <tr>

                    <th>
                        Order ID
                    </th>
                    <th>
                        Tên
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Tỉnh
                    </th>
                    <th>
                        Tạo
                    </th>
                    <th>
                        Trạng thái
                    </th>
                    <th>
                        Số lượng sản phẩm
                    </th>
                    <th>
                        Tổng
                    </th>
                    <th>
                        Chi tiết
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr class="text-center">
                        <td>

                            <?= $order['id'] ?>


                        </td>

                        <td>
                            <?= $order['fname'] . ' ' . $order['lname'] ?>

                        </td>

                        <td>
                            <?= $order['phone'] ?>
                        </td>
                        <td>
                            <?= $order['address'] ?>
                        </td>
                        <td>
                            <?= $order['province'] ?>
                        </td>
                        <td>
                            <?= $order['created_at'] ?>
                        </td>
                        <td>
                            <?php if ($order['status'] == 1) : ?>
                                <span class="badge badge-info">Chưa giải quyết</span>
                            <?php endif; ?>
                            <?php if ($order['status'] == 0) : ?>
                                <span class="badge badge-success">Đã giao hàng</span>
                            <?php endif; ?><?php if ($order['status'] == 2) : ?>
                                <span class="badge badge-warning">Giao hàng</span>
                            <?php endif; ?>
                            <?php if ($order['status'] == 3) : ?>
                                <span class="badge badge-danger">Đã hủy</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?= $order['quantity'] ?>
                        </td>
                        <td>
                            $<?= number_format(($order['total']) * (1 - $order['coupon']) + 2, 2, '.', '') ?>
                        </td>
                        <td> <a title="Xem chi tiết đơn hàng" href="./?controller=customer&action=orderDetail&id=<?= $order['id'] ?>" class="btn btn-sm btn-success">
                                <i class="fas fa-info-circle"></i></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>



        </table>
        <?= $pagination ?>
    </div>

</section>
<?php view('shared.site.footer'); ?>