<?php view('shared.site.header', [
    'title' => 'About'
]); ?>

<!-- Lịch sử -->
<section class="history">
    <div class="container-fluid content-block">

        <ul>
            <li>
                <div class="cupcake-img">
                    <img src="./public/site/img/about/cupcakee.png" alt="">
                </div>
            </li>
            <li>
                <div class="intro">
                    <div class="content-title-block">
                        <h2 class="block-title">Một trong những tiệm bánh lâu đời nhất ở Việt Nam</h2>
                        <p class="block-motto"><span>LỊCH SỬ CỦA CỬA HÀNG BÁNH NGON NHẤT VIỆT NAM</span></p>
                    </div>

                    <div class="content">
                        <p>Với 25 năm làm việc, tôi đã có thể đạt được thành công, 
                            nhưng tôi không thể tha thứ cho bản thân 
                            vì những sai lầm mà tôi đã mắc phải.</p>
                        <p>Tôi muốn cầu xin sự tha thứ cho một số người. 
                            Làm sao tôi có thể có được những gì tôi muốn?</p>
                        <p>Không phải với một số người. Công việc rất đau đớn, 
                            nhưng cần thiết để có thể đạt được thời gian.</p>

                    </div>

                    <div class="signature">
                        <img src="./public/site/img/about/chu-ky.png" alt="">
                        <div>
                            <h6>Xipr0vjp</h6> <span> - XIXI</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Kết thúc -->


<!--  Tại sao nên chọn chúng tôi -->
<section class="why-choose-us p-50">
    <div class="container-fluid section-main">
        <div class="title-block">
            <p class="block-title">Tại sao nên chọn chúng tôi</p>
            <p class="block-motto"><span>Sự lựa chọn tốt nhất</span></p>
        </div>

        <div class="container content-block">
            <ul id="why-list">
                <li class="list-item">
                    <ul>
                        <li>
                            <div class="why-block left">
                                <div class="circle">
                                    <img src="./public/site/img/about/healthy.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Tốt cho sức khỏe</h5>
                                    <p>Vì khách hàng</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="why-block left">
                                <div class="circle">
                                    <img src="./public/site/img/home/whychooseus/organic.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>100% hữu cơ</h5>
                                    <p>Có sẵn thực phẩm chất lượng cao</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </li>


                <li class="list-item">
                    <img src="./public/site/img/home/images/basket5.png" alt="">
                </li>
                <li class="list-item">
                    <ul>
                        <li>
                            <div class="why-block right">
                                <div class="circle">
                                    <img src="./public/site/img/home/whychooseus/free-delivery.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Miễn phí vận chuyển</h5>
                                    <p>Nhanh chóng</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="why-block right">
                                <div class="circle">
                                    <img src="./public/site/img/about/quality.png" alt="">
                                </div>
                                <div class="why-reason">
                                    <h5>Sản phẩm chất lượng cao</h5>
                                    <p>Đạt tiêu chuẩn</p>
                                </div>
                            </div>
                        </li>
                    </ul>



                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Tại sao nên chọn chúng tôi -->

<!-- chef -->
<section class="meet p-50">
    <div class="container-fluid section-main">
        <div class="title-block">
            <p class="block-title">Các đầu bếp hàng đầu của chúng tôi</p>
            <p class="block-motto"><span>THỢ VIP PRO</span></p>
        </div>

        <div class="container-fluid" style="margin-top: 40px;">
            <div class="content-block">
                <ul id="chef-list">


                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/chef-1.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Thomas</h5>
                                <p>15 Năm kinh nghiệm</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/chef-2.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Jenny</h5>
                                <p>11 Năm kinh nghiệm</p>
                            </div>
                            
                        </div>
                    </li>

                    <li>
                        <div class="chef-block">
                            <div class="chef-img">
                                <img src="./public/site/img/about/chef-3.png" alt="" style=" border-radius: 100%">
                            </div>
                            <div class="chef-info">
                                <h5>Jennifer</h5>
                                <p>13 Năm kinh nghiệm</p>
                            </div>                            
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</section>


<?php view('shared.site.footer'); ?>