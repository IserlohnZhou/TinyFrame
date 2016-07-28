<?php

class Controller {
    protected $_controller;
    protected $_action;
    protected $_view;
 
    // 构造函数，初始化属性，并实例化对应模型
    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($controller, $action);
    }

    // 分配变量
    function assign($name, $value) {
        $this->_view->assign($name, $value);
    }

    function redirect($url) {
        $param = array();
        if (!empty($url)&&($url!='/')) {

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
        $this->_view = new View($controllerName, $action);
        $this->_view->render();
    }

    // 渲染视图
    function __destruct() {
        //$this->_view->render();
    }

}