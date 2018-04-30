<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/profiles', 'ProfileController:getProfiles')->setName('profiles');
$app->get('/profile', 'ProfileController:getProfile')->setName('profile');