<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/register', 'RegisterController:getRegister')->setName('register');