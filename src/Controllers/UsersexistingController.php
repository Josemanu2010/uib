<?php
namespace App\Controllers;

class UsersexistingController extends Controller {
    
    public function getUsersexisting($request, $response, $args) {
        return $this->view->render($response, '/usersexisting.html', []);
    }
}