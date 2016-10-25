<?php

namespace Application\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\View\Helper\urlParam;

class urlParamFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {

        $router = $container->get('router');
        $request = $container->get('request');

        $urlParm = new urlParam($router, $request);
        return $urlParm;
    }

}
