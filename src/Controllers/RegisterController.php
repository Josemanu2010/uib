<?php
namespace App\Controllers;

class RegisterController extends Controller {
    
    public function getRegister($request, $response, $args) {
        return $this->view->render($response, '/register.html', []);
    }
}