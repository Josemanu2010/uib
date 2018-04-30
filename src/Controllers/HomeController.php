<?php
namespace App\Controllers;

class HomeController extends Controller {
    
    public function getHome($request, $response, $args) {
        return $this->view->render($response, '/home.html', [ 'user' => $this->session->get('user') ]);
    }
}