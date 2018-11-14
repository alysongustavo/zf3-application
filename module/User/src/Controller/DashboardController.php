<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 13/11/2018
 * Time: 22:36
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DashboardController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }

}