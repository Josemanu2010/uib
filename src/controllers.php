<?php

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\AboutController;
use App\Controllers\FacultiesController;
use App\Controllers\UsersexistingController;

$container['HomeController'] = function ($c) {
    return new HomeController($c);
};

$container['AdminController'] = function ($c) {
    return new AdminController($c);
};

$container['LoginController'] = function ($c) {
    return new LoginController($c);
};

$container['RegisterController'] = function ($c) {
    return new RegisterController($c);
};

$container['AboutController'] = function ($c) {
    return new AboutController($c);
};

$container['FacultiesController'] = function ($c) {
    return new FacultiesController($c);
};

$container['UsersexistingController'] = function ($c) {
    return new UsersexistingController($c);
};