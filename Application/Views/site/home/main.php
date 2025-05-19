<main>

    <section class="quickshopping">
        <div class="container-fluid section-main">
            <div class="content-title-block">
                <p class="block-title">Sản phẩm chất lượng cao</p>
                <p class="block-motto"><span>MUA NGAY</span></p>
            </div>

            <div class="container" style="margin-top: 40px;">
                <div class="content-block">
                    <ul id='quick-shop-list'>
                        <li>

                            <div class="bread-desc">
                                <h3>Bánh kem</h3>
                                <p>Sản phẩm mới mỗi ngày
                                </p>
                                <a href="./?controller=product&action=allProducts"><button><span>MUA NGAY</span><i class="fas fa-arrow-right" style="color: #696969;"></i></button></a>
                                <div class="basket">
                                    <img src="./public/site/img/home/images/basket6.png" alt="">
                                </div>
                            </div>

                        </li>

                        <li>

                            <div class="bread-desc">
                                <h3>Bánh mì</h3>
                                <p>Sản phẩm mới mỗi ngày</p>
                                <a href="./?controller=product&action=allProducts"><button><span>MUA NGAY</span><i class="fas fa-arrow-right" style="color: #696969;"></i></button></a>
                                <div class="basket">
                                    <img src="./public/site/img/home/images/basket7.png" alt="">
                                </div>
                            </div>

                        </li>

                        <li>

                            <div class="bread-desc">
                                <h3>Bánh nướng</h3>
                                <p>Sản phẩm mới mỗi ngày</p>
                                <a href="./?controller=product&action=allProducts"><button><span>MUA NGAY</span><i class="fas fa-arrow-right" style="color: #696969;"></i></button></a>
                                <div class="basket">
                                    <img src="./public/site/img/home/images/basket1.png" alt="">
                                </div>
                            </div>
                            <!-- <div class="trapezoid">
                                    <div class="basket">
                                        <img src="./public/site/img/home/images/basket1.png" alt="">
                                    </div>
                                </div> -->

                        </li>
                    </ul>
                </div>


            </div>
        </div>


    </section>
    <!-- Start of Tại sao nên chọn chúng tôi -->
    <section class="why-choose-us p-50">
        <div class="container-fluid section-main">
            <div class="title-block">
                <p class="block-title">Tại sao nên chọn chúng tôi</p>
                <p class="block-motto"><span>CHẤT LƯỢNG CAO</span></p>
            </div>

            <div class="container content-block">
                <ul id="why-list">
                    <li>
                        <div class="why-block">
                            <div class="circle">
                                <img src="./public/site/img/home/whychooseus/payment.png" alt="">
                            </div>
                            <div class="why-reason">
                                <h5>Thanh toán đảm bảo</h5>
                                <p>Thanh toán an toàn</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="why-block">
                            <div class="circle">
                                <img src="./public/site/img/home/whychooseus/organic.png" alt="">
                            </div>
                            <div class="why-reason">
                                <h5>100% hữu cơ</h5>
                                <p>Có sẵn thực phẩm chất lượng cao</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="why-block">
                            <div class="circle">
                                <img src="./public/site/img/home/whychooseus/24-hours-support.png" alt="">
                            </div>
                            <div class="why-reason">
                                <h5>Hỗ trợ khách hàng</h5>
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="why-block">
                            <div class="circle">
                                <img src="./public/site/img/home/whychooseus/free-delivery.png" alt="">
                            </div>
                            <div class="why-reason">
                                <h5>Miễn phí vận chuyển</h5>
                                <p>Nhanh chóng</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End of Tại sao nên chọn chúng tôi -->

    <!-- Start of promotion -->
    <section class="promotion">
        <div class="promotion-block container-fluid content-block">
            <ul>
                <li class="offer-image">
                    <div class="imgcontainer">
                        <img src="./public/uploads/<?= $offer_pro['image'] ?>" alt="">
                    </div>
                </li>
                <li class="offer-info">
                    <div>
                        <p class="block-title">Khuyến mãi tuần này</p>
                        <p class="offer-deal">
                            NHẬN <span style="font-weight: bold"><?= $offer_pro['percent'] ?></span>GIẢM GIÁ % CHO SẢN PHẨM NÀY
                        NGAY BÂY GIỜ
                        </p>

                        <h3><?= $offer_pro['name'] ?></h3>
                        <h5 class="offer-price"><span class="strikeout">$<?= number_format($offer_pro['price'], 2, '.', '') ?></span> Bây giờ chỉ
                            $<?= number_format($offer_pro['sale_price'], 2, '.', '') ?></h5>

                        <p class="p-lorem">NGON</p>

                        <!-- <div class="countdown" data-date="2021-12-28" data-time="12:00"></div> -->

                        <a class="offer-btn btn-root ptc-btn border-root" style="margin-top: 15px; position: absolute" href="./?controller=product&action=productDetail&id=<?= $offer_pro['id'] ?>">
                            MUA NGAY
                        </a>

                    </div>
                    
                </li>

            </ul>

        </div>
    </section>
    <!-- End of promotion -->

    <!-- Start of latest products -->
    <section class="latest-products p-50">
        <div class="container-fluid section-main">
            <div class="content-title-block">
                <p class="block-title">Sản phẩm mới</p>
                <p class="block-motto"><span>TỐT NHẤT</span></p>
            </div>

            <div class="container">

                <ul class="pro-category">
                    <?php foreach ($categories as $cat) : ?>
                        <li><a href="./?controller=product&action=allProducts&id=<?= $cat['id'] ?>">
                                <h5><?= $cat['name'] ?></h5>
                            </a></li>

                        <p>/</p>
                    <?php endforeach; ?>

                </ul>

                <div class="content-block">
                    <ul id='pro-list'>
                        <?php foreach ($latest_products8 as $product) : ?>
                            <li>
                                <a href="./?controller=product&action=productDetail&id=<?= $product['id'] ?>">
                                    <div class="pro-block">
                                        <div class="pro-img">
                                            <?php
                                            $productImage = !empty($product['image']) ? $product['image'] : 'no-image.png';
                                            ?>
                                            <img src="./public/uploads/<?= $productImage; ?>" alt="<?= $product['name']; ?>">
                                        </div>
                                        <div class="pro-info">
                                            <h5><?= $product['name'] ?? '' ?></h5>
                                            <h5>$<?= number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') ?>
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
    </section>
    <!-- End of latest products -->


    <section class="cookie-banner">

        <img src="./public/uploads/<?= $banners[1]['image'] ?>" alt="">

    </section>

    <!-- Start of Sản phẩm dành cho bạn -->
    <section class="product-for-you p-50">
        <div class="container-fluid section-main">
            <div class="content-title-block">
                <p class="block-title">Sản phẩm dành cho bạn</p>
                <p class="block-motto"><span>SẢN PHẨM MỚI</span></p>
            </div>

            <div class="container" style="margin-top: 40px;">

                <div class="content-block">
                    <div id="add-product-to-cart-ajax" style="margin: 0 auto 20px auto; width: 90%"></div>
                    <ul id='new-pro-list'>
                        <!-- <input type="text" id="success-message"> -->
                        <?php foreach ($latest_products4 as $product) : ?>
                            <li>

                                <div class="new-pro-block">
                                    <div class="new-pro-img">
                                        <?php
                                        $productImage = !empty($product['image']) ? $product['image'] : 'no-image.png';
                                        ?>
                                        <img src="./public/uploads/<?= $productImage; ?>" alt="<?= $product['name']; ?>">
                                    </div>
                                    <div class="new-pro-info">
                                        <h5> <?= $product['name'] ?? '' ?> </h5>
                                        <p><?= $product['description'] ?> </p>
                                        <h5>$<?= number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') ?>
                                        </h5>
                                    </div>
                                    <a id="add-to-cart-btn<?= $product['id'] ?>" class="swalDefaultSuccess " onclick="onAddToCartAjax(<?= $product['id'] ?>)">
                                        <button><i class="fas fa-shopping-basket" style="font-size:13px"></i><span>THÊM VÀO GIỎ HÀNG</span></button>
                                    </a>

                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            </div>
        </div>
    </section>
</main>