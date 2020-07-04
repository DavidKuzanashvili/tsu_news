<?php


class Router
{
    protected $routes = [];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * @param string $uri
     * @param string $controller
     * @param $callback
     * @return void
     */
    public function get($uri, $controller, $callback = null)
    {
        if (isset($callback)) $callback();

        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param string $controller
     * @param $callback
     * @return void
     */
    public function post($uri, $controller, $callback = null)
    {
        if (isset($callback)) $callback();

        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @throws Exception
     * @param string $uri
     * @param string $methodType
     * @return string
     */
    public function direct($uri, $methodType) {
        if (array_key_exists($uri, $this->routes[$methodType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$methodType][$uri])
            );
        }

        throw new Exception('No route is defined for this URI.');
    }

    /***
     * @param $controller
     * @param $action
     * @return mixed
     * @throws Exception
     */
    protected function callAction($controller, $action)
    {
        $controller = new $controller;

        if (!method_exists($controller, $action))
        {
            throw new Exception("{$controller} doesn't have method {$action}");
        }

        return $controller->$action();
    }
}