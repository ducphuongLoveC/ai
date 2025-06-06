<?php view('shared.admin.header', [
    'title' => 'Chỉnh sửa sản phẩm'
]); ?>
<?php if (!empty($message['success-edit'])) { ?>
    <div class="alert alert-success" id="success-edit-product">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('success-edit-product').style.display='none'">&times;</button>
        <?= $message['success-edit'] ?? '' ?>
    </div>
<?php } ?>
<form action="./?module=admin&controller=product&action=update&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data" name="productForm" onsubmit="return validateProductEditForm();">
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="name">Tên</label>
                <small id="ad-pd-ed-name-err"></small>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="<?= $product['name'] ?>" id="ad-pd-ed-name" onkeyup="validateNotEmpty(this, 'Tên sản phẩm');">
                <?php if (!empty($message['error-name'])) : ?>
                    <small class="help-block invalid-error"><?= $message['error-name'] ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="content" class="form-control" placeholder="Nhập mô tả" rows="5" style="height:140px"><?= $product['description'] ?></textarea>
            </div>

            <div class=" form-group">
                <label for="origin">Xuất xứ</label>
                <select name="origin" class="form-control">
                    <option value="usa" <?= $product['origin'] == 'usa' ? 'selected' : '' ?>>Mỹ</option>
                    <option value="vn" <?= $product['origin'] == 'vn' ? 'selected' : '' ?>>Việt Nam</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh sản phẩm</label>
                <small id="actual-btn-err"></small>
                <br>
                <input type="file" name="image" id="actual-btn" hidden onchange="readURL(this);">
                <input type="hidden" name="current-image" id="" class="form-control" value="<?= $product['image'] ?>">

                <div class="input-group">
                    <span class="form-control" id="file-chosen"><?= $product['image'] ?></span>
                    <div class="input-group-append">
                        <label for="actual-btn" id='file-label' class="btn btn-sm btn-danger"><i class="fa fa-folder-open"></i></label>
                    </div>
                </div>
            </div>

            <div class=" form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label for=""></label>
                <img src="./public/uploads/<?= $product['image'] ?>" alt="" style="width:50%; padding: 5px" id="blah">
            </div>


        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($cats as $cat) : ?>
                        <option value="<?= $cat['id'] ?>" <?= $product['category_id'] == $cat['id'] ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <label for="price">Giá ($)</label>
                <small id="ad-pd-ed-price-err"></small>
                <input value="<?= number_format($product['price'], 2, '.', '') ?>" type="number" class="form-control" step="0.01" name="price" placeholder="Nhập giá" id="ad-pd-ed-price" onkeyup="validateFloat(this, 'Giá', 0.01);">

            </div>

            <div class="form-group">
                <label for="sale_price" style="display:inline-block">Giá khuyến mãi ($)</label> &nbsp; <small class="notice">0 là không có khuyến mãi</small>
                <small id="ad-pd-ed-sale_price-err"></small>
                <input value="<?= number_format($product['sale_price'], 2, '.', '') ?>" type="number" step="0.01" class="form-control" name="sale_price" placeholder="Nhập giá khuyến mãi" id="ad-pd-ed-sale_price" onkeyup="validateSalePrice(this, 'ad-pd-ed-price');">


            </div>



            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <small id="ad-pd-ed-quantity-err"></small>
                <input value="<?= $product['quantity'] ?>" type="number" class="form-control" name="quantity" placeholder="Nhập số lượng" id="ad-pd-ed-quantity" onkeyup="validateInt(this, 'Số lượng');">
            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" <?= $product['status'] == '1' ? 'selected' : '' ?>>Công khai</option>
                    <option value="0" <?= $product['status'] == '0' ? 'selected' : '' ?>>Riêng tư</option>
                </select>


            </div>

            <div class="form-group" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
            </div>

        </div>
    </div>
</form>


<?php view('shared.admin.footer'); ?>