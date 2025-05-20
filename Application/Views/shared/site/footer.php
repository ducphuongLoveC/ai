<footer class="footer">
    <div class="chat-bubble" id="chatBubble">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v16l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z" />
        </svg>
    </div>
    <div class="chat-container" id="chatContainer">
        <div class="chat-header d-flex justify-content-between align-items-center">
            <span>Chat với trợ lý thông minh</span>
            <button type="button" id="closeChatAi" class="btn fw-bold text-white" onclick="toggleChat()">
                <i style="color: white;" class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="chat-body" id="chatBody">
            <!-- Messages will be appended here -->
            <div class="message bot-message">
                Xin chào tôi trợ lý ai của tiệm bánh thông minh, tôi có thể giúp gì cho bạn?
            </div>
        </div>
        <div class="chat-footer">
            <div class="d-flex">
                <input type="text" id="userInput" class="form-control chat-input" placeholder="Nhập câu hỏi...">
                <button class="btn send-btn ms-2" id="sendMessageAi" onclick="sendMessage()">Gửi</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a><img src="./public/site/imgs/logo.png" alt="" style="width: 111px; height: 56px;"></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h5>Liên hệ</h5>
                    <ul id="contact-list">
                        <li><span><i class="fas fa-map-marker-alt"></i>Địa chỉ:</span><span> 18 Lê Văn Việt, Thành phố
                                Hồ Chí Minh</span></li>
                        <li><span><i class="fas fa-phone-alt"></i>Số điện thoại:</span><span>0987 654 321</span></li>
                        <li><span><i class="far fa-envelope"></i>Email:</span><span>xipr0vjp00@gmail.com</span></li>

                    </ul>
                </div>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h5>Ảnh </h5>
                    <ul id="insta-list">
                        <li>
                            <div><img src="./public/site/img/home/footer/1.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/2.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/3.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/4.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/5.png" alt=""></div>

                        </li>
                        <li>
                            <div><img src="./public/site/img/home/footer/6.png" alt=""></div>

                        </li>



                    </ul>
                </div>
            </div>

        </div>
    </div>

</footer>
<!-- Footer Section End -->

</body>

<script src="./public/site/js/searchAjax.js" type="text/javascript"></script>
<script src="./public/site/js/cartAjax.js" type="text/javascript"></script>
<script src="./public/site/js/validate.js" type="text/javascript"></script>
<script src="./public/site/js/countdown.js" type="text/javascript"></script>
<script src="./public/site/chatAi.js" type="text/javascript"></script>



</html>