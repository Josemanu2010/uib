<?php
namespace App\Controllers;

class AboutController extends Controller {
    
    public function getAbout($request, $response, $args) {
        return $this->view->render($response, '/about.html', []);
    }
}