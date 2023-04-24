<?php

namespace app\core;

use app\controllers\MessageController as MessageController;
use Helper;

class Router
{
    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        $this->initialize();
        require_once('../config/Router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?'))
            $uri = mb_substr($uri, 0, strpos($uri, '?'));

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));

        if (DEBUG_URI)
            Helper::dd($this->uri);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function post($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                $this->executePost();
                break;
        }
    }

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }

            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    break;
                } else {
                    $this->executeController($get['call']);
                }
            }

            $params = $this->getRouteWithParams($r, $this->uri);

            if ($params != null) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    break;
                } else {
                    $this->executeController($get['call'], $params);
                }
            }
        }
    }

    private function executePost()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }

            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }

                $this->executeController($get['call']);
            }

            $params = $this->getRouteWithParams($r, $this->uri);

            if ($params != null) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }

                $this->executeController($get['call'], $params);
            }
        }
    }

    private function executeController($get, $args = [])
    {
        $ex = explode('@', $get);
        if (!isset($ex[0]) || !isset($ex[1])) {
            (new MessageController)->message('Dados inválidos', 'Controller ou método não encontrado: ' . $get, 404);
            return;
        }

        $cont = 'app\\controllers\\' . $ex[0];
        if (!class_exists($cont)) {
            (new MessageController)->message('Dados inválidos', 'Controller não encontrada: ' . $get, 404);
            return;
        }


        if (!method_exists($cont, $ex[1])) {
            (new MessageController)->message('Dados inválidos', 'Método não encontrado: ' . $get, 404);
            return;
        }

        call_user_func_array([
            new $cont,
            $ex[1]
        ], $args);
    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }

    private function getRouteWithParams($route, $uri)
    {
        $params = [];

        $paramKey = [];

        preg_match_all("/(?<={).+?(?=})/", $route, $paramMatches);

        foreach ($paramMatches[0] as $key) {
            $paramKey[] = $key;
        }

        if (!empty($uri)) {
            $route = preg_replace("/(^\/)|(\/$)/","",$route);
            $reqUri =  preg_replace("/(^\/)|(\/$)/","",$uri);
        } else {
            $reqUri = "/";
        }

        $uri = explode("/", $route);

        $indexNum = []; 

        foreach ($uri as $index => $param) {
            if (preg_match("/{.*}/", $param)) {
                $indexNum[] = $index;
            }
        }

        $reqUri = explode("/", $reqUri);

        foreach ($indexNum as $key => $index) {
            if(empty($reqUri[$index])){
                return;
            }

            $params[$paramKey[$key]] = $reqUri[$index];

            $reqUri[$index] = "{.*}";
        }

        $reqUri = implode("/",$reqUri);

        $reqUri = str_replace("/", '\\/', $reqUri);
        if (preg_match("/$reqUri/", $route)) {
            return $params;
        }
    }
}