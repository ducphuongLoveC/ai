<?php

class VerifyController extends BaseController
{

    const COOKIE_NAME = 'UserToken';

    protected $userModel;
    protected $productModel;
    protected $categoryModel;
   
    public function __construct()
    {
        $this->loadModel("UserModel");
        $this->userModel = new UserModel;
        $this->loadModel('ProductModel');
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
        $this->productModel = new ProductModel;        
    }


    public function index()
    {
    }

    // verify user info
    public function login()
    {
        $message = [];
        $input = $_REQUEST;

        // validate form input
        if (empty($input['email'])) {
            $message['all-error']    = "Vui lòng nhập email";
            goto getBackToHome;
        }

        if (empty($input['password'])) {
            $message['all-error'] = "Vui lòng nhập mật khẩu";
            goto getBackToHome;
        }
        
        if ($user = $this->userModel->getUserByEmailAndPwd($input['email'], $input['password'])) {

            if (!empty($input['remember']) && $input['remember'] == 'on') {
                // generate a session key
                $token = openssl_random_pseudo_bytes(16);
                //Convert the binary data into hexadecimal representation.
                $token = bin2hex($token);

                // todo: construct a storage to store junk tokens

                // update to account db
                $data =
                    [
                        'remember_token'           => $token,
                    ];
                $this->userModel->updateData($user['id'], $data);

                // add session key to browser's cookie
                setcookie(self::COOKIE_NAME, $token, time() + 30 * 24 * 60 * 60, "/", "", "", "true");
            }

            $_SESSION['user'] = $user;
            if ($_SESSION['user']["role"] == "admin") {
                header('location: ./?module=admin&controller=dashboard');
            } else {
                $message['success-login'] = 'Đăng nhập thành công';
            }
        } else {
            $message['all-error'] = 'Email hoặc mật khẩu không hợp lệ';
        }

        getBackToHome:

        $latest_products8 = $this->productModel->getProducts(8);
        $latest_products4 = $this->productModel->getProducts(4);
        $categories = $this->categoryModel->getAll();
        $offer_pro = $this->productModel->getProductHighestSalePercent();
        $this->view('site.home.index', [
            'message' => $message,
            'latest_products8'  => $latest_products8,
            'latest_products4' => $latest_products4,
            'categories' => $categories,
            'offer_pro' => $offer_pro
        ]);
    }

    public function autoLogin()
    {
        $message = [];

        if (isset($_COOKIE[self::COOKIE_NAME]) && strlen($_COOKIE[self::COOKIE_NAME]) != 0) {
            // increase time for cookie each time user logins
            setcookie(self::COOKIE_NAME, $_COOKIE[self::COOKIE_NAME], time() + 30 * 24 * 60 * 60, "/", "", "", "true");

            // get user from db by token
            $user = $this->userModel->getUserByToken($_COOKIE[self::COOKIE_NAME]);

            // create session for user
            $_SESSION['user'] = $user;
            if (isset($_SESSION['user']["role"]) && $_SESSION['user']["role"] == "admin") {
                header('location: ./?module=admin&controller=dashboard');
            } else {
                $message['success-login'] = 'Đăng nhập thành công';
            }
        }

        $latest_products8 = $this->productModel->getProducts(8);
        $latest_products4 = $this->productModel->getProducts(4);
        $categories = $this->categoryModel->getAll();
        $offer_pro = $this->productModel->getProductHighestSalePercent();

        $this->view('site.home.index', [
            'message' => $message,
            'latest_products8'  => $latest_products8,
            'latest_products4' => $latest_products4,
            'categories' => $categories,
            'offer_pro' => $offer_pro
        ]);
    }

    public function signup()
    {
        $message = [];
        $input = $_REQUEST;

        // validate form input
        if (empty($input['fname'])) {
            $message['all-error']    = "Vui lòng nhập tên";
            goto getBackToHome;
        }

        if (empty($input['lname'])) {
            $message['all-error'] = "Vui lòng nhập họ";
            goto getBackToHome;
        }

        if (empty($input['email'])) {
            $message['all-error'] = "Vui lòng nhập email";
            goto getBackToHome;
        }

        if (empty($input['phone'])) {
            $message['all-error'] = "Vui lòng nhập số điện thoại";
            goto getBackToHome;
        }

        if (empty($input['province'])) {
            $message['all-error'] = "Vui lòng nhập tỉnh";
            goto getBackToHome;
        }

        if (empty($input['address'])) {
            $message['all-error'] = "Vui lòng nhập địa chỉ";
            goto getBackToHome;
        }

        if (empty($input['password'])) {
            $message['all-error'] = "Vui lòng nhập mật khẩu";
            goto getBackToHome;
        }

        if (empty($input['password_confirmation'])) {
            $message['all-error'] = "Vui lòng nhập mật khẩu xác nhận";
            goto getBackToHome;
        }

        if ($input['password'] != $input['password_confirmation']) {
            $message['all-error'] = "Hai mật khẩu không khớp nhau";
            goto getBackToHome;
        }

        // check if email existed
        $rs = $this->userModel->isEmailExisted($input['email']);
        if ($rs) {
            $message['all-error'] = "Email đã tồn tại";
            goto getBackToHome;
        }

        // check if phone existed
        $rs = $this->userModel->isPhoneExisted($input['phone']);
        if ($rs) {
            $message['all-error'] = "Điện thoại đã tồn tại";
            goto getBackToHome;
        }

        // insert new user
        $data =
            [
                'fname'           => $input['fname'],
                'lname'         => $input['lname'],
                'email'         => $input['email'],
                'phone'         => $input['phone'],
                'province'         => $input['province'],
                'address'         => $input['address'],
                'password'         => md5($input['password']),
            ];
        $created_user = $this->userModel->createData($data);
        if ($created_user['email'] == $input['email']) {
            $message['success-login'] = 'Đăng ký thành công';
        } else {
            $message['all-error'] = 'Đăng ký không thành công';
        }

        getBackToHome:

        $latest_products8 = $this->productModel->getProducts(8);
        $latest_products4 = $this->productModel->getProducts(4);
        $categories = $this->categoryModel->getAll();
        $offer_pro = $this->productModel->getProductHighestSalePercent();

        $this->view('site.home.index', [
            'message' => $message,
            'latest_products8'  => $latest_products8,
            'latest_products4' => $latest_products4,
            'categories' => $categories,
            'offer_pro' => $offer_pro
        ]);
    }

    public function logout()
    {
        if (!empty($_SESSION['user'])) {
            // if user chose "remember me" -> delete session key in browser & db
            $data =
                [
                    'remember_token'           => "",
                ];
            $this->userModel->updateData($_SESSION['user']['id'], $data);

            // remove session
            unset($_SESSION['user']);
        }

        if (isset($_COOKIE[self::COOKIE_NAME])) {
            // remove cookie
            
            setcookie(self::COOKIE_NAME, "", time() - 3600, "/", "", "", "true");
        }
        $_SESSION['cart'] = [];
        $_SESSION['total_quantity'] = 0;
        header('location:index.php');
    }
}
