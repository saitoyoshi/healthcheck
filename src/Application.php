<?php

class Application
{
    private $router;
    protected $request;
    protected $response;
    protected $databaseManager;
    protected $validation;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->registerRoutes());
        $this->response = new Response();
        $this->validation = new Validation();
        $this->databaseManager = new DatabaseManager();
        $this->databaseManager->connect([
            'hostname' => 'db',
            'username' => 'test_user',
            'password' => 'pass',
            'database' => 'test_database',
        ]);
    }

    public function run()
    {
        try {
            $params = $this->router->resolve($this->request->getPathInfo());
            $action = $params['action'];
            $controllerName = ucfirst($params['controller']) . 'Controller';
            $this->runAction($controllerName, $action);
        } catch (HttpNotFoundException) {
            $this->render404();
        }

        $this->response->send();
    }

    public function getDatabaseManager()
    {
        return $this->databaseManager;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getValidation()
    {
        return $this->validation;
    }
    private function runAction($controllerName, $action)
    {
        $controllerClass = new $controllerName($this);
        if (!class_exists($controllerName)) {
            throw new HttpNotFoundException();
        }
        $content = $controllerClass->run($action);
        $this->response->setContent($content);
    }

    private function registerRoutes()
    {
        return [
            '/' => ['controller' => 'list', 'action' => 'index'],
            '/register' => ['controller' => 'register', 'action' => 'index'],
            '/register/create' => ['controller' => 'register', 'action' => 'create'],
        ];
    }

    private function render404()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->response->setContent(
            <<<EOF
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
</head>
<body>
    <h1>404 Page Not Found.</h1>
</body>
</html>
EOF
        );
    }
}
