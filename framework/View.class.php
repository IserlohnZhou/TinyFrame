<?php

class View {

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }
 
    /** 分配变量 **/
    function assign($name, $value) {
        $this->variables[$name] = $value;
    }
 
    /** 渲染显示 **/
    function render() {
        //extract() 函数从数组中将变量导入到当前的符号表。
        //该函数使用数组键名作为变量名，使用数组键值作为变量值。
        extract($this->variables);
        
        $defaultHeader = APP_PATH . 'app/views/header.php';
        //$defaultFooter = APP_PATH . 'application/views/footer.php';
        $controllerHeader = APP_PATH . 'app/views/' . $this->_controller . '/header.php';
        //$controllerFooter = APP_PATH . 'application/views/' . $this->_controller . '/footer.php';
        
        // 页头文件
        if (file_exists($controllerHeader)) {
            include ($controllerHeader);
        } else {
            include ($defaultHeader);
        }

        // 页内容文件
        include (APP_PATH . 'app/views/' . $this->_controller . '/' . $this->_action . '.php');
        
	    // // 页脚文件
	    // if (file_exists($controllerFooter)) {
	    //     include ($controllerFooter);
	    // } else {
	    //     include ($defaultFooter);
	    // }
    }

}