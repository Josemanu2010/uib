<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/login', 'LoginController:getLogin')->setName('login');
$app->post('/login', 'LoginController:postLogin')->setName('login-post');
$app->get('/logout', 'LoginController:setLogout')->setName('logout');