<?php
session_start();
require './Core/UploadFile.php';
require './Core/Database.php';
require './Helper/Common.php';
require './Core/Middleware/MenuMiddleware.php'; 
require './Application/Models/BaseModel.php';
require './Application/Controllers/BaseController.php';


$controllerName = ucfirst((strtolower($_REQUEST['controller'] ?? 'home')) . 'Controller');

$actionName = $_REQUEST['action'] ?? 'index';

$moduleName = $_GET['module'] ?? null;

// Xử lý remember me trước
$cookie_name = "UserToken";
if (isset($_COOKIE[$cookie_name]) && !isset($_SESSION['user'])) {
    $controllerName = "verifyController";
    $controllerFile = "./Application/Controllers/$controllerName.php";
    $actionName = "autoLogin";
    
    if (file_exists($controllerFile)) {
        require $controllerFile;
        $object1 = new $controllerName;
        if (method_exists($object1, $actionName)) {
            $object1->$actionName();
        }
        die();
    }
}

if ($moduleName === "admin") {
    // Kiểm tra đăng nhập
    if (empty($_SESSION['user'])) {
        header('location:index.php');
        die();
    }
    
    $controllerFile = "./Application/Controllers/Admin/$controllerName.php";
    
    // Kiểm tra quyền truy cập
    $controllerBaseName = str_replace('Controller', '', $controllerName);
    if (!checkMenuPermission($controllerBaseName, action: $actionName)) {
        header('HTTP/1.0 403 Forbidden');
        echo "Bạn không có quyền truy cập trang này";
        die();
    }
} else {
    $controllerFile = "./Application/Controllers/$controllerName.php";
}

if (file_exists($controllerFile)) {
    require $controllerFile;
    
    // Kiểm tra xem class có tồn tại không
    if (!class_exists($controllerName)) {
        view("shared.site.404");
        die();
    }
    
    $object1 = new $controllerName;
    
    if (method_exists($object1, $actionName)) {
        $object1->$actionName();
    } else {
        view("shared.site.404");
    }
} else {
    view("shared.site.404");
}