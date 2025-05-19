<?php
function checkMenuPermission($controller, $action = 'index')
{
    // Bỏ qua kiểm tra nếu không phải module admin
    if (!isset($_GET['module']) || $_GET['module'] !== 'admin') {
        return true;
    }

    // Lấy role từ session
    $userRole = isset($_SESSION['user']['role']) ? $_SESSION['user']['role'] : null;

    // Nếu không có role thì từ chối
    if (empty($userRole)) {
        return false;
    }

    // Cho phép admin truy cập tất cả
    if ($userRole === 'admin') {
        return true;
    }

    // Lấy danh sách menu từ config
    $menus = require './Config/menu.php';

    // Kiểm tra quyền truy cập
    foreach ($menus as $menu) {
        // Kiểm tra route chính (chỉ so sánh controller và action)
        if (matchRoute($menu['route'], $controller, $action)) {
            return isset($menu['roles']) && in_array($userRole, $menu['roles']);
        }

        // Kiểm tra các submenu nếu có
        if (isset($menu['items'])) {
            foreach ($menu['items'] as $submenu) {
                if (matchRoute($submenu['route'], $controller, $action)) {
                    return isset($submenu['roles']) && in_array($userRole, $submenu['roles']);
                }
            }
        }
    }

    // Mặc định từ chối nếu không tìm thấy route trong menu
    return false;
}

function matchRoute($route, $controller, $action)
{
    $query = parse_url($route, PHP_URL_QUERY);
    parse_str($query, $params);

    $routeController = isset($params['controller']) ? $params['controller'] : null;
    $routeAction = isset($params['action']) ? $params['action'] : 'index';

    // Chỉ so sánh controller và action, bỏ qua các tham số khác
    return (strtolower($routeController) === strtolower($controller)) &&
        (strtolower($routeAction) === strtolower($action));
}