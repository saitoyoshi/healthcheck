<?php

class Controller
{
    protected $actionName;
    public function run($action)
    {
        $this->actionName = $action;
        $content = $this->$action();
        return $content;
    }

    public function render($variables = [], $template = null, $layout = 'layout')
    {
        $view = new View(__DIR__ . '/../views');
        if (is_null($template)) {
            $template = $this->actionName;
        }
        $controllerName = strtolower(substr(get_class($this), 0, -10));
        $path = $controllerName . '/' . $template;
        return $view->render($path, $variables, $layout);
    }
}
