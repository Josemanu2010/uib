<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', 'HomeController:getHome')->setName('root-home');
$app->get('/home', 'HomeController:getHome')->setName('home');