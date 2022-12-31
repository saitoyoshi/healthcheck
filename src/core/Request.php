<?php

class Request
{
    public function getPathInfo()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
