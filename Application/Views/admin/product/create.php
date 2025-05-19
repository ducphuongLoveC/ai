<?php view('shared.admin.header', [
    'title' => 'Thêm Sản phẩm'
]); ?>
<?php if (!empty($message['success-add'])) { ?>
    <div class="alert alert-success" id="success-add-product">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById('success-add-product').style.display='none'">&times;</button>
        <?= $message['success-add'] ?? '' ?>
    </div>
<?php } ?>
<form action="./?module=admin&controller=product&action=store" method="POST" enctype="multipart/form-data" name="productForm" onsubmit="return validateProductForm();">
    <div class="row">
        <div class="col-md-7">
            <div class="form-group">
                <label for="name">Tên</label>
                <small id="ad-pd-cr-name-err"></small>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên" id="ad-pd-cr-name" onkeyup="validateNotEmpty(this, 'Tên sản phẩm');">
                <?php if (!empty($message['error-name'])) : ?>
                    <small class="help-block invalid-error"><?= $message['error-name'] ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="content" class="form-control" placeholder="Nhập mô tả" rows="5" style="height:140px"></textarea>
            </div>

            <div class="form-group">
                <label for="origin">Xuất xứ</label>
                <select name="origin" class="form-control">
                    <option value="usa">USA</option>
                    <option value="vn">Việt Nam</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh sản phẩm</label>
                <small id="actual-btn-err"></small>
                <br>
                <input type="file" name="image" id="actual-btn" hidden onchange="readURL(this);">

                <div class="input-group">
                    <span class="form-control" id="file-chosen">Chưa chọn file</span>
                    <div class="input-group-append">
                        <label for="actual-btn" id='file-label' class="btn btn-sm btn-danger"><i class="fa fa-folder-open"></i></label>
                    </div>
                </div>

            </div>

            <div class=" form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label for=""></label>
                <img src="./public/site/img/no-imge.jpg" alt="" style="width:50%; padding: 5px" id="blah">
            </div>


        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($cats as $cat) : ?>
                        <option value="<?= $cat['id'] ?>"> <?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                </select>


            </div>
            <div class="form-group">
                <label for="price">Giá ($)</label>
                <small id="ad-pd-cr-price-err"></small>
                <input type="number" class="form-control" step="0.01" name="price" placeholder="Nhập giá" id="ad-pd-cr-price" onkeyup="validateFloat(this, 'Giá', 0.01);">

            </div>

            <div class="form-group">
                <label for="sale_price" style="display:inline-block">Giá khuyến mãi ($)</label>&nbsp;
                <small class="notice">0 là không có khuyến mãi</small>
                <small id="ad-pd-cr-sale_price-err"></small>
                <input type="number" class="form-control" step="0.01" name="sale_price" placeholder="Nhập giá khuyến mãi" id="ad-pd-cr-sale_price" onkeyup="validateSalePrice(this, 'ad-pd-cr-price');">

            </div>



            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <small id="ad-pd-cr-quantity-err"></small>
                <input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng" id="ad-pd-cr-quantity" onkeyup="validateInt(this, 'Số lượng');">
            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" selected>Công khai</option>
                    <option value="0">Riêng tư</option>
                </select>


            </div>

            <div class="form-group" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Thêm Sản phẩm</button>
            </div>

        </div>
    </div>
</form>


<?php view('shared.admin.footer'); ?>