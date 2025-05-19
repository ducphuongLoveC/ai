<?php view('shared.site.header', [
    'title' => 'Contact'
]); ?>
<style>
    .contact-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>

<section class="contact p-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-info">
                    <h2>Thông tin liên lạc</h2>
                    <p class="contact-loc-desc">
                        Tiệm bánh nằm ở vị trí thuận tiện tại trung tâm thành phố Hồ Chí Minh, một con phố ấm cúng với
                        nhiều điểm mua sắm và bãi đậu xe dễ dàng.
                    </p>

                    <div class="contact-detail">
                        <ul>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Địa chỉ</h4>
                                        <p>18 Lê Văn Việt, Thành phố Hồ Chí Minh</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Điện thoại<i></i></h4>
                                        <div class="hotline">
                                            <span style="vertical-align: top;">Đường dây nóng: </span>
                                            <p class="phone">(888) 123 2548
                                                <br>(609) 999 0000
                                            </p>
                                        </div>
                                        <p>Điện thoại: <span class="phone">0987 654 321</span></p>


                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-detail-block">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>

                                    <div class="contact-info">
                                        <h4>Email</h4>
                                        <p>xipr0vjp00@gmail.com</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-form-block">
                    <h2>Biểu mẫu liên hệ</h2>
                    <form method="POST" name="contactForm" class="contact-form" action="./?controller=contact&action=submitForm" onsubmit="return validateContactForm();">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Tên của bạn *" id="ct-name" onkeyup="validateName(this, 'Name')" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] : ''  ?>">
                            <small id="ct-name-err"></small>

                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Địa chỉ Email *" id="ct-email" onkeyup="validateEmail(this)" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['email'] : ''  ?>">
                            <small id="ct-email-err"></small>

                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại *" id="ct-phone" onkeyup="validatePhone(this)" value="<?= !empty($_SESSION['user']) ? $_SESSION['user']['phone'] : ''  ?>">
                            <small id="ct-phone-err"></small>

                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Tin nhắn *" id="ct-msg" onkeyup="validateLength(this, 'Message', 500)"></textarea>
                            <small id="ct-msg-err"></small>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="send-mess-btn" id="send-msg-btn">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<app-map></app-map>

<section class="bottom-banner">
    <img src="assets/img/about/logo-banner.png" alt="">
</section>
<?php view('shared.site.footer') ?>