<?php

namespace Application\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\View\Helper\urlParm;

class urlParmFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $router = $container->get('router');
        $request = $container->get('request');

        $urlParm = new urlParm($router, $request);
        return $urlParm;
    }

}
