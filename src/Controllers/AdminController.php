<?php
namespace App\Controllers;

use App\Models\UsersModel;

class AdminController extends Controller {
    
    public function __construct($c) {
        parent::__construct($c);
    }
    
    public function getAdmin($request, $response, $args) {
        die("Hello Admin:::::");
    }

    public function getUsers($request, $response, $args) {
        $this->UserModel    = new UsersModel();
        $userData = $this->UserModel->get();
        return $this->view->render($response, '/admin/users.html', [
            'users' => $userData
        ]);
        
        //return $response->getBody()->write(json_encode($userData->toArray()));
    }
}