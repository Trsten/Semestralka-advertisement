<?php

namespace Lib;

class Router
{
    public static function handleRoute()
    {
        $route = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
        $route = ltrim($route, '/');
        $routeParts = array_filter(explode('/', $route));

        $controller = self::resolveController($routeParts);
        $parameter = self::resolveParameter($routeParts);
        $action = self::resolveAction($routeParts, $parameter);
        $data = self::resolveData();

//        print('Controller: ' . $controller . '<br>');
//        print('Parameter: ' . $parameter . '<br>');
//        print('Action: ' . $action . '<br>');

        if ($parameter != '')
            call_user_func(array($controller, $action), $parameter, $data);
        else if ($parameter == '')
            call_user_func(array($controller, $action), $data);
    }

    public static function redirect($route)
    {
        header('Location: /property' . $route);
    }

    private static function resolveController(array $routeParts) : string
    {
        if (count($routeParts) > 0) {

            $controller = $routeParts[0];
            if ($controller[strlen($controller) - 1] == 's')
                $controller = substr($controller, 0, strlen($controller) - 1);
            else
                $controller =$routeParts[0];
            $controller = ucfirst($controller);
            $controller .= 'Controller';
        }
        else
            $controller = 'HomeController';

        $controller = '\\App\\Controllers\\' . $controller;

        return $controller;
    }

    private static function resolveParameter(array $routeParts) : string
    {
        if (count($routeParts) > 1 && is_numeric($routeParts[1]))
            $parameter = $routeParts[1];
        else
            $parameter = '';
        return $parameter;
    }

    private static function resolveAction(array $routeParts, string $parameter) : string
    {
        if (count($routeParts) <= 1)
            $action = '';
        else if (count($routeParts) <= 2)
            $action = $parameter != '' ? 'show' : $routeParts[1];
        else
            $action = $routeParts[2];

        $action = $action == '' || $action == '/' ? 'index' : $action;
        return $action;
    }

    private static function resolveData() : array
    {
        $data = [];

        foreach ($_POST as $key => $value)
        {
            $data[$key] = $value;
        }

        return $data;
    }
}