<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/login', 'LoginController:getLogin')->setName('login');