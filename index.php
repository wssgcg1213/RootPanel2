<?php

define("rpROOT", dirname(__FILE__));

require_once(rpROOT . "/LightPHP/LightPHP.php");
require_once(rpROOT . "/core/include/rpApp.php");

App::helloWorld([
    "RunLevel" => lpDebug
]);

App::bind('^/user/(signup|login|logout)/?', function($act) {
    UserHandler::invoke($act, [], ["plugin" => $this]);
});

App::exec();

