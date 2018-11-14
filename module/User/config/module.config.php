<?php

namespace User;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
  'router' => [
      'routes' => [
          'user-auth-login' => [
              'type' => Literal::class,
              'options' => [
                  'route' => '/user/auth/login',
                  'defaults' => [
                      'controller' => 'user-auth-controller',
                      'action' => 'login'
                  ]
              ]
          ],
          'user-auth-logout' => [
              'type' => Literal::class,
              'options' => [
                  'route' => '/user/auth/logout',
                  'defaults' => [
                      'controller' => 'user-auth-controller',
                      'action' => 'logout'
                  ]
              ]
          ],
          'area-user' => [
              'type' => Literal::class,
              'options' => [
                  'route' => '/user',
                  'defaults' => [
                      'controller' => 'user-dashboard-controller',
                      'action' => 'index'
                  ],

              ],
              'may_terminate' => true,
              'child_routes' => [
                  'index' => [
                      'type' => Segment::class,
                      'options' => [
                          'route'    => '/dashboard[/:action]',
                          'constraints' => [
                              'action' => '[a-zA-Z][a-zA-Z0-9_-]+',
                          ],
                          'defaults' => [
                              'controller' => 'user-dashboard-controller',
                              'action' => 'index'
                          ]
                      ],
                  ],
              ],
          ]
      ]
  ],
  'service_manager' => [
      'factories' => [

      ]
  ],
  'controllers' => [
      'factories' => [
          Controller\AuthController::class => InvokableFactory::class,
          Controller\DashboardController::class => InvokableFactory::class
      ],
      'aliases' => [
          'user-auth-controller' => Controller\AuthController::class,
          'user-dashboard-controller' => Controller\DashboardController::class
      ]
  ],
  'view_manager' => [
      'display_not_found_reason' => true,
      'display_exceptions'       => true,
      'doctype'                  => 'HTML5',
      'not_found_template'       => 'error/404',
      'exception_template'       => 'error/index',
      'template_map' => [
          'layout/user'           => __DIR__ . '/../view/layout/user.phtml',
          'layout/user_login'           => __DIR__ . '/../view/layout/user_login.phtml'
      ],
      'template_path_stack' => [
          __DIR__ . '/../view',
      ],
  ]

];
