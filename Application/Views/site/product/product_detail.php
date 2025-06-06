<?php view('shared.site.header', [
    'title' => 'Chi tiết sản phẩm'
]);
// select * from product where id = num
// thi nhung gia tri ben duoi se dc gan product-detail.php?id=1 // ? means GET truyen tham so id xuong
?>
<style>
    .product-detail-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>

<section class="product-details p-50">
    <div class="container">
        <?php if (!empty($success['add_to_cart_quantity'])) { ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-warning" id="success-add-to-cart">
                        <button onclick="document.getElementById('success-add-to-cart').style.display='none'" type="button"
                            class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?= $success['add_to_cart_quantity'] ?? '' ?>
                    </div>
                </div>
            </div>

        <?php } ?>
        <div class="row">


            <div class="col-md-6">
                <div class="product__details__pic">

                    <div class="product-detail-big-pic">
                        <img src="./public/uploads/<?= $pro["image"] ?>" alt="">
                    </div>
                    <div id="carouselId" class="carousel slide" data-ride="carousel">


                        <div class="carousel-inner" role="listbox">

                            <div class="carousel-item active">
                                <div class="d-none d-lg-block">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/bmnuong.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/bmphapp.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/puddingscl.png"
                                            alt="First slide">
                                    </div>
                                </div>
                                <div class="d-none d-md-block d-lg-none">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/bmnuong.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/bmphapp.png"
                                            alt="First slide">

                                    </div>
                                </div>
                                <div class="d-none d-sm-block d-md-none">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/bmnuong.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/bmphapp.png"
                                            alt="First slide">
                                    </div>
                                </div>
                                <div class="d-block d-sm-none">
                                    <img class="product-img-item" src="./public/uploads/bmnuong.png" alt="First slide">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-none d-lg-block">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/banhminau.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/botmi.png"
                                            alt="First slide">
                                    </div>
                                </div>
                                <div class="d-none d-md-block d-lg-none">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/bmnuong.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/banhminau.png"
                                            alt="First slide">
                                        <img class="product-img-item" src="./public/uploads/botmi.png"
                                            alt="First slide">


                                    </div>
                                </div>
                                <div class="d-none d-sm-block d-md-none">
                                    <div class="slide-box">
                                        <img class="product-img-item" src="./public/uploads/bmnuong.png"
                                            alt="First slide">

                                    </div>
                                </div>
                                <div class="d-block d-sm-none">
                                    <img class="product-img-item" src="./public/uploads/bmphapp.png" alt="First slide">

                                </div>
                            </div>


                        </div>
                        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                            <i class="ti ti-angle-left"></i>
                            <span class="sr-only">Trước</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                            <i class="ti ti-angle-right"></i>
                            <span class="sr-only">Kế tiếp</span>
                        </a>
                    </div>


                </div>

            </div>


            <div class="col-md-6">
                <div class="product__details__text">
                    <h2 style="margin-bottom: 1rem"><?= $pro["name"] ?></h2>
                    <div class="rating">
                        <span>Đánh giá trung bình:</span><span style="color: #ffc107">
                            <?= round($avg['rating'], 1) ?>/5</span>
                        <span id="customer-review-no"> <?= sizeof($reviews) ?> đánh giá</span>


                        <?php if ($pro['sale_price'] < $pro['price'] && $pro['sale_price'] > 0) : ?>
                            <h3 class="product__details__price">$<?= number_format($pro["sale_price"], 2, '.', '') ?> &nbsp;
                                <span class="strikeout"
                                    style="font-size:1.2rem">$<?= number_format($pro["price"], 2, '.', '') ?></span>
                                <span style="font-size: 0.8rem"
                                    class="badge badge-success">-<?= round((1 - ($pro['sale_price'] / $pro['price'])) * 100, 1) ?>%</span>
                            </h3>
                        <?php else : ?>
                            <h3 class="product__details__price">$<?= number_format($pro["price"], 2, '.', '') ?> </h3>
                        <?php endif; ?>


                    </div>

                    <p class="p-desc"><?= $pro["description"] ?></p>


                    <ul class="pro-info-list">
                        <li><span>Xuất xứ: </span><?= strtoupper($pro["origin"]) ?></li>
                        <li><span>Trạng thái: </span>Còn hàng</li>
                        <li><span>Mã sản phẩm: </span> BK<?= $pro["id"] ?>
                        </li>
                        <li><span>Thương hiệu: </span>Chocopike</li>
                    </ul>
                    <div class="product__details__button">
                        <form action="./?controller=cart&action=addQuantity&id=<?= $pro['id'] ?>" method="POST"
                            class="add-quantity-form">
                            <div class="pro-qty">
                                <div class="dec qtybtn" onclick="decrease(<?= $pro['id'] ?>)"><i
                                        class="ti ti-minus"></i></div>
                                <input type="number" value="1" id="<?= $pro['id'] ?>quantity" name="more" min="1">
                                <div class="inc qtybtn" onclick="increase(<?= $pro['id'] ?>)"><i class="ti ti-plus"></i>
                                </div>
                            </div>

                            <a class="add-to-cart-pro-detail"><button type="submit"><i class="fas fa-shopping-basket"
                                        style="font-size:13px"></i><span>Thêm vào giỏ hàng</span></button></a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="product__details__tab p-50">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active desc-tab" id="desc-tab" data-toggle="tab" href="#tabs-1"
                                role="tab"
                                onclick="document.getElementById('rev-tab').classList.remove('active');this.classList.add('active') ;document.getElementById('tabs-1').classList.add('active');document.getElementById('tabs-2').classList.remove('active')">Miêu tả</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link rev-tab" id="rev-tab" data-toggle="tab" href="#tabs-2" role="tab"
                                onclick="document.getElementById('desc-tab').classList.remove('active');this.classList.add('active');document.getElementById('tabs-1').classList.remove('active');document.getElementById('tabs-2').classList.add('active')">
                                Đánh giá (<?= sizeof($reviews) ?>)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  active" id="tabs-1" role="tabpanel">
                            <h5><?= $pro["name"] ?></h5>

                            <p><b><?= $pro["description"] ?></b></p>



                        </div>

                        <div class="tab-pane " id="tabs-2" role="tabpanel">
                            <ul id="rev-list">

                                <?php foreach ($reviews as $review) : ?>
                                    <li>
                                        <div class="rev-block">
                                            <div class="rev-img">
                                                <img style="width: 70px; height:70px" src="./public/site/img/userr.png"
                                                    alt="">
                                            </div>
                                            <div class="rev-content">
                                                <div class="rev-info">
                                                    <h5><?= $review['fname'] . ' ' . $review['lname'] ?></h5>
                                                    <p class="rev-date"><?= $review['created_at'] ?></p>
                                                    <?php if (!empty($_SESSION['user'])) : ?>
                                                        <?php if ($_SESSION['user']['id'] == $review['account_id']) : ?>
                                                            <a class="rev-delete" title="Remove review"
                                                                href="./?controller=product&action=removeReview&id=<?= $review['id'] ?>&productId=<?= $review['product_id'] ?>"
                                                                onclick="return confirm('Are you sure to delete this review ?')">Xóa</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <span class="rev-rating">
                                                        <?php for ($i = 0; $i < $review['rating']; $i++) {
                                                        ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php   }
                                                        ?>

                                                    </span>

                                                </div>

                                                <p class="rev-detail">
                                                    <?= htmlentities($review['content']) ?>
                                                </p>
                                            </div>

                                        </div>
                                    </li>
                                    <hr>
                                <?php endforeach; ?>
                            </ul>
                            <?php if (empty($_SESSION['user']) || $user['status'] == 0) : ?>
                                <div class="error-block" style="padding: 0 5% ">

                                    <h2>Vui lòng đăng nhập để xem đánh giá!</h2>
                                    <p>Đã có tài khoản. Bấm <a> <button class="login-modal p-0"
                                                style="font-family: inherit; width:unset"
                                                onclick="document.getElementById('id01').style.display='block'"
                                                style="width:auto;">vào đây</button>
                                        </a> để đăng nhập
                                    </p>
                                    <p>Chưa có tài khoản! Đăng ký <a> <button class="login-modal p-0"
                                                style="font-family: inherit; width:unset"
                                                onclick="document.getElementById('id02').style.display='block'"
                                                style="width:auto;">tại đây</button>
                                        </a>
                                    </p>
                                    <div class="img-container">
                                        <img src="./public/site/img/home/images/404.png" alt="">
                                    </div>


                                </div>
                            <?php else : ?>
                                <div class="rev-form">
                                    <h4>Thêm một đánh giá</h4>
                                    <p id="notice">
                                        Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu <span
                                            class="asterisk">*</span>
                                    </p>

                                    <form method="POST" class="review-form"
                                        action="./?controller=product&action=review&id=<?= $pro['id'] ?>"
                                        name="reviewProductForm" onsubmit="return validateReviewProductForm();">

                                        <label for="stars" style="width: 13%;padding-right: 20px;">
                                            Đánh giá của bạn <span class="asterisk">*</span>
                                        </label>
                                        <div class="rating">
                                            <label class="rate-label">
                                                <input type="radio" value="1" name="rating" />
                                                <i class="fa fa-star icon"></i>
                                            </label>
                                            <label class="rate-label">
                                                <input type="radio" value="2" name="rating" />
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                            </label>
                                            <label class="rate-label">
                                                <input type="radio" value="3" name="rating" />
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                            </label>
                                            <label class="rate-label">
                                                <input type="radio" value="4" name="rating" />
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                            </label>
                                            <label class="rate-label">
                                                <input type="radio" value="5" name="rating" />
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                                <i class="fa fa-star icon"></i>
                                            </label>
                                        </div>
                                        <small id="rating-err"></small>

                                        <div class="form-group">
                                            <label for="content">Đánh giá của bạn <span class="asterisk">*</span></label>
                                            <textarea class="form-control" name="content" id="content" rows="4"
                                                onkeyup="validateLength(this, 'Your review', 500)"></textarea>
                                        </div>
                                        <div class="form-group" style="margin:0">
                                            <label for=""></label>
                                            <small id="content-err"></small>
                                        </div>

                                        <div class=" form-group">
                                            <label for="">Tên của bạn <span class="asterisk">*</span></label>
                                            <input
                                                value="<?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?>"
                                                type="text" class="form-control" disabled placeholder=""
                                                aria-describedby="helpId">

                                            <div>
                                                <label for=""></label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Email của bạn <span class="asterisk">*</span></label>
                                            <input value="<?= $_SESSION['user']['email'] ?>" type="text"
                                                class="form-control" disabled placeholder="" aria-describedby="helpId">
                                            <div>
                                                <label for=""></label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for=""></label>
                                            <button type="submit" class="rev-btn">Nộp</button>
                                        </div>

                                    </form>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12  ">
                <div class="related__title text-center">
                    <h4>Sản phẩm liên quan</h4>
                </div>
                <div class="content-block">
                    <ul id='pro-list'>
                        <?php foreach ($pro_same_cat as $pro) : ?>
                            <li>
                                <a href="./?controller=product&action=productDetail&id=<?= $pro['id'] ?>">
                                    <div class="pro-block">
                                        <div class="pro-img"><img src="./public/uploads/<?= $pro["image"] ?>">
                                        </div>
                                        <div class="pro-info">
                                            <h5><?= $pro["name"] ?></h5>
                                            <h5>$<?= number_format($pro['sale_price'] > 0 ? $pro['sale_price'] : $pro['price'], 2, '.', '') ?>
                                            </h5>
                                        </div>
                                    </div>
                                </a>

                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>


<?php view('shared.site.footer'); ?>