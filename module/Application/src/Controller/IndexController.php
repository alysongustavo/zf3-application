<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Digital Camera',
                'price' => 99.95,
            ],
            [
                'id' => 2,
                'name' => 'Tripod',
                'price' => 29.95,
            ],
            [
                'id' => 3,
                'name' => 'Camera Case',
                'price' => 2.99,
            ],
            [
                'id' => 4,
                'name' => 'Batteries',
                'price' => 39.99,
            ],
            [
                'id' => 5,
                'name' => 'Charger',
                'price' => 29.99,
            ],
        ];


        $view = new ViewModel([
            'products' => $products
        ]);
        $this->layout()->setTemplate('layout/layout');
        return  $view;
    }
}
