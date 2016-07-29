<?php

class Kernel {
    function run() {
        spl_autoload_register(array($this, 'loadClass'));
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        $this->Route();
    }

    // 路由处理
    function Route() {
        $controllerName = 'Index';
        $action = 'index';
        $param = array();
        if (!empty($_SERVER["REQUEST_URI"])&&($_SERVER["REQUEST_URI"]!='/')) {
            $url = substr($_SERVER["REQUEST_URI"],1);
            if (strpos($url, '?')){
                $url = explode('?', $url);
                $url = reset($url);            
            }

            // 使用“/”分割字符串，并保存在数组中
            $urlArray = explode('/', $url);
            // 删除空的数组元素
            $urlArray = array_filter($urlArray);

            // 获取控制器名
            $controllerName = ucfirst($urlArray[0]);
            
            // 获取动作名
            array_shift($urlArray);
            $action = $urlArray ? $urlArray[0] : 'index';
            
            // 获取URL参数
            array_shift($urlArray);
            $param = $urlArray ? $urlArray : array();
        }
        // 实例化控制器
        $controller = $controllerName . 'Controller';
        $dispatch = new $controller($controllerName, $action);
        // 如果控制器和动作存在，调用并传入URL参数
        if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $param);
        } 
        else {
            exit("Controller or action does not exist");
        }
    }

    function setReporting() {

    }

    // 删除敏感字符
    function stripSlashesDeep($value) {

    }

    // 检测敏感字符并删除
    function removeMagicQuotes() {

    }

    // 检测自定义全局变量（register globals）并移除
    function unregisterGlobals() {

    }

    // 自动加载控制器和模型类 
    static function loadClass($class) {
        $frameworks = FRAME_PATH . $class . '.class.php';
        $controllers = APP_PATH . 'app/controllers/' . $class . '.php';
        $models = APP_PATH . 'app/models/' . $class . '.php';
        
        if (file_exists($frameworks)) {
            //load frameworks
            include $frameworks;
        } elseif (file_exists($controllers)) {
            //load controllers
            include $controllers;
        } elseif (file_exists($models)) {
            //load models
            include $models;
        } else {
            /* errors */
        }
    }
}