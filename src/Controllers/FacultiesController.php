<?php
namespace App\Controllers;

class FacultiesController extends Controller {
    
    public function getFaculties($request, $response, $args) {
        return $this->view->render($response, '/faculties.html', []);
    }
}