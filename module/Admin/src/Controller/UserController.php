<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 13/11/2018
 * Time: 22:48
 */

namespace Admin\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();
        return $view;
    }

}