<?php
// staff => nhân viên
// customer => khách hàng
// admin => quản trị viên

// 'roles' là danh sách các vai trò có quyền truy cập vào menu này
// nếu không có label thì không hiển thị menu và nó thường là các trang không có trong menu
return $menus = [
    [
        'label' => 'Bảng điều khiển',
        'route' => './?module=admin&controller=dashboard',
        'icon' => 'fa-columns',
        'roles' => ['admin'],
    ],
    [
        'label' => 'Quản lý danh mục',
        'route' => './?module=admin&controller=category',
        'icon' => 'fa-list',
        'roles' => ['admin', 'staff'],
        'items' => [
            [
                'label' => 'Tất cả danh mục',
                'route' => './?module=admin&controller=category',
                'roles' => ['admin', 'staff']
            ],
            [
                'label' => 'Thêm danh mục',
                'route' => './?module=admin&controller=category&action=create',
                'roles' => ['admin', 'staff']
            ],
            [
                'route' => './?module=admin&controller=category&action=edit',
                'roles' => ['admin', 'staff']
            ]
        ]
    ],
    [
        'label' => 'Quản lý sản phẩm',
        'route' => './?module=admin&controller=product',
        'icon' => 'fa-bread-slice',
        'roles' => ['admin', 'staff'],
        'items' => [
            [
                'label' => 'Tất cả sản phẩm',
                'route' => './?module=admin&controller=product',
                'roles' => ['admin', 'staff']
            ],
            [
                'label' => 'Thêm sản phẩm',
                'route' => './?module=admin&controller=product&action=create',
                'roles' => ['admin', 'staff']
            ],
             [
                'route' => './??module=admin&controller=product&action=edit',
                'roles' => ['admin', 'staff']
            ]
        ]
    ],
    [
        'label' => 'Quản lý mã giảm giá',
        'route' => './?module=admin&controller=coupon',
        'icon' => 'fa-gift',
        'roles' => ['admin'],
        'items' => [
            [
                'label' => 'Tất cả mã giảm giá',
                'route' => './?module=admin&controller=coupon',
                'roles' => ['admin']
            ],
            [
                'label' => 'Thêm mã giảm giá',
                'route' => './?module=admin&controller=coupon&action=create',
                'roles' => ['admin']
            ]
        ]
    ],
    [
        'label' => 'Quản lý đánh giá',
        'route' => './?module=admin&controller=review',
        'icon' => 'fa-comment-alt',
        'roles' => ['admin', 'staff'],
        'items' => [
            [
                'label' => 'Tất cả đánh giá',
                'route' => './?module=admin&controller=review',
                'roles' => ['admin', 'staff']
            ],
        ]
    ],
    [
        'label' => 'Quản lý tin nhắn',
        'route' => './?module=admin&controller=contact',
        'icon' => 'fa-envelope-open-text',
        'roles' => ['admin', 'staff'],
        'items' => [
            [
                'label' => 'Tất cả liên hệ',
                'route' => './?module=admin&controller=contact',
                'roles' => ['admin', 'staff']
            ],
        ]
    ],
    [
        'label' => 'Quản lý đơn hàng',
        'route' => './?module=admin&controller=order',
        'icon' => 'fa-receipt',
        'roles' => ['admin', 'staff'],
        'items' => [
            [
                'label' => 'Tất cả đơn hàng',
                'route' => './?module=admin&controller=order',
                'roles' => ['admin', 'staff']
            ],
            [
                'route' => './?module=admin&controller=order&action=detail',
                'roles' => ['admin', 'staff']
            ]
        ]
    ]
    ,
    [
        'label' => 'Quản lý tài khoản',
        'route' => './?module=admin&controller=account',
        'icon' => 'fa-user',
        'roles' => ['admin'],
        'items' => [
            [
                'label' => 'Tất cả tài khoản',
                'route' => './?module=admin&controller=account',
                'roles' => ['admin']
            ],
            [
                'label' => 'Thêm tài khoản',
                'route' => './?module=admin&controller=account&action=create',
                'roles' => ['admin']
            ]
        ]
    ]
];