<?php view('shared.admin.header', ['title' => 'Bảng điều khiển']);
?>

<!-- Các hộp nhỏ (Thống kê) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- hộp nhỏ -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $total_orders ?></h3>

                <p>Tổng số đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="./?module=admin&controller=order" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- hộp nhỏ -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $total_products ?></h3>

                <p>Tổng số sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?module=admin&controller=product" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- hộp nhỏ -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $total_customers ?></h3>

                <p>Tổng số khách hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="./?module=admin&controller=account" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- hộp nhỏ -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $avg_rating ?><sup style="font-size: 20px">/5</sup></h3>

                <p>Đánh giá trung bình</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="./?module=admin&controller=review" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <h2>
            Sản phẩm hàng đầu
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Đã bán</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_products as $model) : ?>
                    <tr>
                        <td><?= $model['name'] ?></td>
                        <td><?= $model['category_name'] ?></td>
                        <td><span class="badge badge-warning">$<?= number_format($model['price'], 2, '.', '') ?></span>
                        </td>


                        <td>
                            <img src="./public/uploads/<?= $model['image'] ?>" width="60">
                        </td>
                        <td>
                            <?= $model['purchased'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        <h2>
            Khách hàng hàng đầu
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Tỉnh</th>
                    <th>Đơn hàng</th>
                    <th>Chi tiêu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_customers as $customer) : ?>
                    <tr>
                        <td><?= $customer['fname'] . ' ' . $customer['lname'] ?></td>
                        <td><?= $customer['phone'] ?></td>
                        <td><?= $customer['province'] ?></td>
                        <td><?= $customer['orders'] ?></td>
                        <td><span class="badge badge-warning">$<?= number_format($customer['spendings'], 2, '.', '') ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<!-- /.row -->


<?php view('shared.admin.footer');
?>