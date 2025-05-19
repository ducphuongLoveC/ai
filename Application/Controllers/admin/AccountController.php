<?php


class AccountController extends BaseController
{

    protected $userModel;
    protected $message;

    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }

    public function index()
    {
        $accounts = $this->userModel->getAllPaginate();
        $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
        // $links      = (isset($_GET['links'])) ? $_GET['links'] : 2;
        // links: số trang được hiển thị trước hoặc sau dấu ...
        $links = 2;
        return $this->view('admin.account.index', [
            'data' => $accounts->getData(7, $page)->data,
            'pagination' => $accounts->createLinks($links, 'pagination')
        ]);
    }

    public function create()
    {
        return $this->view('admin.account.create');
    }

    public function store()
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
            $message['all-error'] = "Vui lòng nhập tỉnh/thành phố";
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
            $message['all-error'] = "Vui lòng nhập xác nhận mật khẩu";
            goto getBackToHome;
        }

        if ($input['password'] != $input['password_confirmation']) {
            $message['all-error'] = "Hai mật khẩu không khớp";
            goto getBackToHome;
        }

        if (empty($input['role'])) {
            $message['all-error'] = "Vui lòng nhập vai trò";
            goto getBackToHome;
        }

        if ($input['role'] != "admin" && $input['role'] != "customer") {
            $message['all-error'] = "Vui lòng nhập vai trò hợp lệ";
            goto getBackToHome;
        }

        // kiểm tra email đã tồn tại chưa
        $rs = $this->userModel->isEmailExisted($input['email']);
        if ($rs) {
            $message['all-error'] = "Email đã tồn tại";
            goto getBackToHome;
        }

        // kiểm tra số điện thoại đã tồn tại chưa
        $rs = $this->userModel->isPhoneExisted($input['phone']);
        if ($rs) {
            $message['all-error'] = "Số điện thoại đã tồn tại";
            goto getBackToHome;
        }

        // thêm người dùng mới
        $data =
            [
                'fname'             => $input['fname'],
                'lname'             => $input['lname'],
                'email'             => $input['email'],
                'phone'             => $input['phone'],
                'province'          => $input['province'],
                'role'              => $input['role'],
                'address'           => $input['address'],
                'password'          => md5($input['password']),
            ];
        $created_user = $this->userModel->createData($data);
        if ($created_user['email'] == $input['email']) {
            $message['success-update-profile'] = 'Tạo tài khoản mới thành công';
        } else {
            $message['all-error'] = 'Tạo tài khoản mới thất bại';
        }

        getBackToHome:

        $accounts = $this->userModel->getAllPaginate();
        $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
        // $links      = (isset($_GET['links'])) ? $_GET['links'] : 2;
        // links: số trang được hiển thị trước hoặc sau dấu ...
        $links = 2;
        return $this->view('admin.account.create', [
            'message' => $message,
        ]);

        // $data = [
        //     'name' => $_POST['name'],
        //     'status' => $_POST['status'],
        //     'priority' => $_POST['priority'],
        // ];
        // if (sizeof($this->categoryModel->findCategoryByName($_POST['name'])) > 0) {
        //     $this->message['error-name'] = 'This category is already existing';
        // } else {
        //     $this->message['success-add'] = 'Category added successfully';
        //     $this->categoryModel->createData($data);
        // }
        // return $this->view('admin.category.create', [
        //     'message' => $this->message
        // ]);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $account = $this->userModel->findUserById(['*'], $id);

        return $this->view('admin.account.edit', [
            'user' => $account,
        ]);
    }

    public function update()
{
    $id = $_GET['id'] ?? null;
    $data = [
        'role' => $_POST['role'], // Thêm dòng này để cập nhật role
        'status' => $_POST['status'],
        'updated_at' => date("Y-m-d", time())
    ];

    $this->userModel->updateData($id, $data);
    
    header("location: ./?module=admin&controller=account&action=edit&id=$id");
}

    public function searchAccountFull()
    {
        $searchData = (isset($_REQUEST['accountSearch'])) ? $_REQUEST['accountSearch'] : "";
        $accounts   = $this->userModel->searchAccountFull($searchData);
        $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
        // $links      = (isset($_GET['links'])) ? $_GET['links'] : 2;
        // links: số trang được hiển thị trước hoặc sau dấu ...
        $links = 2;
        return $this->view('admin.account.index', [
            'data' => $accounts->getData(5, $page)->data,
            'pagination' => $accounts->createLinks($links, 'pagination')
        ]);
    }
}
