<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/about', 'AboutController:getAbout')->setName('about');