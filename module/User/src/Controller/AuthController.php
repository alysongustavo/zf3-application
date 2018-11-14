<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{

    public function loginAction(){
        $this->layout()->setTemplate('layout/user_login');
        $view = new ViewModel();
        return $view;
    }

    public function logoutAction(){
        $this->layout()->setTemplate('layout/user_login');
        $view = new ViewModel();
        return $view;
    }

}