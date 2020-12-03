<?php

define("ROOT", dirname(__DIR__));


require ROOT."/Autoloader.php";
session_start();
Autoloader::register();

require ROOT."/Rooter.php";

