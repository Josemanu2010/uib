<?php

use Slim\Http\Request;
use Slim\Http\Response;
;
$app->get('/faculties', 'FacultiesController:getFaculties')->setName('faculties');