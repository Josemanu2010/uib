<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/usersexisting', 'UsersexistingController:getUsersexisting')->setName('usersexisting');