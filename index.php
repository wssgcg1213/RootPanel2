<?php

define("rpROOT", dirname(__FILE__));

require_once(rpROOT . "/LightPHP/LightPHP.php");
require_once(rpROOT . "/core/include/rpApp.php");

rpApp::helloWorld(["RunLevel" => lpDebug]);

rpApp::exec();

