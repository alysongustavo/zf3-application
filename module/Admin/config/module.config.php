<?php

namespace Admin;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'admin-auth-login' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/admin/auth/login',
                    'defaults' => [
                        'controller' => 'admin-auth-controller',
                        'action' => 'login'
                    ]
                ]
            ],
            'admin-auth-logout' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/admin/auth/logout',
                    'defaults' => [
                        'controller' => 'admin-auth-controller',
                        'action' => 'logout'
                    ]
                ]
            ],
            'area-admin' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/admin',
                    'defaults' => [
                        'controller' => 'admin-dashboard-controller',
                        'action' => 'index'
                    ],

                ],
                'may_terminate' => true,
                'child_routes' => [
                    'index' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/user[/:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                            ],
                            'defaults' => [
                                'controller' => 'admin-user-controller',
                                'action' => 'index'
                            ]
                        ],
                    ],
                ],
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\AuthController::class => InvokableFactory::class,
            Controller\DashboardController::class => InvokableFactory::class,
            Controller\UserController::class => InvokableFactory::class,
        ],
        'aliases' => [
            'admin-auth-controller' => Controller\AuthController::class,
            'admin-dashboard-controller' => Controller\DashboardController::class,
            'admin-user-controller' => Controller\UserController::class
        ]
    ],
    'doctrine' => [
       'driver' => [
           __NAMESPACE__ . '_driver' => [
               'class' => AnnotationDriver::class,
               'cache' => 'array',
               'paths' => [__DIR__ . '/../src/Domain']
           ],
           'orm_default' => [
               'drivers' => [
                   __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
               ]
           ]
       ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/admin'           => __DIR__ . '/../view/layout/admin.phtml',
            'layout/login'           => __DIR__ . '/../view/layout/login.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]

];