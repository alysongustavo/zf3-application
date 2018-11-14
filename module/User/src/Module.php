<?php
/**
 * Created by PhpStorm.
 * User: Alyson
 * Date: 13/11/2018
 * Time: 23:21
 */

namespace User;


use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;

class Module
{

    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }

    public function init(ModuleManager $moduleManager){

        $eventManager = $moduleManager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();

        $sharedEventManager->attach(__NAMESPACE__,'dispatch', [$this, 'defineTemplateUser'], 100);

    }

    public function defineTemplateUser(MvcEvent $mvcEvent){

        $controller = $mvcEvent->getTarget();

        $controllerClass = get_class($controller);

        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $mvcEvent->getViewModel();
            $viewModel->setTemplate('layout/user');
        }

    }
}