<?php

class core
{
    // 运行程序
    function run()
    {
        spl_autoload_register(array($this, 'loadClass'));
        //$this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        $this->Route();
    }

    // 路由处理
    function Route()
    {
  
    }

    // 删除敏感字符
    function stripSlashesDeep($value)
    {

    }

    // 检测敏感字符并删除
    function removeMagicQuotes()
    {

    }

    // 检测自定义全局变量（register globals）并移除
    function unregisterGlobals()
    {

    }

    // 自动加载控制器和模型类 
    static function loadClass($class)
    {

    }
}