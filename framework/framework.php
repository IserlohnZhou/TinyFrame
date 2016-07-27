<?php

//init
define('FRAME_PATH', __DIR__.'/');

require('../config/config.php');
require(FRAME_PATH.'Kernel.php');

$kernel=new Kernel;
$kernel->run();