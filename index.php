<?php

use core\autoload\Autoload;
use core\autoload\Application;

require_once("core/autoload/Autoload.php");
require_once("main/configs/Config.php");
require_once("main/configs/Consts.php");

(Autoload::getInstance())->register();
(Application::getInstance())->run();