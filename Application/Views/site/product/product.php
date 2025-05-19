<?php view('shared.site.header', [
    'title' => 'Product'
]); ?>

<section class="latest-products p-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="blog-right-side">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="./?controller=product&action=search" method="post">
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" placeholder='Tìm kiếm từ khóa' name="product_name">
                                    <div class="input-group-append">
                                        <button class="btns" type="submit"><i class="ti ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Danh mục</h4>
                        <ul class="list cat-list">
                            <?php foreach ($categories as $cat) : ?>
                                <li>
                                    <a href="<?= ($currentCategoryId == $cat['id']) ? 
                                                    './?controller=product&action=allProducts' : 
                                                    './?controller=product&action=allProducts&id=' . $cat['id'] ?>" 
                                       class="<?= ($currentCategoryId == $cat['id']) ? 'category-chosen' : '' ?> category-item">
                                        <p><?= $cat['name'] ?></p>
                                    </a>
                                    <p class="category-num"><?= $cat['count'] ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget top_product_widget">
                        <h3 class="widget_title">Sản phẩm hàng đầu</h3>
                        <?php if (!empty($top_products) && is_array($top_products)) : ?>
                            <?php foreach ($top_products as $pro) : ?>
                                <div class="media post_item">
                                    <img src="./public/uploads/<?= $pro['image'] ?>" alt="post" style="border-radius: 100%; border: 1px solid #f0e5d4">
                                    <div class="media-body">
                                        <a href="./?controller=product&action=productDetail&id=<?= $pro['id'] ?>">
                                            <h3 class="top-link"><?= $pro['name'] ?></h3>
                                        </a>
                                        <p class="discount-price">$<?= number_format($pro['sale_price'] > 0 ? $pro['sale_price'] : $pro['price'], 2, '.', '') ?></p>
                                        <?php if ($pro['sale_price'] > 0) : ?>
                                            <p class="old-price">$<?= number_format($pro['price'], 2, '.', '') ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Không có sản phẩm hàng đầu.</p>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>

            <div class="col-md-9">
                <div class="content-block">
                    <ul id='pro-list'>
                        <?php foreach ($products as $product) : ?>
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
                                            <h5>$<?= number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?= $pagination ?>
            </div>
        </div>
    </div>
</section>

<?php view('shared.site.footer'); ?>
