<?php

//init
define('FRAME_PATH', __DIR__.'/');

require('../config/config.php');
require(FRAME_PATH.'core.php');

$core=new core;
$core->run();