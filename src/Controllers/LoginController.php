<?php
namespace App\Controllers;

class LoginController extends Controller {
    
    public function getLogin($request, $response, $args) {
        return $this->view->render($response, '/login.html', []);
    }
}