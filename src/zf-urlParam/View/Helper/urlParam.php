<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class urlParam extends AbstractHelper {

    private $router;
    private $request;

    public function __invoke($route = null, $params = [], $useQuery = false) {
        $routeMatch = $this->router->match($this->request);
        $route = is_null($route) ? $routeMatch->getMatchedRouteName() : $route;
        $appendQuery = '';

        if ($useQuery) {
            $query = $this->request->getQuery()->toArray();
            if (!empty($query)) {
                $appendQuery .= '?';
                $separator = '&';
                $count = count($query);
                $i = 0;
                foreach ($query as $key => $value) {
                    $i++;
                    if ($count == $i) {
                        $separator = '';
                    }
                    $appendQuery .= $key . '=' . $value . $separator;
                }
            }
        }

        foreach ($params as $key => $value) {
            $routeMatch->setParam($key, $value);
        }

        $newUrl = $this->router->assemble($routeMatch->getParams(), array('name' => $route)) . $appendQuery;
        return $newUrl;
    }

    public function __construct($router, $request) {
        $this->router = $router;
        $this->request = $request;
    }

}
