<?php

class Application
{
    private $router;
    protected $request;
    protected $response;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->registerRoutes());
        $this->response = new Response();

    }
    public function run()
    {
        try {
            $params = $this->router->resolve($this->request->getPathInfo());
        } catch (HttpNotFoundException) {
            // $this->render404();
            echo 'not found';
        }
        $action = $params['action'];
        $controllerName = ucfirst($params['controller']) . 'Controller';
        $this->runAction($controllerName, $action);

        $this->response->send();
    }

    private function runAction($controllerName, $action)
    {
        $controllerClass = new $controllerName();
        if (!class_exists($controllerName)) {
            throw new HttpNotFoundException();
        }
        $content = $controllerClass->run($action);
        $this->response->setContent($content);
    }

    private function registerRoutes()
    {
        return ['/' => ['controller' => 'list', 'action' => 'index'],
    ];
    }
}
