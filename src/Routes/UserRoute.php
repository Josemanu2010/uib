<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->post('/user', 'UserController:postUser')->setName('user-post');
