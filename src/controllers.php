<?php

use App\Controllers\HomeController;
use App\Controllers\AdminController;

$container['HomeController'] = function ($c) {
    return new HomeController($c);
};

$container['AdminController'] = function ($c) {
    return new AdminController($c);
};
