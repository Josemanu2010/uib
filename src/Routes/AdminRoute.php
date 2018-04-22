<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->group('/admin', function () {
	$this->get('/', 'AdminController:getAdmin')->setName('admin');
	$this->get('/users', 'AdminController:getUsers')->setName('admin-users');
});